<template>
  <div class="main">
    <HeaderComponent />

    <section class="here-banner small">
      <b-container>
        <v-snackbar
          v-model="snackbar"
          :color="snackbarColor"
          :timeout="snackbarTtimeout"
          left="left"
          right="right"
          :multi-line="snackbarMultiLine"
          top="top"
        >
          {{ snackbarText }}

          <template v-slot:action="{ attrs }">
            <v-btn dark snackbarText v-bind="attrs" @click="snackbar = false">
              Close
            </v-btn>
          </template>
        </v-snackbar>
        <b-row class="align-items-center">
          <b-col lg="12">
            <h1>Press Release Copywriting</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>

    <div class="wrap-bg">
      <section class="page-breadcrumb">
        <div class="container">
          <ul>
            <li>
              <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
            </li>
            <li><a>Press Release Copywriting List</a></li>
          </ul>
        </div>
      </section>

      <b-container>
        <h2 class="topTitle">Press Release Copywriting</h2>
        <div class="dash-cards for-table">
          <h2>PR REQUESTED LIST</h2>
          <div class="theme-table">
            <v-data-table
              :loading="loading"
              :loading-text="loadingText"
              :headers="headers"
              :items="copyright"
              :items-per-page="10"
            >
              <template v-slot:item.status="{ item }">
                <v-chip :color="getColor(item.status)" dark>{{
                  item.status
                }}</v-chip>
              </template>
              <template v-slot:item.actions="{ item }">
                <b-button-toolbar v-if="item.status == 'Done'">
                  <b-button-group class="mr-1">
                    <router-link
                      :to="{
                        name: 'pr-copywrite-deatails',
                        params: { prId: item.id },
                      }"
                    >
                      <b-button title="View Deatils">
                        <b-icon icon="card-list" aria-hidden="true"></b-icon>
                      </b-button>
                    </router-link>
                    <router-link
                      :to="{
                        name: 'pr-copywrite-update',
                        params: { prId: item.id },
                      }"
                    >
                      <b-button title="Edit">
                        <b-icon icon="brush" aria-hidden="true"></b-icon>
                      </b-button>
                    </router-link>
                    <b-button
                      title="Return Request"
                      :disabled="getEnableStatus(item)"
                    >
                      <b-icon
                        v-on:click="prCopyWriteRequestButton(item.ticket_no)"
                        icon="arrow-counterclockwise"
                        aria-hidden="true"
                      ></b-icon>
                    </b-button>
                  </b-button-group>
                </b-button-toolbar>
                <b-button-toolbar v-else>
                  <b-button-group class="mr-1">
                    <router-link
                      :to="{
                        name: 'pr-copywrite-deatails',
                        params: { prId: item.id },
                      }"
                    >
                      <b-button title="View Deatils">
                        <b-icon icon="card-list" aria-hidden="true"></b-icon>
                      </b-button>
                    </router-link>
                    <router-link
                      :to="{
                        name: 'pr-copywrite-update',
                        params: { prId: item.id },
                      }"
                    >
                      <b-button title="Edit">
                        <b-icon icon="brush" aria-hidden="true"></b-icon>
                      </b-button>
                    </router-link>
                  </b-button-group>
                </b-button-toolbar>
              </template>
            </v-data-table>
          </div>
        </div>
      </b-container>
    </div>
    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent";
import FooterComponent from "./FooterComponent";
import moment from "moment";
import apiService from "../services/apiService";

export default {
  components: {
    HeaderComponent: HeaderComponent,
    FooterComponent: FooterComponent,
  },
  data: () => ({
    menu2: false,
    loading: true,
    loadingText: "Loading... Please Wait..",
    snackbar: false,
    snackbarTtimeout: -1,
    snackbarText: "",
    snackbarColor: "",
    snackbarMultiLine: true,
    headers: [
      {
        text: "Ticket No",
        align: "start",
        sortable: false,
        value: "ticketNo",
      },
      { text: "Name / Title", value: "name" },
      { text: "Created At", value: "created_at" },
      { text: "Status", value: "status" },
      { text: "Actions", value: "actions", sortable: false },
    ],
    copyright: [],
  }),
  // created(){
  //     this.initialize();
  //     //  this.refreshList();

  // },
  mounted() {
    this.initialize();
  },
  methods: {
    getEnableStatus(item) {
      console.log(item.status);
      if (item.status == "Done") return false;
      else return true;
    },
    getPrcopyrightCountReturnRequest(item) {
      let user_id = { item: item };
      apiService
        .hitPRcopyWriteCountReturnRequest(user_id)
        .then((res) => {
           console.log("responseCount", res);
          
        })
        .catch((err) => console.log(err));
    },
    initialize() {
      apiService
        .hitPrCopyWriteListApi()
        .then((res) => {
          console.log("response", res);
          if (res.has_error == 0) {
            this.loading = false;
            this.loadingText = "";
            if (Array.isArray(res.data) && res.data.length > 0) {
              res.data.map((pressData) => {
                let prStatus = this.getStatusString(pressData.status);
                let prObj = {
                  name: pressData.name,
                  ticketNo: pressData.ticket_no,
                  status: prStatus,
                  id: pressData.id,
                  created_at: this.getFormattedDate(pressData.created_at),
                  ticket_no: pressData.ticket_no,
                };
                this.copyright.push(prObj);
              });
            } else {
              this.loadingText = "No Record Found.";
            }
          } else {
            this.alertText = res.data.msg;
            this.showAlert = true;
          }
        })
        .catch((err) => {
          console.log("api service err 2", err);
        });
    },
    prCopyWriteRequestButton(ticket_no) {
      this.loadingText = "Loading... Please Wait..";
      this.getPrcopyrightCountReturnRequest()
      //this.loading= true;
      let postData = { ticket_no: ticket_no };
      apiService
        .hitPrCopyWriteReturnRequestApi(postData)
        .then((res) => {
          if (res.has_error == 0) {
            console.log("resss", res);
            this.loading = true;
            setTimeout(() => {
              this.loading = false;
            }, 2000);
            location.reload();
            //this.initialize();

            this.loadingText = "Return request succesfully done.";
          } else {
            this.snackbarColor = "danger";
            this.snackbarText = res.msg;
            this.snackbarTtimeout = 6000;
            this.snackbar = true;
          }
        })
        .catch((err) => {
          console.log("api service err 2", err);
        });
    },
    //   refreshList() {
    //     // this.initialize();
    //     //this.apiService.hitPrCopyWriteListApi();
    //                     },
    getFormattedDate(date) {
      let newDate = new Date(date + " UTC");
      newDate = newDate.toString();
      console.log(newDate);
      return moment(newDate).format("LLL");
    },
    getColor(status) {
      if (status == "Payment On Process") return "orange";
      else if (status == "Payment Failed") return "red";
      else if (status == "Requested" || status == "Return Requested")
        return "blue";
      else if (status == "Done") return "green";
      else return "red";
    },
    getStatusString(status) {
      if (status == "payment_on_process") return "Payment On Process";
      else if (status == "payment_failed") return "Payment Failed";
      else if (status == "requested") return "Requested";
      else if (status == "return_requested") return "Return Requested";
      else if (status == "completed") return "Done";
      else return "Unknown";
    },
  },
};
</script>


<style scoped></style>

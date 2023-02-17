<template>
<div class="main">

<HeaderComponent/>

<section class="here-banner small">
  <b-container>
    <b-row class="align-items-center">
      <b-col lg="12">
          <h1>Invoices</h1>
      </b-col>
    </b-row>
  </b-container>
</section>

  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
       
        <li><router-link :to="{name:'Dashboard'}">Dashboard</router-link></li>
        <li><a >Invoices</a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <h2 class="topTitle">Latest Invoices</h2>
    <div class="dash-search for-invoice">
        <b-row>
            <b-col lg="6">
                <div class="acc-details alt">
                    <div class="accpic"> <img v-bind:src="profile_pic" alt=""></div>
                    <div class="proDetails">
                      <p>{{ userName }}</p>
                      <p><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ email }}</p>
                      <p><i class="fa fa-phone" aria-hidden="true"></i> {{ phone }}</p>
                    </div>
                </div>
            </b-col>
            <b-col lg="6">
                <div class="text-right proUp">
                  <router-link :to="{name:'edit-profile'}"><v-btn type="submit" color="btn-auto"><i class="fa fa-user" aria-hidden="true"></i> Update Profile</v-btn></router-link>
                  <p>To add additional information to your invoice</p>
                </div>
            </b-col>
        </b-row>
    </div>
    <div class="dash-cards for-table">
        <h2>Invoice</h2>
        <div class="theme-table">
            <v-data-table 
            :loading="loading"  
            :loading-text="loadingText" 
            :headers="headers"
            :items="invoviceArray" 
             :items-per-page="5">
                    <template v-slot:item.status="{ item }">
                        <v-chip :color="getColor(item.status)" dark>{{ item.status }}</v-chip>
                    </template>
                    <!-- <template v-slot:item.actions="{ item }">
                        <b-button-toolbar>
                            <b-button-group class="mr-1">
                                    <b-button title="View Deatils">
                                        <b-icon icon="card-list" aria-hidden="true"></b-icon>
                                    </b-button>
                            </b-button-group>
                            </b-button-toolbar>
                    </template> -->
             </v-data-table>
        </div>
    </div>          
  </b-container>

</div>
<FooterComponent/>


</div>



</template>

<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    import apiService from "../services/apiService";
    import moment from 'moment';

    export default {
        components: {
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent
        },
        data:() => ({
           
                userName:'',
                profile_pic:'',
                email:'',
                phone:'',
                loading:true,
                loadingText:'Loading......',
                headers: [
                    {
                        text: 'Payment Type',
                        align: 'start',
                        sortable: false,
                        value: 'payment_type',
                    },
                    {text: 'Total Amount', value: 'total_amount'},
                    {text: 'Status', value: 'status'},
                    {text: 'Created At', value: 'created_at'},
                   
                ],
                invoviceArray: [],
    }),
         
         mounted(){
              apiService.hitinvoicelistApi()
                .then(resp=> {
                    console.log('invoiceresponse', resp);
                    if(resp.has_error == 0){
                        this.userName = resp.user_data.name;
                        this.profile_pic=resp.user_data.image_url;
                        this.email=resp.user_data.email;
                        this.phone=resp.user_data.phone;
                        if (Array.isArray(resp.data) && resp.data.length > 0 ){
                            this.loading= false;
                            resp.data.map(invoiceData => {
                                let invoiceObj = {
                                    id:invoiceData.id,
                                    payment_type: this.getPaymentTypeString(invoiceData.paymenttype_data.payment_type),
                                    total_amount: invoiceData.total_amount,
                                    status: this.getStatusString(invoiceData.status),
                                    created_at: this.getFormattedDate(invoiceData.created_at),
                                } 
                                this.invoviceArray.push(invoiceObj);
                            })
                        }
                    }
                    
                    
                })
                .catch( err=> {
                    this.loading = false ;
                    this.loadingText = 'Data not found' ;
                });
            
            
        },
        methods:{
            getPaymentTypeString(string){
                let typeString='';
                switch (string      ) {
                    case 'pr_copy_write':
                        typeString = "PR Copy Write"
                        break;
                    case 'subscription':
                        typeString = "Subscrption"
                        break;
                    default:
                        typeString = "Undefined"
                }
                return typeString;
            },
            getColor (status) {
                if(status=='Payment On Process') return 'orange'
                else if(status == 'Payment Failed') return "red"
                else if(status == 'Success') return "green"
                else return "red"
            },
            getStatusString(status){
                
                if(status=='on_process') return 'Payment On Process'
                else if(status == 'failed') return "Payment Failed"
                else if(status == 'successful') return "Success"
                else return "Unknown"
            },
             getFormattedDate(date){
                 console.log('datee',date)
                let newDate = new Date(date+' UTC');
                newDate= newDate.toString()
                console.log(newDate);
                return moment(newDate).format('LLL');
            },

        }

    }
</script>


<style scoped></style>

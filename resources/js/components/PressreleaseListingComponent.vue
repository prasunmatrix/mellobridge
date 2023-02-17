<template>
    <div class="main">

        <HeaderComponent/>

        <section class="here-banner small">
            <b-container>
                <b-row class="align-items-center">
                    <b-col lg="12">
                        <h1>Press Release</h1>
                    </b-col>
                </b-row>
            </b-container>
        </section>

        <div class="wrap-bg">
            <section class="page-breadcrumb">
                <div class="container">
                    <ul>
                        
                        <li><router-link :to="{name:'Dashboard'}">Dashboard</router-link></li>
                        <li><router-link :to="{name:'user-press-release-listing'}">Press Release List</router-link></li>
                    </ul>
                </div>
            </section>

            <b-container>
                <h2 class="topTitle">Press Release</h2>
                <div class="dash-cards for-table">
                    <h2>PRESS RELEASE LIST</h2>
                    <div class="theme-table">
                        <v-data-table 
                        :loading="loading"  
                        :loading-text="loadingText" 
                        :headers="headers" 
                        :items="pressrelease" 
                        :items-per-page="10">
                            <template v-slot:item.status="{ item }">
                                <v-chip :color="getColor(item.status)" dark>{{ item.status }}</v-chip>
                            </template>
                            <template v-slot:item.actions="{ item }">
                               <b-button-toolbar v-if="(item.status=='Released')" >
                                    <b-button-group class="mr-1">
                                        <router-link :to="{name:'press-release-details',params: {prId: item.id }}">
                                            <b-button title="Preview">
                                                <b-icon icon="eye" aria-hidden="true"></b-icon>
                                            </b-button>
                                        </router-link>
                                    </b-button-group>
                                </b-button-toolbar>
                                 <b-button-toolbar v-else >
                                    <b-button-group class="mr-1">
                                        <router-link :to="{name:'press-release-update',params: {pressId: item.id }}">
                                            <b-button title="Edit Deatils">
                                                <b-icon icon="pen" aria-hidden="true"></b-icon>
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
        mounted(){
            apiService.hitshowupdateUserApi()
            .then(resp=> {
                this.userName = resp.name;
            })
            .catch( err=> {
                localStorage.removeItem('token');
                localStorage.removeItem('user_obj');
                this.$router.push({name:'Login'})
                    .then(res => console.log('logged out successfully!'))
                    .catch(err => console.log(err))
                
            });
                
                 
            
        },
        data: () => ({
            date: new Date().toISOString().substr(0, 10),
            menu2: false,
            userName:'',
            loading: true,
            loadingText:"Loading... Please Wait..",
            headers: [
                {
                    text: 'HeadLine',
                   
                    value: 'headline',
                },
                 {text: 'Last Modified On', value: 'last_modified_on'},
                {text: 'Published On', value: 'published_date'},
                {text: 'Release On', value: 'released_date'},
                {text: 'Status', value: 'status'},
                { text: 'Actions', value: 'actions', sortable: false }
            ],
           pressrelease: [],
        }),
        created(){

            this.initialize()
        },
        methods:{
            getShortenString(str,maxCount){
                let stringArray = str.split(" ");
                if(stringArray.length > maxCount){
                    str ='';
                    stringArray.map(function(currentValue, index){
                        if(maxCount > (index + 1) ){
                            str += currentValue+' '; 
                        }
                        if(index == maxCount){
                            str += ' ...';
                        }

                    })
                }
                return str;
            },
            initialize(){
                apiService.hitPressreleaseListingApi()
                    .then(res => {
                        if(res.has_error == 0 ){
                            this.loading= false;
                            this.loadingText="";
                           if (Array.isArray(res.data) && res.data.length > 0 ){
                                res.data.map(pressData => {
                                    let pressStatus= this.getStatusString(pressData.status);
                                    let publicationDate= 'Not Published';
                                    if(pressData.status != "draft")
                                        publicationDate = this.getFormattedDate(pressData.publication_date) 
                                    let releasedDate = 'Not Released';
                                    if(pressData.status == "released")
                                        releasedDate = this.getFormattedDate(pressData.updated_at) 
                                    let pressObj= {
                                        headline:  this.getShortenString(pressData.headline,6),
                                        status: pressStatus,
                                        id:pressData.id,
                                        released_date:releasedDate,
                                        published_date:publicationDate,
                                        last_modified_on:this.getFormattedDate(pressData.updated_at)

                                    };
                                    this.pressrelease.push(pressObj);
                                });
                           } else {
                               this.loadingText="No Record Found.";
                           }
                        } else {
                            this.alertText=res.data.msg;
                            this.showAlert=true;
                        }
                    })
                    .catch(err => {
                        console.log('api service err 2',err);
                    });
            },
            getFormattedDate(date){
                let newDate = new Date(date);
                newDate= newDate.toString()
                console.log(newDate);
                return moment(newDate).format('LL');
            },
            getColor (status) {
                if(status=='Payment On Process') return 'orange'
                else if(status == 'Payment Failed' || status== 'reject' || status== 'cancel')  return "red"
                else if(status == 'Draft' || status == 'Published') return "blue"
                else if(status == 'Released') return "green"
                else return "red"
            },
            getStatusString(status){
                if(status=='payment_on_process') return 'Payment On Process'
                else if(status == 'draft') return "Draft"
                else if(status == 'published') return "Published"
                else if(status == 'payment_failed') return "Payment Failed "
                else if(status == 'released') return "Released"
                else if(status == 'reject') return "Reject"
                else if(status == 'cancel') return "Cancel"
                else return "Unknown"
            }
        }

    }
</script>


<style scoped></style>

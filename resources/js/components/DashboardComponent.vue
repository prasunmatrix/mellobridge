<template>
    <div class="main">

        <div class="header-static">
            <HeaderComponent/>
        </div>

        <div class="wrap-bg alt">
            <section class="page-breadcrumb">
                <div class="container">
                    <ul>
                        
                        <li><router-link :to="{name:'Dashboard'}">Dashboard</router-link></li>
                    </ul>
                </div>
            </section>

            <b-container>
                <div class="dash-search">
                    <b-row class="align-items-center">
                        <b-col lg="6">
                            <div class="acc-details">
                                <div class="acc_info"> <img
                                     v-bind:src="profile_pic" alt="">
                                     <span>{{ userName }}</span>
                                     <span>{{ email }}</span>
                                </div>
                               
                            </div>
                        </b-col>
                        <b-col lg="6">
                            
                                <b-dropdown no-caret>
                                    <template v-slot:button-content><i class="fa fa-bell" aria-hidden="true"></i>
                                    </template>
                                    <li>Total Published <span class="number">{{totalPressReleaseCount}}</span> Press</li>
                                    <li>Total Requested <span class="number"> {{ titlePrCopyWriteCount}}</span>  P R Copywrite</li>
                                    
                                </b-dropdown>
                        </b-col>
                    </b-row>
                </div>

                <div class="dash-cards">
                    <b-row>
                        <b-col xl="4" sm="6">
                            <div class="dash-card-single">
                                <div class="col dash-card-text">
                                    <h6>{{totaleReleasedPressCount}}</h6>
                                    <p>Press Released</p>
                                </div>
                                <div class="col dash-icon">
                                    <div class="submission-con"></div>
                                </div>
                            </div>
                        </b-col>
                        <b-col xl="4" sm="6">
                            
                                <div class="dash-card-single">
                                    <div class="col dash-card-text">
                                        <router-link :to="{name:'invoice'}"><p>My Invoices Details</p></router-link>
                                       
                                    </div>
                                    <div class="col dash-icon">
                                        <div class="receipt-icon"></div>
                                    </div>
                                </div>
                            
                        </b-col>
                        <b-col xl="4" sm="12">
                            <div class="dash-card-single">
                                <div class="col dash-card-text">
                                    <p>Member Type: [PAYG]</p>
                                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> {{email}}</p>
                                    <p><i class="fa fa-phone" aria-hidden="true"></i> {{phone}}</p>
                                    <div class="btn-group">
                                        <router-link :to="{name:'edit-profile'}"><i class="fa fa-user" aria-hidden="true"></i> Update Profile</router-link>
                                        <a href="#">Upgrade</a>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                </div>

                <div class="dash-cards for-table">
                    <h2>Recent Releases</h2>
                    <div class="theme-table">
                        <v-data-table :headers="headers"
                                          :loading="loading"  
                                        :loading-text="loadingText"
                                        :items="pressrelease"
                                        :items-per-page="5 ">
                            <template v-slot:item.status="{ item }" >
                                <v-chip :color="getColor(item.status)" dark>{{ item.status }}</v-chip>
                            </template>
                             <template v-slot:item.actions="{ item }">
                               <b-button-toolbar v-if="(item.status=='Draft')">
                                   <b-button-group class="mr-1">
                                        <router-link :to="{name:'press-release-update',params: {pressId: item.id }}">
                                            <b-button title="Edit Deatils">
                                                <b-icon icon="pen" aria-hidden="true"></b-icon>
                                            </b-button>
                                        </router-link>
                                    </b-button-group>
                                    
                                </b-button-toolbar>
                                 <b-button-toolbar v-else >
                                    <b-button-group class="mr-1">
                                        <router-link :to="{name:'press-release-details',params: {prId: item.id }}">
                                            <b-button title="Preview">
                                                <b-icon icon="eye" aria-hidden="true"></b-icon>
                                            </b-button>
                                        </router-link>
                                    </b-button-group>
                                </b-button-toolbar>
                            </template>
                        </v-data-table>
                    </div>
                </div>


                <div class="dash-cards">
                    <b-row>
                        <b-col lg="6">
                            <div class="dash-card-single map-bg">
                                <div class="col-8 dash-card-text">
                                    <h2>Create or send a single <br> press release</h2>
                                </div>
                                <div class="col-4 dash-icon"><img src="/assets/images/web-design.png" alt=""></div>
                            </div>
                        </b-col>
                        <b-col lg="6">
                            <div class="dash-card-single map-bg">
                                <div class="col-8 dash-card-text">
                                    <h2>Upgrade to a monthly / <br> yearly subscription</h2>
                                </div>
                                <div class="col-4 dash-icon"><img src="/assets/images/refresh.png" alt=""></div>
                            </div>
                        </b-col>
                    </b-row>
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
        data: () => ({
            
                userName:'',
                profile_pic:'',
                email:'',
                phone:'',
                totalPressReleaseCount:0,
                titlePrCopyWriteCount:0,
                totaleReleasedPressCount:0,
                date: new Date().toISOString().substr(0, 10),
                menu2: false,
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
                searchKeyword:'',
            }),
           created(){

            this.initialize();
             
        },
        mounted(){
            this.setDashboardCounting();
              this.scrollToElement('container');
              apiService.hitshowupdateUserApi()
                .then(resp=> {
                    this.userName = resp.name;
                    this.profile_pic=resp.image_url;
                    this.email=resp.email;
                    this.phone=resp.phone;
                    
                })
                .catch( err=> {
                    localStorage.removeItem('token');
                    localStorage.removeItem('user_obj');
                    this.$router.push({name:'Login'})
                        .then(res => console.log('logged out successfully!'))
                        .catch(err => console.log(err))
                 
                });
                
                 
            
        },
         methods:{
             scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];
                if (el) {
                    el.scrollIntoView();
                }
            },

             setDashboardCounting(){
                 console.log('setDashboardCounting');
                 apiService.hitDashboardCountApi()
                           .then(res=>{
                                if(res.has_error == 0){
                                    this.totalPressReleaseCount=res.pressreleasecounting;
                                    this.titlePrCopyWriteCount=res.prCopywritecounting;
                                    this.totaleReleasedPressCount=res.pressreleasecount;
                                }
                 })
             },

            searchByKeywords(){
                console.log('search');
                this.pressrelease=[];
                this.initialize(this.searchKeyword,1);
          },
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
              initialize(searchKeyword){
                apiService.hitPressreleaseListingApi(searchKeyword)
                    .then(res => {
                        console.log('respoanepppp',res)
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
                let newDate = new Date(date+' UTC');
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

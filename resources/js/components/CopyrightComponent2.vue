<template>
<div class="main">

<HeaderComponent/>

<section class="here-banner small">
  <b-container>
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
        
        
       <li><router-link :to="{name:'Dashboard'}">Dashboard</router-link></li>
        
        <li><a >Press Release Copywriting</a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <v-snackbar
      v-model="snackbar"
      :color="snackbarColor"
      :timeout="snackbarTtimeout"
      left="left"
      right="right"
      :multi-line="snackbarMultiLine"
      top="top" >
      {{ snackbarText }}
      <template v-slot:action="{ attrs }">
        <v-btn
          dark
          snackbarText
          v-bind="attrs"
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
    <h2 class="topTitle">Tell us more about your brief by completing the fields below.</h2>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(onSubmit)">

        <div class="copy-form">
        <div class="custom-form">
          <div class="inp-block nogap">
            <h5><i class="fa fa-bullhorn" aria-hidden="true"></i> Name:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - What is the name of the entity making this announcement <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Name" rules ="required" v-slot="{ errors }">
              <v-text-field placeholder="Your announcement Name here"  v-model="formData.name" ></v-text-field>  
               <span>{{ errors[0] }}</span> 
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-suitcase" aria-hidden="true"></i> Business Purpose:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - What is the purpose of your business and your main activities  <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Business Purpose" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Your business and your main activities Details"  v-model="formData.business_purpose"></v-textarea>  
              <span>{{ errors[0] }}</span> 
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-bullseye" aria-hidden="true"></i> Aim:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - What is the single most important aim of this news submission <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Aim" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Fields your important aim of this news submission" v-model="formData.aim"></v-textarea>  
              <span>{{ errors[0] }}</span> 
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Overview:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - Please provide an overview of your announcement <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Overview" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Provide an overview of your announcement here" v-model="formData.overview"></v-textarea>  
              <span>{{ errors[0] }}</span>
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-line-chart" aria-hidden="true"></i> Benefits:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - What are the benefits of the announcement for readers? <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Benefits" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Write your Benefits of the announcement for readers" v-model="formData.benefits"></v-textarea>  
              <span>{{ errors[0] }}</span>
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-users" aria-hidden="true"></i> Audience:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - Who is the target audience? <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Audience" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Write your the target audience" v-model="formData.audience"></v-textarea> 
              <span>{{ errors[0] }}</span> 
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-quote-left" aria-hidden="true"></i> Spokesperson:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - Provide a spokespersons quote(including name & position)  <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Spokesperson" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Provide a spokespersons Details"  v-model="formData.spokesperson"></v-textarea> 
              <span>{{ errors[0] }}</span> 
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-external-link" aria-hidden="true"></i> Examples:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - Provide some example news agencies, newspapers, websites, magazines etc that you would like to gain coverage in. <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Examples" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Write some example that you would like to gain coverage in" v-model="formData.examples"></v-textarea> 
                <span>{{ errors[0] }}</span>
            </ValidationProvider> 
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Additional Notes:</h5>
            <div>
              <v-tooltip right>
                <template v-slot:activator="{ on, attrs }">
                  - Provide any additional information or instructions for our editors. <span v-bind="attrs" v-on="on"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                </template>
                <span>Add Instructions here</span>
              </v-tooltip>
            </div>
            <ValidationProvider name="Additional" rules ="required" v-slot="{ errors }">
              <v-textarea placeholder="Write any additional information or instructions for our editors" v-model="formData.additional_notes"></v-textarea>
              <span>{{ errors[0] }}</span>  
            </ValidationProvider>
          </div>
        </div>
        </div>

        <p>&nbsp;</p>
         <b-button type="submit" variant="primary">Submit</b-button>
        <p class="merg-top">By Next step this form you agree to our <a href="">Terms & Conditions</a>.</p>
      </form>
  </ValidationObserver>
  </b-container>

</div>
<FooterComponent/>


</div>



</template>

<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    import apiService from "../services/apiService";
    export default {
        components: {
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent,
        },
        data: () => ({
            items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
            date: new Date().toISOString().substr(0, 10),
            menu2: false,
            snackbar:false,
            snackbarTtimeout:-1,
            snackbarText:"",
            snackbarColor:"",
            snackbarMultiLine:true,
            prCopyWriteId:0,
            validationError:[],
            formData:{
              name:'',
              business_purpose:'',
              aim:'', 
              overview:'',
              benefits:'',
              audience:'',
              additional_notes:'',
              spokesperson:'',
              examples:''
            }
        }),
         mounted(){
          if (typeof this.$route.params.prId !== 'undefined'){
              this.prCopyWriteId=this.$route.params.prId;
              this.setPrCopyWritedetails(this.$route.params.prId);
             
          }
      },

        methods:{
          setPrCopyWritedetails(prId){
          apiService.hitPRcopyWriteDetails(prId)
                    .then(res => {
                      console.log('responseeee', res);
                        if(res.has_error == 0 ) {
                          let detailsJosn=JSON.parse(res.msg.content_json);
                          this.formData.name=res.msg.name;
                          this.formData.business_purpose=detailsJosn.business_purpose;
                          this.formData.aim=detailsJosn.aim;
                          this.formData.overview=detailsJosn.overview;
                          this.formData.audience =detailsJosn.audience;
                          this.formData.benefits=detailsJosn.benefits;
                          this.formData.spokesperson=detailsJosn.spokesperson;
                          this.formData.examples=detailsJosn.examples;
                          this.formData.additional_notes=detailsJosn.additional_notes;                       
                        }
                    })
                    .catch(err => {
                      this.snackbarColor='error';
                      this.snackbarText='Unable to fetch to PR Copywriting.';
                      this.snackbarTtimeout=6000;
                      this.snackbar=true;
                    });
        },
          onSubmit() {
            console.log('submit');
            this.snackbarColor='info';
            this.snackbarText='Processing...';
            this.snackbarTtimeout=6000;
            this.snackbar=true;
             axios.interceptors.request.use((config) => {
                    this.loading = true;
                    return config;
                }, (error) => {
                    this.loading = false;
                    return Promise.reject(error);
                });

                // Add a response interceptor
                axios.interceptors.response.use((response) => {
                    this.loading = false;
                    return response;
                }, (error) => {
                    this.loading = false;
                    return Promise.reject(error);
                });
            if(this.prCopyWriteId == 0 ){
                apiService.hitPrCopyWriteCreate( this.formData,this.prCopyWriteId)
                    .then(res => {
                         this.snackbarColor='success';
                          this.snackbarText=res.msg;
                          this.snackbarTtimeout=6000;
                          this.snackbar=true;
                        if(res.has_error == 0 ){
                          console.log('Successfully created PR copy writing...');
                            this.$router.push({name: 'copyright-listing'})
                                        .then(res => console.log('successfully Created Pr Copy Writeing..!'))
                                        .catch(err => console.log(err))
                        } else {
                            this.alertText=res.data.msg;
                            this.showAlert=true;
                        }
                        this.setPrCopyWritedetails(this.prCopyWriteId)
                    })
                    .catch(err => {
                       this.snackbarColor='error';
                       this.snackbarText=err
                       this.snackbarTtimeout=10000;
                       this.snackbar=true;
                    })
            }else{

              apiService.hitPRcopyWriteUpdateApi( this.formData,this.prCopyWriteId)
                    .then(res => {
                         this.snackbarColor='success';
                          this.snackbarText=res.msg;
                          this.snackbarTtimeout=6000;
                          this.snackbar=true;
                        if(res.has_error == 0 ){
                          console.log('Successfully updated PR copy writing...');
                            this.$router.push({name: 'copyright-listing'})
                                        .then(res => console.log('successfully updated Pr Copy Writeing..!'))
                                        .catch(err => console.log(err))
                        } else {
                            this.alertText=res.data.msg;
                            this.showAlert=true;
                        }
                        this.setPrCopyWritedetails(this.prCopyWriteId)
                    })
                    .catch(err => {
                       this.snackbarColor='error';
                       this.snackbarText=err
                       this.snackbarTtimeout=10000;
                       this.snackbar=true;
                    })

            }      
          },
          showNameFieldError:function(error){
              this.showValidationError();
          }

        }
    }
</script>


<style scoped>
  span{
    display: block;
  }
</style>

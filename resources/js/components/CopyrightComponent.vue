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
        <li><a >Create Copywriting</a></li>
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
      top="top"
    >
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
    <h2 class="topTitle">Press Release Copywriting</h2>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(onSubmit)">
          <!-- Start part 1-->
          <div class="theme-tabs theme-tabs-alt">    
            <v-tabs centered>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-bullhorn" aria-hidden="true"></i></div>
                    <h3>Name:</h3>
                    <p>What is the name of the entity making this announcement?</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Name" rules ="required|alpha" v-slot="{ errors }">
                <div class="custom-form">
                  <v-textarea placeholder="Type the Name....." v-model="formData.name"></v-textarea> 
                  <span>{{ errors[0] }}</span> 
                </div>
                </ValidationProvider>
              </v-tab-item>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-suitcase" aria-hidden="true"></i></div>
                    <h3>Business Purpose:</h3>
                    <p>What is the purpose of your business and your main activities?</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Business Purpose" rules ="alpha" v-slot="{ errors }">
                  <div class="custom-form">
                    <v-textarea placeholder="Type Business Purpose....." v-model="formData.business_purpose"></v-textarea>
                      <span>{{ errors[0] }}</span> 
                  </div>
                </ValidationProvider>
              </v-tab-item>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-bullseye" aria-hidden="true"></i></div>
                    <h3>Aim:</h3>
                    <p>What is the single most important aim of this news submission?</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Aim" rules ="alpha" v-slot="{ errors }">
                  <div class="custom-form">
                    <v-textarea placeholder="Type Aim..." v-model="formData.aim"></v-textarea> 
                    <span>{{ errors[0] }}</span> 
                  </div>
                </ValidationProvider>
              </v-tab-item>
            </v-tabs>
          </div>
          <!-- End part 1-->

          <!-- Start part 2-->
          <div class="theme-tabs theme-tabs-alt">    
            <v-tabs centered>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
                    <h3>Overview:</h3>
                    <p>Please provide an overview of your announcement.</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Overview" rules ="alpha" v-slot="{ errors }">
                  <div class="custom-form">
                    <v-textarea placeholder="Type Overview.." v-model="formData.overview"></v-textarea> 
                    <span>{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </v-tab-item>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                    <h3>Benefits:</h3>
                    <p>What are the benefits of the announcement for readers?</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Benefits" rules ="alpha" v-slot="{ errors }">
                  <div class="custom-form">
                    <v-textarea placeholder="Type Benefits.." v-model="formData.benefits"></v-textarea> 
                    <span>{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </v-tab-item>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-users" aria-hidden="true"></i></div>
                    <h3>Audience:</h3>
                    <p>Who is the target audience?</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Audience" rules ="alpha" v-slot="{ errors }">
                  <div class="custom-form">
                    <v-textarea placeholder="Type Audience.." v-model="formData.audience"></v-textarea> 
                    <span>{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </v-tab-item>
            </v-tabs>
          </div>
          <!-- End part 2-->

          <!-- Start part 3-->
          <div class="theme-tabs theme-tabs-alt">    
            <v-tabs centered>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                    <h3>Spokesperson:</h3>
                    <p>Provide a spokespersons quote(including name & position).</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Spokesperson" rules ="alpha" v-slot="{ errors }">
                  <div class="custom-form">
                    <v-textarea placeholder="Type Spokesperson.." v-model="formData.spokesperson"></v-textarea> 
                    <span>{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </v-tab-item>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-external-link" aria-hidden="true"></i></div>
                    <h3>Examples:</h3>
                    <p>Provide some example news agencies, newspapers, websites, magazines etc that you would like to gain coverage in.</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Examples" rules ="alpha" v-slot="{ errors }">
                  <div class="custom-form">
                    <v-textarea placeholder="Type Examples.." v-model="formData.examples"></v-textarea> 
                    <span>{{ errors[0] }}</span>
                  </div>
                </ValidationProvider>
              </v-tab-item>
              <v-tab>
                <div class="vtabIn">
                  <div class="vtabIn-cont">
                    <div class="vtabIcon"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></div>
                    <h3>Additional Notes:</h3>
                    <p>Provide any additional information or instructions for our editors.</p>
                    <div class="viewAns"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tap & Write Something..</div>
                  </div>
                </div>
              </v-tab>
              <v-tab-item>
                <ValidationProvider name="Additional" rules ="alpha" v-slot="{ errors }">
                <div class="custom-form">
                  <v-textarea placeholder="Type Additional Notes.." v-model="formData.additional_notes"></v-textarea> 
                  <span>{{ errors[0] }}</span>
                </div>
                </ValidationProvider>
              </v-tab-item>
            </v-tabs>
          </div>
          <!-- End part 3-->
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
        methods:{
          onSubmit() {
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

                axios.post('http://localhost:8000/api/pr-copy-writing', this.formData)
                    .then(res => {
                         this.snackbarColor='success';
                          this.snackbarText=res.data.msg;
                          this.snackbarTtimeout=6000;
                          this.snackbar=true;
                        console.log('response',res.data);
                        if(res.data.has_error == 0 ){
                          console.log('Successfully created PR copy writing...');
                            this.$router.push({name: 'copyright-listing'})
                                        .then(res => console.log('successfully Created Pr Copy Writeing..!'))
                                        .catch(err => console.log(err))
                        } else {
                            this.alertText=res.data.msg;
                            this.showAlert=true;
                        }
                    })
                    .catch(err => {
                       this.snackbarColor='error';
                       this.snackbarText=err
                       this.snackbarTtimeout=6000;
                       this.snackbar=true;
                    })
          },
          showNameFieldError:function(error){
            if (Array.isArray(error) && error.length > 0 ){
              // this.$set(this.validationError, 'name', error[0]);
                // this.validationError.push=(Object.assign({},{name:error[0]}));
                // this.validationError.$set(name, error[0]);
                this.$set( this.validationError, 'name', error[0]);
            }else{
                  // delete this.validationError["name"];
            }
              console.log('validationn error ',this.validationError);
              this.showValidationError();
          },
          showValidationError:function (){
            
            if (Array.isArray(this.validationError) && this.validationError.length > 0 ){
              console.log('validation   sss');
              this.snackbarText='';
              let newSnackbarText;
              this.validationError.map(function(val, index){ 
                
                  newSnackbarText +=val;
              }) 
              this.snackbarText=newSnackbarText;
              console.log('snackbar',this.snackbarText);
                this.snackbarColor='error';
                this.snackbarTtimeout=6000;
                this.snackbar=true;
            } else{
              console.log('empty array');
            }
          },
          scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          }

        },
          mounted() {
           this.scrollToElement('here-banner small');
        },
    }
</script>


<style scoped></style>

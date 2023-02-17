<template>
    <div class="main">

<HeaderComponent/>

<section class="here-banner small">
    <b-container>
        <b-row class="align-items-center">
        <b-col lg="12">
            <h1>Contact Us</h1>
        </b-col>
        </b-row>
    </b-container>
</section>

<div class="wrap-bg">
    <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >Contact Us</a></li>
      </ul>
    </div>
  </section>

  <b-container>
  <div class="contact-info">
    <b-row>
       <b-col xl="4">
         <div class="contact-single">
             <h2>Head Office</h2>
             <p>Atmedia Ltd <br> 132-134 Great  Street <br> Manchester <br> M1 2JQ</p>
         </div>  
       </b-col> 
      <b-col xl="4">
         <div class="contact-single">
             <h2>Branch Office</h2>
             <p>Abernays, <br> Borsigstr. 9 <br> Berlin, Berlin <br> 10115, Califonia</p>
         </div>  
       </b-col> 
      <b-col xl="4">
         <div class="contact-single">
             <h2>Contact Us</h2> 
             <p>Support: <a href="mailto:">support@bernays.co.uk</a> <br>
                Sales: <a href="mailto:">sales@bernays.co.uk</a><br>
                Editorial: <a href="mailto:">editorial@bernays.co.uk</a><br>
                Partnerships: <a href="mailto:">partners@bernays.co.uk</a></p>
         </div>  
       </b-col>        
    </b-row>
  </div>

  <div class="contact-form">
    <h2>Feel free to contact</h2>
    <div class="contact-form-main">
    <b-row>
        <b-col xl="4">
            <div class="contact-form-left">
                <h2>Operating Hours: </h2>
                <p><strong>Monday - Friday:</strong> <br> 9am - 5pm GMT.</p>
                <p><strong>Saturday - Sunday:</strong> <br> Limited Support. We aim to respond to enquiries within 15-30 minutes.</p>
            </div>
        </b-col>
        <b-col xl="8">
        <div class="contact-form-right custom-form">
          <ValidationObserver v-slot="{ invalid  }">
            <form @submit.prevent="onSubmit">
               <v-alert
                      type ="error"
                      v-model="showAlert"
                      dismissible
                      class="multi-line"
                      >
                    <p v-html="alertText"></p>
                </v-alert>
                 <v-snackbar v-model="showSnackbar" >
                      {{ snackbarText }}

                    <template v-slot:action="{ attrs }">
                      <v-btn
                        color="pink"
                        text
                        v-bind="attrs"
                        @click="snackbar = false"
                      >
                        Close
                      </v-btn>
                    </template>
                  </v-snackbar>
                 
                 
              <v-row>
                 <v-col lg="6" cols="12">
                   <ValidationProvider name="Name" rules ="required" v-slot="{ errors }">
                    <v-text-field
                      label="Name"
                      
                      placeholder="Add your name here"
                      v-model="formData.name"
                      >
                    </v-text-field>  
                    <span class="validation-error">{{ errors[0] }}</span> 
                    </ValidationProvider>
                 </v-col> 
                 <v-col lg="6" cols="12">
                   <ValidationProvider name="Email" rules ="required" v-slot="{ errors }">
                   <v-text-field 
                      v-model="formData.email"
                      label="Email"
                     
                      placeholder="Add your email here"
                      >
                    </v-text-field>  
                     <span class="validation-error">{{ errors[0] }}</span> 
                    </ValidationProvider>
                 </v-col> 
              </v-row>  
              <v-row>
                 <v-col lg="6" cols="12">
                <ValidationProvider name="Phone" rules ="required" v-slot="{ errors }">
                   <v-text-field 
                   label="Phone"
                   v-model="formData.phone"
                    placeholder="Add phone number here">
                   </v-text-field> 
                    <span class="validation-error">{{ errors[0] }}</span> 
                  </ValidationProvider> 
                 </v-col> 
                 <v-col lg="6" cols="12">
                  <ValidationProvider name="Account ID"  v-slot="{ errors }">
                   <v-text-field
                      v-model="formData.account_id"                      
                      label="Account ID"
                      
                      placeholder="Add account ID(if applicable)"
                      >
                   </v-text-field>
                    <span class="validation-error">{{ errors[0] }}</span> 
                  </ValidationProvider>  
                 </v-col> 
              </v-row>
              <ValidationProvider name="Query" rules ="required" v-slot="{ errors }">  
                <v-textarea
                  v-model="formData.query"
                  label="Query"
                 
                  placeholder="Add your query here"
                  >
                </v-textarea>
                <span class="validation-error">{{ errors[0] }}</span> 
              </ValidationProvider>  
              <v-btn 
                type="submit" 
                :loading="formLoader"
                :disabled="invalid "
                color="btn-auto merg-top" 
              >Submit Query
              </v-btn>
            </form>
          </ValidationObserver> 
        </div>
        </b-col>
    </b-row>
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
    export default {
        components: {
            'HeaderComponent' : HeaderComponent,
            'FooterComponent':FooterComponent
        },
         data() {
            return {
               valid: true,
                showAlert:false,
                show1: false,
                alertText:"You've got <strong> 5</strong>new updates on your timeline!. \n hjj \n ddd",
                formLoader:false,
                showSnackbar:false,
                snackbarText:"",
              formData:{
                  name:"",
                  email:"",
                  phone:"",
                  account_id:"",
                  query:"",
                },
               
               
                 
              loading: false,
                snackbar: false,
                text: ""
            }
        },
        methods:{
           async onSubmit() {
              this.formLoader=true;
              this.snackbarText="Processing.Please Wait..."
              this.showSnackbar=true;
              apiService.hitContactUsApi(this.formData)
                        .then(res => {
                              if(res.has_error == 0 ) {
                                  this.snackbarText=res.msg;
                                  this.showSnackbar=true;
                                  this.$refs.observer.reset();
                              } else {
                                  this.alertText=res.msg;
                                  this.showAlert=true;
                              }
                          })
                          .catch(err => {
                              this.text = err.response;
                              this.loader=false;
                              this.snackbar = true
                          });
            
            },


       
              scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          }

        },
         created() {
            this.$vuetify.theme.dark = false
        },
         mounted() {
           this.scrollToElement('contact-form');
        },


    }
</script>

<style scoped>

</style>

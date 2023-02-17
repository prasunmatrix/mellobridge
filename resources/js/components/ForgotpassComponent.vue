<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Forgot Password</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
       <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >Forgot Password</a></li>
      </ul>
    </div>
  </section>

  <section class="login-wrap">
    <b-container>
      <div class="login-container">
        <b-row>
          <b-col lg="6" class="with-bdr">
            <div class="login-left">
              <div class="login-left-main">
              <h2>Don't have a Bernays account yet?</h2>
              <h3>Sign up now to:</h3>
              <ul class="listN">
                <li>
                  <a href="">
                    <div class="listIcon"><img src="/assets/images/icon-1.png" alt=""></div>
                    <span>Publish a</span> press release
                    </a>
                </li>
                <li>
                  <a href="">
                    <div class="listIcon"><img src="/assets/images/icon-2.png" alt=""></div>
                    <span>Create a</span> company newsroom
                    </a>
                </li>
                <li>
                  <a href="">
                    <div class="listIcon"><img src="/assets/images/icon-3.png" alt=""></div>
                    <span>Distribute a press</span> release to journalists
                    </a>
                </li>
                <li>
                  <a href="">
                    <div class="listIcon"><img src="/assets/images/icon-4.png" alt=""></div>
                    <span>Gain quality press</span> coverage and exposure
                    </a>
                </li>
              </ul>
              </div>
            </div>
          </b-col>
          <b-col lg="6">
            <div class="login-right">
              <h2>Forgot Your Password ?</h2>
              <div class="custom-form">
                <v-alert
                      :type="alertType"
                      v-model="showAlert"
                      dismissible
                      :active=false
                  >
                      {{ alertText }}
                  </v-alert>
                <v-form ref="form"
                        v-model="valid">
                  <v-text-field v-model="email"
                                :rules="emailRules"
                                label="Email"
                                placeholder="Your Email Address"
                                required></v-text-field>    
                  <v-btn color="secondary"
                        :loading="loader"
                        @click="forgotPass"
                        :disabled="!valid">Submit</v-btn>
                </v-form>
              </div>
            </div>
          </b-col>
        </b-row>

      </div>
    </b-container>
  </section>

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
        data:()=>{
          return{
            valid: true,
            email: "",
            showAlert:false,
            show1: false,
            alertText:"",
            loader:false,
            alertType:'error',
            emailRules: [
                          v => !!v || 'E-mail is required',
                          v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                        ],
          }
        },
        created() {
            this.$vuetify.theme.dark = false
        },
         mounted() {
           this.scrollToElement('login-wrap');
        },
        methods:{
          scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          },
          forgotPass: function (e) {  
              this.loader=true;
               apiService.hitForgotPass({'email': this.email})
                    .then(res => {
                      console.log('forgot response',res);
                        this.loader=false;
                        if(res.has_error == 0 ){
                            this.alertType="success"
                            this.alertText=res.msg;
                            this.showAlert=true;
                        } else {
                            this.alertText=res.msg;
                            this.showAlert=true;
                        }
                    })
                    .catch(err => {
                        this.text = err.response;
                        this.loader=false;
                        this.snackbar = true
                    })
            },
        }

    }
</script>


<style scoped></style>

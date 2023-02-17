<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Login</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a>Login</a></li>
      </ul>
    </div>
  </section>

  <section class="login-wrap">
    <b-container>
      <div class="login-container">
        <b-row class="align-items-center">
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
              <h2>Login to your Bernays account</h2>
              <div class="custom-form">
                  <v-alert
                      type="error"
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

                                required>

                  </v-text-field>
                  <v-text-field v-model="password"
                                :rules="passwordRules"
                                label="Password"
                                placeholder="* * * * * * * *"
                                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                :type="show1 ? 'text' : 'password'"
                                @click:append="show1 = !show1"
                                required>

                  </v-text-field>
                  <b-row class="submit-sec align-items-center">
                    <b-col><v-btn :loading="loader"
                                  color="btn-auto"
                                  @click="login"
                                  :disabled="!valid"
                    >Login</v-btn></b-col>
                    <b-col class="text-right"><router-link :to="{name:'forgot-pass'}">Forgot Password?</router-link></b-col>
                  </b-row>
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
        data() {
            return {
                valid: true,
                showAlert:false,
                show1: false,
                alertText:"",
                email: "",
                loader:false,
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],
                password: "",
                passwordRules: [
                    v => !!v || 'Password is required',
                ],
                loading: false,
                snackbar: false,
                text: ""
            }
        },
        methods: {
            login: function () {  
              this.loader=true;
              NProgress.start()
               apiService.hitLoginApi({'email': this.email, 'password': this.password})
                    .then(res => {
                        this.loader=false;
                        NProgress.done()
                        if(res.has_error == 0 ){
                            localStorage.setItem('token', res.api_token);
                            localStorage.setItem('user_obj', JSON.stringify(res.user));
                            localStorage.setItem('loggedIn', true);
                            this.$router.push({name: 'Dashboard'})
                                .then(res => {

                                })
                                .catch(err => {

                                })
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
           this.scrollToElement('login-wrap');
        },

    }
</script>


<style scoped></style>

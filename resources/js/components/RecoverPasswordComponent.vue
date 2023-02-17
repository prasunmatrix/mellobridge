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
        <li><a >Recover Password</a></li>
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
              <h2>Recover Your Password</h2>
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
                  <v-text-field v-model="password"
                                :rules="passwordRules"
                                label="New Password"
                                placeholder="* * * * * * * *"
                                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                :type="show1 ? 'text' : 'password'"
                                @click:append="show1 = !show1"
                                required>

                  </v-text-field>
                  <v-text-field v-model="newPassword"
                                :rules="newPasswordRules"
                                label="Confirm Password"
                                placeholder="* * * * * * * *"
                                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                :type="show2 ? 'text' : 'password'"
                                @click:append="show2 = !show2"
                                required>

                  </v-text-field>
                     
                  <v-btn color="secondary"
                        :loading="loader"
                        @click="recoverPass"
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
            password: "",
            email:'',
            user_id:0,
            newPassword:"",
            newPasswordRules:[ v => !!v || 'New Password is required' ],
            showAlert:false,
            show1: false,
            alertText:"",
            show2:false,
            loader:false,
            alertType:'error',
            passwordRules: [ v => !!v || 'Password is required' ],
          }
        },
        created() {
            this.$vuetify.theme.dark = false
        },
         mounted() {
           this.scrollToElement('login-wrap');
           this.user_id =this.$route.params.userId;
           this.getUserEmail();
           console.log('mounted');
        },
        methods:{
          getUserEmail(){
            console.log('getUserEmail');
            apiService.hitUserEmailDetails(this.user_id).then(response=>{
              if(response.has_error == 0){
                this.email=response.data.email;
              } else{
                  this.alertText=response.msg;
                  this.showAlert=true;
              }
            })
          },
          scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          },
          recoverPass: function (e) {  
             console.log('recoverPass');
              this.loader=true;
               apiService.hitRessetPass({'new_password':this.password,'confirm_password':this.newPassword,'user_id':this.user_id})
                    .then(res => {
                     
                        this.loader=false;
                        if(res.has_error == 0 ){
                            this.alertType="success"
                            this.alertText=res.msg;
                            this.showAlert=true;
                             this.$router.push({name: 'Login'})
                                        .then(res => console.log('successfully recovered password!'))
                                        .catch(err => console.log(err))
                        } else {
                           this.alertType="error"
                            this.alertText=res.error;
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

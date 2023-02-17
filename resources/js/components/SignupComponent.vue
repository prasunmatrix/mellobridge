<template>
    <div class="main">
        <HeaderComponent/>
        <section class="here-banner small">
            <b-container>
                <b-row class="align-items-center">
                    <b-col lg="12">
                        <h1>Sign Up</h1>
                    </b-col>
                </b-row>
            </b-container>
        </section>
        <div class="wrap-bg">
            <section class="page-breadcrumb">
                <div class="container">
                    <ul>
                        <li><router-link :to="{name:'Home'}">Home</router-link></li>
                        <li><router-link :to="{name:'signup'}">Sign Up</router-link></li>
                    </ul>
                </div>
            </section>
            <section class="login-wrap">
                <b-container>
                    <div class="login-container">
                        <v-alert
                            type="error"
                            v-model="showAlert"
                            dismissible
                            :active=false
                            class="multi-line"
                            v-html="alertText" >
                        </v-alert>
                        <div class="register-form">
                            <ValidationObserver v-slot="{ invalid }">
                                <form @submit.prevent="signup">
                                    <b-row>
                                        <b-col lg="6">
                                            <div class="login-left">
                                                <div class="custom-form for-register">
                                                    <ValidationProvider name="Full Name" 
                                                                        rules ="required" 
                                                                        v-slot="{ errors }">
                                                        <v-text-field
                                                            v-model="name"
                                                            label="Full Name"
                                                            placeholder="Your Name here"
                                                            required
                                                            :error-messages="errors">
                                                        </v-text-field>
                                                    </ValidationProvider>
                                                    <ValidationProvider name="Password" 
                                                                        rules ="required" 
                                                                        v-slot="{ errors }">
                                                        <v-text-field
                                                            v-model="password"
                                                            name="password"
                                                            label="Password"
                                                            placeholder="* * * * * * * *"
                                                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                                            :type="show1 ? 'text' : 'password'"
                                                            @click:append="show1 = !show1"
                                                            required 
                                                            :error-messages="errors">
                                                        </v-text-field>
                                                        <span>{{ errors[0] }}</span>
                                                    </ValidationProvider>
                                                    <ValidationProvider name="Phone" 
                                                                        rules ="required|numeric|min:8|max:10" 
                                                                        v-slot="{ errors }">
                                                        <v-text-field v-model="phone"
                                                                    label="Phone"
                                                                    placeholder="Your Phone No"
                                                                    required
                                                                    :error-messages="errors" >
                                                        </v-text-field>
                                                    </ValidationProvider>
                                                    <ValidationProvider name="Terms." 
                                                                        rules ="required" 
                                                                        v-slot="{ errors }">
                                                        <div>
                                                            <v-checkbox v-model="termsCondition"
                                                                        required>
                                                                <template slot="label">
                                                                    By submitting this form you agree to our 
                                                                    <router-link @click.stop 
                                                                        :to="{name:'terms-and-conditions'}"
                                                                        target="_blank">
                                                                    &nbsp;&nbsp;Terms.</router-link>
                                                                </template>
                                                            </v-checkbox>
                                                        </div>
                                                        <span>{{ errors[0] }}</span>
                                                    </ValidationProvider>
                                                </div>
                                            </div>
                                        </b-col>
                                        <b-col lg="6">
                                            <div class="login-right">
                                                <div class="custom-form for-register">
                                                    <ValidationProvider name="Email." 
                                                                        rules ="required|email" 
                                                                        v-slot="{ errors }">
                                                        <v-text-field v-model="email"
                                                                    label="Email"
                                                                    placeholder="Your Email Address"
                                                                    required
                                                                    :error-messages="errors" >
                                                        </v-text-field>
                                                    </ValidationProvider>
                                                    <ValidationProvider name="Confirm Password." 
                                                                        rules ="required" 
                                                                        v-slot="{ errors }">
                                                        <v-text-field label="Confirm Password"
                                                                    v-model="confirmPassword"
                                                                    placeholder="* * * * * * * *"
                                                                    :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                                                    :type="show2 ? 'text' : 'password'"
                                                                    @click:append="show2 = !show2"
                                                                    required
                                                                    :error-messages="errors" >
                                                        </v-text-field>
                                                    </ValidationProvider>
                                                    <ValidationProvider name="Image" 
                                                                        rules="ext:jpg,png|size:2048|required" 
                                                                        v-slot="{ errors }">
                                                        <b-row class="submit-sec align-items-center">
                                                            <b-form-file
                                                                v-model="file"
                                                                ref="image"
                                                                accept="image/*"
                                                                @change="onFilePicked"
                                                                label="upload brand image"
                                                                placeholder="upload brand image"
                                                                drop-placeholder="Drop file here...">
                                                            </b-form-file>
                                                         </b-row>
                                                    <span style="color:red">{{ errors[0] }}</span>
                                                    </ValidationProvider>
                                                    <b-row class="submit-sec align-items-center">
                                                            <div>
                                                                <vue-recaptcha
                                                                    :sitekey="siteKey"
                                                                    :loadRecaptchaScript="true"
                                                                    @verify="mxVerify" >
                                                                </vue-recaptcha>
                                                            </div>
                                                    </b-row>
                                                    <b-row class="submit-sec align-items-center">
                                                            <v-btn type="submit"
                                                                :loading="loader"
                                                                color="secondary"
                                                                :disabled="invalid || confirmCaptcha == false">
                                                                Sign Up
                                                            </v-btn>
                                                    </b-row>
                                                </div>
                                            </div>
                                        </b-col>
                                    </b-row>
                                </form>
                            </ValidationObserver>
                            <div class="has-login">
                                <p><span>Already Have Account?</span></p>
                                <router-link :to="{name:'Login'}">
                                    <v-btn type="submit" 
                                           color="btn-auto">Login</v-btn>
                                </router-link>
                            </div>
                        </div>
                        <div class="good-company">
                            <h2 class="text-center">You're in good company</h2>
                            <img src="/assets/images/comp-img-2.png" alt="">
                        </div>
                    </div>
                </b-container>
                <v-snackbar
                    v-model="snackbar"
                    :multi-line="multiLine">
                    {{ snackbarText }}
                    <template v-slot:action="{ attrs }">
                        <v-btn
                            color="red"
                            text
                            v-bind="attrs"
                            @click="snackbar = false" >
                            Close
                        </v-btn>
                    </template>
                </v-snackbar>
            </section>
        </div>
        <FooterComponent/>
    </div>
</template>
<script src="https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script>
<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    import VueRecaptcha from 'vue-recaptcha';
    import apiService from '../services/apiService';

    export default {
        components: {
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent,
            'vue-recaptcha': VueRecaptcha
        },
        data: () => ({
            siteKey: process.env.MIX_RECAPTCHA_SITE_KEY,
            valid: true,
            loader:false,
            snackbar:false,
            termsCondition:'',
            show1: false,
            show2:false,
            snackbarText:'test snakbar',
            alertText:'',
            showAlert:false,
            multiLine: true,
            recaptcha:'',
            file: [],
            confirmCaptcha:false,
            name: '',
            phone:'',
            imageUrl: '',
            imageFile: '',
            password: '',
            email: '',            
            confirmPassword:'',
        }),
        methods: {
            onFilePicked(e) {
                const files = e.target.files
                if (files[0] !== undefined) {
                    this.imageName = files[0].name
                    if (this.imageName.lastIndexOf('.') <= 0) {
                        return
                    }
                    const fr = new FileReader()
                    fr.readAsDataURL(files[0])
                    fr.addEventListener('load', () => {
                        this.imageUrl = fr.result
                        this.imageFile = files[0] 
                    })
                }
            },
            mxVerify(response) {
                this.confirmCaptcha=true;
                this.recaptcha=response;
            },
            signup: function () {
                NProgress.start()
                this.loader=true;
                this.snackbar=true;
                this.snackbarText= "Processing..."
                let formData = new FormData()
                formData.append('name', this.name)
                formData.append('email', this.email)
                formData.append('password', this.password)
                formData.append('recaptcha',this.recaptcha)
                formData.append('phone',this.phone)
                formData.append('confirm_password', this.confirmPassword)
                formData.append('profile_pic', this.imageFile)
                apiService.hitRegisterApi(formData)
                          .then(res => {
                                if(res.has_error == 0 ){
                                    this.snackbarText=res.msg;
                                    NProgress.done()
                                    setTimeout(()=>{
                                        this.$router.push({name: 'Login'})
                                        .then(res => console.log('successfully Registered!'))
                                        .catch(err => console.log(err)) 
                                    }, 2000);

                                } else {
                                    if (Array.isArray(res.msg) && res.msg.length > 0 ){
                                        let errorMsg='';
                                        res.msg.map(msgData => {
                                            errorMsg += msgData+'\n';
                                        })
                                        this.alertText=errorMsg
                                    } else {
                                        this.alertText= res.msg;
                                    }
                                    this.scrollToElement('login-container');
                                    this.loader=false;
                                    this.showAlert=true
                                    this.snackbar = false
                                }
                          })
                          .catch(err => {
                            this.text = err.response.data.status;
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
        mounted() {
           this.scrollToElement('here-banner small');
        },
    }
</script>


<style scoped>
.mdi-eye{
    margin-top : 140% ;
}
.mdi-eye-off{
    margin-top : 140% ;
}

</style>

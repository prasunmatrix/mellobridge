<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Edit Profile</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{name:'Dashboard'}">Dashboard</router-link></li>
        <li><a>Edit Profile</a></li>
      </ul>
    </div>
  </section>

  <section class="login-wrap">
    <b-container>
      <div class="login-container">
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
        <b-row>
          <b-col lg="3" class="with-bdr">
            <ValidationProvider name="profile_pic" rules ="required" v-slot="{ errors }">
            <div class="profile-pic"><img v-bind:src="formData.profile_pic_url" alt=""></div>
             <span class="validation-error">{{ errors[0] }}</span> 
            </ValidationProvider>
            <div class="profileDesc">
              <p><strong>{{formData.name}}</strong></p>
              <p><em>{{formData.phone}}</em></p>
            </div>
            <div class="profile-btn">
            <b-form-file
                v-model="formData.profile_pic"
                ref="image"
                accept="image/*"
                @change="onFilePicked"
                label="upload brand image"
                placeholder="Upload Image"
                drop-placeholder="Drop file here..."
            ></b-form-file>
            </div>
          </b-col>
          <b-col lg="9">
            <div class="login-right">
              <h2>Personal information:</h2>
              <div class="custom-form">
                <b-row>
                  <b-col lg="6">
                    <ValidationProvider name="Name" rules ="required" v-slot="{ errors }">
                      <v-text-field 
                        label="Name:" 
                        v-model="formData.name"
                        placeholder="Edit Name">
                      </v-text-field>
                      <span class="validation-error">{{ errors[0] }}</span> 
                    </ValidationProvider>
                      </b-col>
                  <b-col lg="6">
                    <v-text-field 
                    label="Email:"
                    v-model="formData.email"
                    :disabled="valid"
                    placeholder="Edit Email">
                   </v-text-field> 
                   </b-col>
                  <b-col lg="6">
                    <ValidationProvider name="Phone" rules ="required" v-slot="{ errors }">
                    <v-text-field 
                        label="Phone:" 
                        v-model="formData.phone"
                        placeholder="Edit Phone">
                    </v-text-field> 
                    <span class="validation-error">{{ errors[0] }}</span> 
                    </ValidationProvider>
                      </b-col>
                </b-row>
                  
                  <h2 class="alt">Social information:</h2> 
                  <b-row>
                    <b-col lg="6">
                       <ValidationProvider name="Facebook" rules ="required" v-slot="{ errors }">
                      <v-text-field 
                      label="Facebook:"
                      v-model="formData.facebook_url"
                       placeholder="Facebook URL">
                        </v-text-field> 
                        <span class="validation-error">{{ errors[0] }}</span> 
                    </ValidationProvider>
                    </b-col>
                    <b-col lg="6">
                      <ValidationProvider name="Youtube" rules ="required" v-slot="{ errors }">
                        <v-text-field 
                        label="Youtube:" 
                        v-model="formData.youtube_url"
                        placeholder="Youtube URL">
                        </v-text-field> 
                        <span class="validation-error">{{ errors[0] }}</span> 
                    </ValidationProvider> 
                      </b-col>
                    <b-col lg="6">
                       <ValidationProvider name="Website" rules ="required" v-slot="{ errors }">
                      <v-text-field 
                      label="Website:"
                      v-model="formData.website"
                       placeholder="Website URL">
                       </v-text-field>
                       <span class="validation-error">{{ errors[0] }}</span> 
                      </ValidationProvider>   
                    </b-col>
                    <b-col lg="6">
                      <ValidationProvider name="Twitter" rules ="required" v-slot="{ errors }">
                        <v-text-field 
                        label="Twitter:" 
                        v-model="formData.twitter_url"
                        placeholder="Twitter URL">
                        </v-text-field> 
                        <span class="validation-error">{{ errors[0] }}</span> 
                      </ValidationProvider> 
                    </b-col>
                    <b-col lg="6">
                      <ValidationProvider name="Linkedin" rules ="required" v-slot="{ errors }">
                        <v-text-field 
                        label="Linkedin:" 
                        v-model="formData.linkedin_url"
                        placeholder="Linkedin URL">
                        </v-text-field> 
                        <span class="validation-error">{{ errors[0] }}</span> 
                      </ValidationProvider> 
                    </b-col>
                    <b-col lg="6">
                      <ValidationProvider name="Additional info" rules ="" v-slot="{ errors }">
                        <v-text-field 
                        label="Additional Info:" 
                        v-model="formData.aditional_info"
                        placeholder="Additional Info">
                        </v-text-field> 
                        <span class="validation-error">{{ errors[0] }}</span> 
                      </ValidationProvider> 
                    </b-col>
                  </b-row>
                  
                  <v-btn style="margin-top:40px;" color="btn-auto"
                   type="submit" 
                  :loading="formLoader"
                  :disabled="invalid"
                
                  >Save Profile

                  </v-btn>
              </div>
            </div>
          </b-col>
        </b-row>
        </form>
      </ValidationObserver> 
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
       
        

        mounted() {
           
            apiService.hitshowupdateUserApi()
                .then(resp=> {
                  console.log('response', resp);
                  let Usrobj=JSON.parse(resp.setting_json);
                  console.log('vz', Usrobj);
                    
                    this.formData.name = resp.name;
                    this.formData.email = resp.email;
                    this.formData.phone = resp.phone;
                    this.formData.profile_pic_url=resp.image_url;
                     this.formData.facebook_url = Usrobj.facebook_url;
                    this.formData.youtube_url = Usrobj.youtube_url;
                    this.formData.website = Usrobj.website;
                    this.formData.twitter_url = Usrobj.twitter_url;
                    this.formData.linkedin_url = Usrobj.linkedin_url;
                    this.formData.aditional_info= Usrobj.additional_info;
               
                })
                .catch(function () {
                    alert("Could not load your user  Profile")
                });
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
                  facebook_url:"",
                  youtube_url:"",
                  website:"",
                  twitter_url:"",
                  linkedin_url:"",
                  profile_pic_url:"",
                  aditional_info:"",
                  profile_pic:[]
                },
                
          
              loading: false,
                snackbar: false,
                text: ""
            }
        },
        methods:{
           onSubmit: function (e) {
              this.formLoader=true;
              this.snackbarText="Processing.Please Wait..."
              this.showSnackbar=true;
              

              let profileData = new FormData();
              profileData.append('name',this.formData.name);
              profileData.append('phone',this.formData.phone);
              profileData.append('website',this.formData.website);
              profileData.append('facebook_url',this.formData.facebook_url);
              profileData.append('twitter_url',this.formData.twitter_url);
              profileData.append('youtube_url',this.formData.youtube_url);
              profileData.append('linkedin_url',this.formData.linkedin_url);
              profileData.append('additional_info',this.formData.aditional_info);
              profileData.append('profile_pic',this.formData.profile_pic);
              apiService.hitUpdateUserApi(profileData)
                        .then(res => {
                              if(res.has_error == 0 ) {
                                  this.formLoader=false;
                                  this.showSnackbar=false;
                                  this.snackbarText=res.msg;
                                  this.showSnackbar=true;  
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
                        this.formData.profile_pic_url = fr.result
                        this.formData.profile_pic = files[0] // this is an image file that can be sent to server...
                    })
                }
            },

          
        }
    }
</script>


<style scoped></style>

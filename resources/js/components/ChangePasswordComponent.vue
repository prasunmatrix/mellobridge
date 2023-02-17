<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Change Password</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{name:'Dashboard'}">Dashboard</router-link></li>
        <li><a>Change Password</a></li>
      </ul>
    </div>
  </section>

  <section class="login-wrap">
    <b-container>
      <div class="login-container">
        <b-row>
          <b-col lg="9">
            <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(onSubmit)">
                <div class="custom-form">
                    <h2 class="alt">Change Password:</h2> 
                    <b-row>
                      
                      <b-col lg="12">
                        <ValidationProvider name="Old Password" rules ="required" v-slot="{ errors }">
                          <v-text-field label="Old Password:" placeholder="Old Password" v-model="formData.oldPassword"></v-text-field> 
                          <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                      </b-col>
                        
                      <b-col lg="12">
                        <ValidationProvider name="New Password" rules ="required" v-slot="{ errors }">
                          <v-text-field label="New Password:" placeholder="New Password" v-model="formData.newPassword"></v-text-field>
                          <span>{{ errors[0] }}</span>
                        </ValidationProvider>  
                        </b-col>
                      <b-col lg="12">
                        <ValidationProvider name="Confirm Password" rules ="required" v-slot="{ errors }">
                          <v-text-field label="Confirm Password:" placeholder="Confirm Password" v-model="formData.confirmPassword"></v-text-field>  
                          <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                        </b-col>
                    </b-row>
                    <b-button type="submit" variant="primary">Submit</b-button>
                </div>
                </form>
            </ValidationObserver>
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
    export default {
        components: {
            'HeaderComponent' : HeaderComponent,
            'FooterComponent':FooterComponent
        },
        created() {
            this.$vuetify.theme.dark = false
        },
        data: () => ({
            formData:{
              oldPassword:'',
              newPassword:'',
              confirmPassword:''
            }
        }),
        methods:{
          onSubmit() {
              this.$router.push({name: 'Dashboard'})
                                  .then(res => console.log('successfully Created Pr Copy Writeing..!'))
                                  .catch(err => console.log(err))
          }
        },
        mounted() {
          console.log('Change PasswordComponent mounted.')
      }

    }
</script>


<style scoped>
span{
  color: red;
  display: block;
}
</style>

<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Privacy Policy</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a>Privacy Policy</a></li>
      </ul>
    </div>
  </section>


  <b-container>
    <div class="common-cont">
    <b-row>
    <b-col lg="12">
      <div class="common-cont-left alt" v-html="description">		
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
    export default {
        components: {
            'HeaderComponent' : HeaderComponent,
            'FooterComponent':FooterComponent
        },
        data:() => ({
                description:'',
                slug: 'privacy-policy'
               
        }),
        methods:{
             scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          },
          setprivacylisting(){
           apiService.hitcmslistApi(this.slug)
                .then(resp=> {
                    console.log('privacy', resp);
                    if(resp.has_error == 0){
                      this.description=resp.content[0].description;
                        // this.userName = resp.user_data.name;
                        // this.profile_pic=resp.user_data.image_url;
                        // this.email=resp.user_data.email;
                        // this.phone=resp.user_data.phone;
                       
                    }
                    
                    
                })
                .catch( err=> {
                     console.log('error in privacy policy',err);
                });
          }
      },

           mounted() {
           this.scrollToElement('align-items-center');
           this.setprivacylisting();
        },
    }
</script>


<style scoped></style>

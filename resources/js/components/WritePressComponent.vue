<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Write Press Release</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg white">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Write Press Release</a></li>
      </ul>
    </div>
  </section>


  <b-container v-html="description">
   
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
                slug: 'write-press-release'
               
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
                    console.log('resppp', resp);
                    if(resp.has_error == 0){
                      this.description=resp.content[0].description;
                       
                    }
                    
                    
                })
                .catch( err=> {
                     console.log('error in resppp',err);
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

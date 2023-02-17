<template>
<div class="main">

<HeaderComponent/>

<section class="here-banner small">
  <b-container>
    <b-row class="align-items-center">
      <b-col lg="12">
          <h1>RSS List</h1>
      </b-col>
    </b-row>
  </b-container>
</section>

  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >Rss List</a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <div class="listingWrap alt">
      <h2>RSS / XML Press Release Feeds by Industry</h2>
      <b-row>
        <b-col xl="4" lg="4" cols="6" v-for="item in rssCatArray" :key="item.id">
           <div class="rss-single" >
             <div class="rss-single-icon"></div>
             <router-link :to="{name:'category-press-release',params:{ categoryId: item.slug }}"><p>{{ item.name }}</p></router-link>
             <a class="view-rss" target="_blank" :href="getRssLink(item)">View RSS <i class="fa fa-rss" aria-hidden="true"></i></a>
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
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent
        },
        data() {
            return {
                rssCatArray:[]
            }
        },
        mounted(){
          console.log('mount rss cat list');
          this.getRssCat();
          this.scrollToElement('align-items-center');
        },
        methods:{
          getRssLink(item){
            return '/post-to-xml/'+item.id+'';
          },
           scrollToElement(className) {
              const el = this.$el.getElementsByClassName(className)[0];

              if (el) {
                  el.scrollIntoView();
              }
            },
          getRssCat(){
            apiService.hitCatgoryAPI()
                      .then(res => {
                          if(res.has_error == 0 ){
                              if (Array.isArray(res.data) && res.data.length > 0 ){
                                  res.data.map(catData => {
                                      let catObj= {
                                          name:  catData.name,
                                          id:  catData.id,
                                          slug:catData.slug
                                      };
                                      this.rssCatArray.push(catObj);
                                  });
                              } 
                          }
                      })
                      .catch(err => {
                          console.log('error in category listing api',err);
                      });

          }

        }
    }
</script>


<style scoped></style>

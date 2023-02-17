<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Media</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><router-link :to="{ name: 'media'}" >Media & Journalists</router-link></li>
      </ul>
    </div>
  </section>

  <section class="media-wrap">
     <b-container>
       <div class="media-main">
          <h2>Media & Journalists</h2>
          <h3>Cut through the clutter and get targeted news delivered directly to you by sector.</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an</p>
         <div class="media-single">
           <b-row class="align-items-center">
             <b-col lg="6">
               <div class="media-left">
                 <img src="/assets/images/media-1.jpg" alt="">
               </div>
             </b-col>
             <b-col lg="6">
               <div class="media-right">
                 <h2>Email</h2>
                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly</p>
                 <router-link :to="{name:'subscribe-newsletter'}"><v-btn type="submit" color="btn-auto">Subscribe now</v-btn></router-link>
               </div>
             </b-col>
           </b-row>
         </div>
         <div class="media-single">
           <b-row class="align-items-center">
             <b-col lg="6">
               <div class="media-left">
                 <img src="/assets/images/media-2.jpg" alt="">
               </div>
             </b-col>
             <b-col lg="6">
               <div class="media-right">
                 <h2>RSS</h2>
                 <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over</p>
                 <router-link :to="{name:'rss-list'}"><v-btn color="btn-auto">View RSS feeds</v-btn></router-link>
               </div>
             </b-col>
           </b-row>
         </div>
         <div class="media-single">
           <b-row class="align-items-center">
             <b-col lg="6">
               <div class="media-left">
                 <img src="/assets/images/media-3.jpg" alt="">
               </div>
             </b-col>
             <b-col lg="6">
               <div class="media-right">
                 <h2>Social</h2>
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>
                 <a href="#"><v-btn type="submit" color="btn-auto">Follow @bernays</v-btn></a>
               </div>
             </b-col>
           </b-row>
         </div>
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
          methods:{
             scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          }
          },

           mounted() {
           this.scrollToElement('wrap-bg');
        },

    }
</script>


<style scoped></style>

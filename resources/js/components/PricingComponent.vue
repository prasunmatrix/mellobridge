<template>
<div class="main">
  <HeaderComponent/>
    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Pricing</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg no-pad">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><router-link :to="{ name: 'pricing'}" >Pricing</router-link></li>
      </ul>
    </div>
  </section>

  <section class="pricing">
    <b-container>
      <div class="pricing-main">
        <h2 class="text-center">Pricing & Packages</h2>
        <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        <div class="text-center pricing-btn" >
          <v-btn color="btn-auto"  :class="{ 'active-pricing-btn': setActive(item) }"
                                   @click="getContent(item)" 
                                   v-for="item in subscriptionArray"
                                   :key="item.id" >  
                      {{ item.title }}
          </v-btn> 
        </div>
       
        <div class="priceDiv">{{currencyData}} {{currentPlanPrice}} <span>{{ currentPlanName }}</span> </div>
         <div class="text-center pricing-btn">
            <router-link :to="{name:'signup'}"><v-btn type="submit" color="btn-auto">Subscribe Now</v-btn></router-link>
        </div>
        <div class="pricing-service">
        <b-row>
          <b-col lg="4">
            <a href="">
              <div class="pricing-service-single">
                <div class="pricing-service-img"><img src="/assets/images/press.png" alt=""></div>
                <h3>PRESS RELEASES</h3>
              </div>
            </a>
          </b-col>
          <b-col lg="4">
            <a href="">
              <div class="pricing-service-single">
                <div class="pricing-service-img"><img src="/assets/images/newsroom.png" alt=""></div>
                <h3>NEWSROOMS</h3>
              </div>
            </a>
          </b-col>
          <b-col lg="4">
            <a href="">
              <div class="pricing-service-single">
                <div class="pricing-service-img"><img src="/assets/images/support.png" alt=""></div>
                <h3>Support</h3>
              </div>
            </a>
          </b-col>
        </b-row>
      </div>
      <div class="pricing-link">
        <ul>
          <li><div class="pricing-link-single">Targeted <br> distribution</div></li>
          <li><div class="pricing-link-single">Guaranteed <br> syndication</div></li>
          <li><div class="pricing-link-single">Social media <br> distribution</div></li>
          <li><div class="pricing-link-single">33,000 <br> media subscribers</div></li>
          <li><div class="pricing-link-single">Search engine <br> indexed</div></li>
          <li><div class="pricing-link-single">Release <br> analytics</div></li>
        </ul>
      </div>
      <div class="text-center pricing-btn">
         <router-link :to="{name:'signup'}"><v-btn type="submit" color="btn-auto">SIgn Up</v-btn></router-link>
      </div>
      </div>
    </b-container>
  </section>

  <section class="packages">
    <b-container>
      <h2>All our packages come with:</h2>
      <b-row>
        <b-col lg="6">
          <div class="packages-left">
            <ul>
              <li>
                <div class="packages-left-img"><img src="/assets/images/img-1.jpg" alt=""></div>
                <h3>Attach images & files</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              </li>
              <li>
                <div class="packages-left-img"><img src="/assets/images/img-1.jpg" alt=""></div>
                <h3>Attach images & files</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              </li>
              <li>
                <div class="packages-left-img"><img src="/assets/images/img-1.jpg" alt=""></div>
                <h3>Attach images & files</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              </li>
              <li>
                <div class="packages-left-img"><img src="/assets/images/img-1.jpg" alt=""></div>
                <h3>Attach images & files</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
              </li>
            </ul>
          </div>
        </b-col>
        <b-col lg="6">
          <div class="packages-right"></div>
        </b-col>
      </b-row>
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
            currencyData:'',
            amount:'',
            isActive:false,
            priceingTitle:'',
            description:'',
            subscriptionArray:[],
            currentPlanId:0,
            currentPlanName:'',
            currentPlanPrice:''
          }
        },
        mounted(){
          this.getsubscriptionsList();
          this.scrollToElement('align-items-center');
      },
      methods:{
        setActive(obj){
         if(this.currentPlanId == obj.id)
          return true;
        },
      getsubscriptionsList(){
        apiService.hitsubscriptionslistApi()
                  .then(res => {
                      if(res.has_error == 0 ){
                          if (Array.isArray(res.data) && res.data.length > 0 ) {
                              this.currencyData=res.currency_symbol;
                              this.currentPlanPrice= res.data[1].price;
                              this.currentPlanId  = res.data[1].id;
                              this.currentPlanName = res.data[1].title;
                              res.data.map(subData => {
                                  let subObj= {
                                      title:  subData.title,
                                      id:subData.id,
                                      price:  subData.price,
                                      description:subData.subscription_type_details.title
                                  };
                                  this.subscriptionArray.push(subObj);
                              });
                          } 
                      }
                  })
                  .catch(err => {
                      console.log('error in subcription listing api',err);
                  });
      },
          getContent(obj){
             this.currentPlanPrice= obj.price;
            this.currentPlanId  = obj.id;
            this.currentPlanName = obj.title;
          },
           scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];
                if (el) {
                    el.scrollIntoView();
                }
          }
        },
          
        
    }
</script>


<style scoped></style>

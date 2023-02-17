<template>
<div class="main">

<HeaderComponent/>

<section class="here-banner small">
  <b-container>
    <b-row class="align-items-center">
      <b-col lg="12">
          <h1>Latest Press Release</h1>
      </b-col>
    </b-row>
  </b-container>
</section>

  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Latest Press Release</a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <div class="dash-search forListings">
        <b-row class="align-items-center">
            <b-col lg="6">
                <b-input-group>
                    <b-form-input type="search" placeholder="Search"></b-form-input>
                    <b-input-group-prepend is-text><i class="fa fa-search" aria-hidden="true"></i>
                    </b-input-group-prepend>
                </b-input-group>
            </b-col>
            <b-col lg="6">
                <div>
                  <b-row class="btnSide">
                       <b-col><v-btn type="submit" color="btn-block">View by Sector</v-btn></b-col>
                       <b-col><v-btn type="submit" color="btn-block">Subscribe to feed</v-btn></b-col>
                  </b-row>  
                </div>
            </b-col>
        </b-row>
    </div>

    <div class="listingWrap">
      <b-row>
          <b-col xl="3" lg="4" cols="6"  v-for="item in pressReleaseData" :key="item.id" >
            <div class="listingSingle">
                <div class="listImg"><img src="/assets/images/rss-1.jpg" alt=""></div>
                <div class="listTxt">
                  <h3>{{ item.title }}</h3>
                  <h4>{{ item.date }} I {{ item.userName }} </h4>
                  <p v-html="getBodyHtml(item)" ></p>
                  <a href="">Read More</a>  
                </div>
            </div>  
          </b-col> 
        </b-row>
      <div class="loadMore">
        <v-btn type="submit" color="btn-auto">Load More <i class="fa fa-angle-down" aria-hidden="true"></i></v-btn>
      </div>
    </div>

    

  </b-container>

</div>
<FooterComponent/>


</div>



</template>

<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    import apiService from '../services/apiService';
    import moment from 'moment';

    export default {
        components: {
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent
        },
        data:()=>{
          return{
            pressReleaseData:[],
            categoryParam:''
          }
        },
        created() {
          this.categoryParam =  this.$route.params.categoryId;
        },
        mounted(){
          this.getLatestPressrelese();
        },
        methods:{
          getLatestPressrelese(){
            apiService.hitCategoryPressrelease(this.categoryParam)
                    .then(res => {
                      if(res.has_error == 0 ){
                        if (Array.isArray(res.data.data) && res.data.data.length > 0 ){
                            res.data.data.map(pressData  => {
                                let pressBodyObj = JSON.parse(pressData.content_json);
                                let publishDate=this.getFormattedDate(pressData.publication_date);
                                let pressObj= {
                                    title:  pressData.headline,
                                    id:  pressData.id,
                                    bodyHtml: pressBodyObj.body_text,
                                    date : publishDate,
                                    userName: pressData.user_data.name
                                };
                                this.pressReleaseData.push(pressObj);
                            });
                        } 
                            console.log('pressrelase response',res.data);
                      }
                    })
                    .catch(err => {
                        console.log('error in category press release listing api',err);
                    });
          },
          getBodyHtml(data){
            return data.bodyHtml;
          },
          getFormattedDate(date){
                let newDate = new Date(date);
                newDate= newDate.toString()
                console.log(newDate);
                return moment(newDate).format('LLL');
            },
        }
    }
</script>


<style scoped></style>

<template>
<div class="main">

<HeaderComponent/>

<section class="here-banner small">
  <b-container>
    <b-row class="align-items-center">
      <b-col lg="12">
          <h1>User News Room</h1>
      </b-col>
    </b-row>
  </b-container>
</section>

  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
       <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >User News Room</a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <div class="dash-search forListings">
        <b-row class="align-items-center">
            <b-col lg="5">
                <b-input-group>
                    <b-form-input type="search" placeholder="Search" v-model="searchKeyword" ></b-form-input>
                    <b-btn is-text @click="searchByKeywords()" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </b-btn >
                </b-input-group>
            </b-col>
            <b-col lg="5">
                <div>
                  <b-row class="btnSide">
                       <b-col>
                          <div class="select-filter select-filter1">
                            <select  @change="handleChange">
                              <option>View by category</option>
                                <option v-for="item in catArray" v-bind:value="item.id" :key="item.id">{{item.name}}</option>
                            </select>
                          </div> 

                        </b-col>
                  </b-row>  
                </div>
            </b-col>
            <b-col lg="2">
                <div>
                  <b-row class="btnSide">
                    <b-col>
                      <b-btn is-text @click="resetSearch()" type="submit">
                        Reset Search
                      </b-btn > 
                    </b-col>
                  </b-row>  
                </div>
            </b-col>
        </b-row>
    </div>

    <div class="listingWrap">
      <b-row>
          <b-col xl="3" lg="4" cols="6"  v-for="item in pressReleaseData" :key="item.id" >
            <div class="listingSingle" v-if="hasPostConent == true">
                <div class="listImg">
                  <img v-bind:src="item.image" alt="Media" style="height: 250px; width:100%;" />
                </div>
                  <br>
                <ul class="postTags" >
                  <li v-for="item in item.pressCatgory" :key="item.id" >{{ item.cat_name  }}</li>
                </ul>
                <router-link :to="{ name: 'press-release-details',params:{prId:item.id } }" >
                <div class="listTxt">
                  <h3 v-html="getShortenString(item.title,10)"> </h3>
                  <h4>{{ item.date }} I {{ item.userName }} </h4>
                  <p v-html="getBodyHtml(item)" ></p>
                  
                  <div class="read_more_button">Read More </div>
                </div>
                </router-link>
            </div>  
          </b-col>
            <div class="no-post-avaible" v-if="hasPostConent == false" > 
              <h2>No Post Found</h2>
            </div>
        </b-row>
      <div class="loadMore">
        <v-btn type="submit" v-if="loadmoreData" @click="getNextpage()" color="btn-auto">Load More <i class="fa fa-angle-down" aria-hidden="true"></i></v-btn>
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
            loadmoreData:null,
            pageNo:1,
            searchKeyword:'',
            category:'',
            catArray:[],
            user_id:0,
            hasPostConent:false,
            categoryId:0
            
          }
        },
        mounted(){
          this.user_id=this.$route.params.userId;
          console.log('hitUserNewsRoomApi',this.user_id);
          this.getLatestPressrelese('',1,'',this.$route.params.userId);
          this.scrollToElement('wrap-bg');
          this.getCat();
        },
        methods:{
           resetSearch(){
             this.category=0;
             this.getLatestPressrelese('',1,this.category,this.user_id);
             this.getCat();
              this.searchKeyword= '';
           } ,        
          
          getNextpage(){
              this.getLatestPressrelese(this.searchKeyword,this.pageNo,this.category,this.user_id);
          },
          scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];
                if (el) {
                    el.scrollIntoView();
                }
          },
          getShortenString(str,maxCount){
                let stringArray = str.split(" ");
                if(stringArray.length > maxCount){
                    str ='';
                    stringArray.map(function(currentValue, index){
                        if(maxCount > (index + 1) ){
                            str += currentValue+' '; 
                        }
                        if(index == maxCount){
                            str += ' ...';
                        }
                    })
                }
                return str;
            },
          searchByKeywords(){
            this.pressReleaseData=[];
            this.getLatestPressrelese(this.searchKeyword,1,this.category,this.user_id);
          },

          handleChange(e) {
              if(e.target.options.selectedIndex > -1) {
                console.log(e.target.options[e.target.options.selectedIndex].value)
                let categoryId = e.target.options[e.target.options.selectedIndex].value;
                   //console.log('filter')
                  //console.log(cat_id);
                  this.pressReleaseData=[];
                  this.getLatestPressrelese('',1,categoryId,this.user_id);
              }
          },

          filterData(){
            this.pressReleaseData=[];
            this.getLatestPressrelese('',1,this.category,this.user_id);
          },

          getLatestPressrelese(searchKeyword,pageNo,category,user_id){
            apiService.hitUserNewsRoomApi(searchKeyword,pageNo,category,user_id)
                    .then(res => {
                      if(res.has_error == 0 ){
                        if (Array.isArray(res.data.data) && res.data.data.length > 0 ){
                            this.hasPostConent = true;
                            res.data.data.map(pressData  => {
                                let pressBodyObj = JSON.parse(pressData.content_json);
                                let publishDate=this.getFormattedDate(pressData.publication_date);
                                let postPreviewImage= res.image_path+'assets/pressreleasemedia/no-image.jpg';

                                if(Array.isArray(pressData.pressrelease_data) && pressData.pressrelease_data.length > 0){
                                    pressData.pressrelease_data.map(pressMediadata=>{
                                        if(pressMediadata.media_type == 'file'){
                                            postPreviewImage = res.image_path+'assets/pressreleasemedia/'+pressMediadata.content;
                                        }

                                    })
                                }
                                let pressCat= [];
                                
                                pressData.pressrelease_category_data.map(pressCatData  => {
                                  let pressCatObj = {cat_name:pressCatData.category_details.name,id:pressCatData.category_details.id};
                                  pressCat.push(pressCatObj); 
                                })


                                let pressObj= {
                                    title:  pressData.headline,
                                    id:     pressData.id,
                                    bodyHtml: pressBodyObj.body_text,
                                    date : publishDate,
                                    userName: pressData.user_data.name,
                                    image:postPreviewImage,
                                    pressCatgory:pressCat

                                };
                                this.pressReleaseData.push(pressObj);
                            });
                              let nextPage = res.data.current_page +1;
                              this.pageNo= nextPage;
                              this.loadmoreData= res.data.next_page_url;
                        } else {
                            this.loadmoreData= '';
                            this.hasPostConent =false;
                        }
                            console.log('pressrelase response',res.data);
                      } else{
                            this.loadmoreData= '';
                            this.hasPostConent =false;
                      }
                    })
                    .catch(err => {
                        console.log('error in category listing api',err);
                    });
          },
          getCat(){
                apiService.hitCatgoryAPI()
                          .then(res => {
                              if(res.has_error == 0 ){
                                this.catArray= [];
                                  if (Array.isArray(res.data) && res.data.length > 0 ){
                                      res.data.map(catData => {
                                          let catObj= {
                                              name:  catData.name,
                                              id:  catData.id,
                                          };
                                          this.catArray.push(catObj);
                                      });
                                  } 
                              }
                              console.log('hii',res)
                          })
                          .catch(err => {
                              console.log('error in category listing api',err);
                          });

              },
          getBodyHtml(data){
            return this.getShortenString(data.bodyHtml,20);
          },
          getFormattedDate(date){
                let newDate = new Date(date);
                newDate= newDate.toString()
                console.log(newDate);
                return moment(newDate).format('LL');
            },
        }
    }
</script>


<style scoped></style>

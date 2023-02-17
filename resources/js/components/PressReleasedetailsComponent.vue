<template>
    <div class="main">

<div class="header-static">
  <HeaderComponent/>
</div>

<div class="wrap-bg white">
    <section class="page-breadcrumb">
    <div class="container">
      <ul>
        
        <li><router-link :to="{name:'Dashboard'}"> Dashboard</router-link></li>
        <li><a >Latest Releases </a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <div class="details-container">
      <h1>{{ mediaTitle }}</h1>
      <b-row>
        <b-col lg="4">
          <div class="details-left">
            <div class="company-info">
              <img v-bind:src="postOwnerImgSrc" alt="Media" style="height: 150px;width: 150px;" />
              <h3>{{ postOwnerName }}</h3>
              <p></p>
              <div class="company-contact">
                <p><i class="fa fa-phone" aria-hidden="true"></i>  {{postOwnerPhone}}</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:">  {{ postOwnerEmail}}</a></p>
                <p><i class="fa fa-globe" aria-hidden="true"></i> <a :href="postOwnerWebsite" target="_blank">  {{ postOwnerWebsite }}/</a></p>
              </div>
              <ul class="clearfix">
                <li><a :href="postOwnerFaceBook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a :href="postOwnertwitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a :href="postOwnerYoutube" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a :href="postOwnerLinkedIn" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              </ul>
              <router-link :to="{ name: 'user-news-room',params:{userId:postOwnerId } }" >
                    <v-btn color="btn-auto">Visit Newsroom &nbsp; <i class="fa fa-newspaper-o" aria-hidden="true"></i></v-btn>
                  </router-link>
            </div>
            <div class="category-list">
              <h2>Category</h2>
              <ul>
                <li v-for="item in catArray" :key="item.id">
                  <router-link :to="{ name: 'category-press-release',params:{categoryId:item.id } }" >
                    {{ item.name }}
                </router-link>
                </li>
              </ul>
            </div>
          </div>
        </b-col>
        <b-col lg="8">
          <div class="details-right">
            <div class="post-meta">
              <p>By <strong>{{publishedBy}}</strong> on <strong>{{ publishedOn }}</strong>  </p>
            </div> 
            <div class="post-tags">
              <ul>
                <li v-for="item in mediaCats" :key="item.id" >
                  <router-link :to="{ name: 'category-press-release',params:{categoryId:item.id } }" >
                    {{ item.title }}
                  </router-link>
                </li>
              </ul>
            </div>
            <div class="post-content" v-html="mediaBody">
            </div>
            <div class="similar-post">
              <h2>Media</h2>
              <div class="gallary-image">
              <ul v-for="item in postMedias" :key="item.id" >
                <li v-if="item.media_type == 'embedded_link' ">
                  <div class="similar-post-main" >
                    <iframe width="100%" 
                            height="237" 
                            :src="item.content" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                  </div>
                </li>
                <li v-if="item.media_type == 'file'">
                  <div class="similar-post-main">
                    <img v-bind:src="imageAssetPath+'assets/pressreleasemedia/'+item.content" alt="Media" height="75" width="50%">
                    <p>{{ item.description }} </p>
                  </div>
                </li>
                <li v-if="item.media_type == 'media_link'">
                  <div class="similar-post-main">
                    <a :href="item.content" target="_blank"><img v-bind:src="imageAssetPath+'flaticon/external-link-symbol.png'" alt="Media" height="75" width="50%" ></a>
                  <p>{{ item.description }} </p>
                    
                  </div>
                </li>
              </ul>
              </div>
            </div>

            <div class="recent-post">
              <h2>Recent Posts</h2>
              <div class="recent-post-wrap">
                <div  v-for="item in recentPostReleaseArray" :key="item.id" class="recent-post-single">
                  <img v-bind:src="item.imgSrc" alt="Media">
                  <h3 v-html="getBodyHtml(item)"></h3>
                  <b-btn is-text @click="readMorePress(item.id)" type="submit">
                        read more
                      </b-btn > 
                </div>
              </div>
            </div>

          </div>
        </b-col>
      </b-row>
    </div>

    <div class="media-details">
      <b-row class="align-items-center">
        <b-col lg="4">
          <div class="media-details-single">
            <div class="text-center"><img v-bind:src="postOwnerImgSrc" alt="Media" style="height: 150px;width: 150px;"></div>
          </div>
        </b-col>
        <b-col lg="4">
          <div class="media-details-single">
            <div class="company-info">
              <h3>{{ postOwnerName }}</h3>
              <p></p>
              <div class="company-contact">
                <p><i class="fa fa-phone" aria-hidden="true"></i>  {{postOwnerPhone}}</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:">  {{ postOwnerEmail}}</a></p>
                <p><i class="fa fa-globe" aria-hidden="true"></i> <a :href="postOwnerWebsite" target="_blank">  {{ postOwnerWebsite }}/</a></p>
              </div>
            </div>
          </div>
        </b-col>
        <b-col lg="4">
          <div class="media-details-single">
            <div class="company-info">
              <div class="clearfix">
                <ul class="clearfix">
                  <li><a :href="postOwnerFaceBook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a :href="postOwnertwitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a :href="postOwnerYoutube" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                  <li><a :href="postOwnerLinkedIn" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
              </div>
              <!-- <div class="text-right prIcon">
                <a href=""><i class="fa fa-print" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
              </div> -->
            </div>
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
    import apiServices from "../services/apiService";
    import moment from 'moment';
    export default {
        components: {
            'HeaderComponent' : HeaderComponent,
            'FooterComponent':FooterComponent
        },
        data:()=>{
          return{
            mediaTitle:'',
            mediaCats:[],
            mediaBody:'',
            publishedBy:'publis',
            publishedOn:'on',
            postOwnerName:'',
            postOwnerEmail:'',
            postOwnerPhone:'',
            postOwnerWebsite:'',
            postOwnerFaceBook:'',
            postOwnertwitter:'',
            postOwnerId:0,
            postOwnerYoutube:'',
            postOwnerLinkedIn:'',
            postOwnerImgSrc:'',
            showMediaImage:false,
            mediaImageUrl:'',
            mediaDescription:'',
            showEmbeddedMedia:false,
            embeddedMediaLink:"",
            catArray:[],
            postMedias:[],
            imageAssetPath:'',
            recentPostReleaseArray:[],
          }
        },
        mounted(){
          let pressId = this.$route.params.prId;
          this.setDetails(pressId);
          this.setLastthreePressRelease();
          this.getCat();
          this.scrollToElement('wrap-bg white');
        },
        methods:{
          readMorePress(pressId){
            this.setDetails(pressId);
            this.scrollToElement('wrap-bg white');
          },
           getFormattedDate(date) {
                let newDate = new Date(date);
                newDate= newDate.toString()
                console.log(newDate);
                return moment(newDate).format('LL');
            },
            scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          },

             getCat(){
                apiServices.hitCatgoryAPI()
                          .then(res => {
                              if(res.has_error == 0 ){
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
                          })
                          .catch(err => {
                              console.log('error in category listing api',err);
                          });

              },
            setDetails(pressId){
              apiServices.hitpressReleaseDetails(pressId)
                          .then(res => {
                            console.log('hitpressReleaseDetails',res);
                                    if(res.has_error == 0 ){
                                      this.postMedias=[];
                                      this.mediaCats=[];
                                      if(Array.isArray(res.data.pressrelease_data) && res.data.pressrelease_data.length > 0){
                                        res.data.pressrelease_data.map(pressMediadata=>{
                                            this.postMedias.push(pressMediadata)
                                        })
                                      } 
                                        this.imageAssetPath = res.image_path;
                                        let userObj=JSON.parse(res.data.user_data.setting_json);
                                        //console.log('hiiiiii',userObj);
                                        let pressBodyObj = JSON.parse(res.data.content_json);
                                        this.mediaTitle=res.data.headline;
                                        this.mediaBody= pressBodyObj.body_text;
                                        this.publishedBy=res.data.user_data.name,
                                        this.publishedOn=this.getFormattedDate(res.data.publication_date);
                                        this.postOwnerName = res.data.user_data.name;
                                        this.postOwnerId = res.data.user_data.id;
                                        this.postOwnerEmail =res.data.user_data.email;
                                        this.postOwnerPhone = res.data.user_data.phone;
                                        this.postOwnerImgSrc = res.data.user_data.image_url;
                                        this.mediaImageUrl=res.data.pressrelease_data.image_url;
                                        if(this.mediaImageUrl != '')
                                          this.showMediaImage=true;
                                        this.embeddedMediaLink=res.data.pressrelease_data.embeded_link;
                                        if(this.embeddedMediaLink != '')
                                          this.showEmbeddedMedia=true;
                                        this.postOwnerWebsite = userObj.website;
                                        this.postOwnerFaceBook= userObj.facebook_url;
                                        this.postOwnertwitter = userObj.twitter_url;
                                        this.postOwnerYoutube = userObj.youtube_url;
                                        this.postOwnerLinkedIn= userObj.linkedin_url;
                                        
                                        if(Array.isArray( res.data.pressrelease_category_data) && res.data.pressrelease_category_data.length > 0){
                                            res.data.pressrelease_category_data.map(catData => {
                                                let catObj= {
                                                    title:  catData.category_details.name,
                                                    id: catData.category_details.id
                                                };
                                                this.mediaCats.push(catObj);
                                            });
                                        }
                                    }
                                  })
                                  .catch(err => {
                                      console.log('error in category listing api',err);
                                  });
            },


              setLastthreePressRelease(){
                apiServices.hitLatestPressreleaseApi('',1)
                    .then(res => {
                      if(res.has_error == 0 ){
                          let counter = 0;
                        if (Array.isArray(res.data.data) && res.data.data.length > 0 ){
                            res.data.data.map(pressData=> {
                                if( counter < 3){
                                    let pressBodyObj = JSON.parse(pressData.content_json);
                                    
                                    let postPreviewImage= res.image_path+'assets/pressreleasemedia/no-image.jpg';

                                    if(Array.isArray(pressData.pressrelease_data) && pressData.pressrelease_data.length > 0){
                                        pressData.pressrelease_data.map(pressMediadata=>{
                                            if(pressMediadata.media_type == 'file'){
                                                postPreviewImage = res.image_path+'assets/pressreleasemedia/'+pressMediadata.content;
                                            }

                                        })
                                    } 
                                    let pressObj= {
                                        id: pressData.id,
                                        imgSrc:postPreviewImage,
                                        descpription:pressBodyObj.body_text,
                                        
                                    };
                                    this.recentPostReleaseArray.push(pressObj); 
                                }
                                
                                counter ++;
                                
                            });
                        } 
                            // console.log('pressrelase response',res.data);
                      }
                    })
                  .catch(err => {
                        console.log('error in category listing api',err);
                    });
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
                return str.replace(/<(.|\n)*?>/g, '');
            },
            getBodyHtml(data) {
             return this.getShortenString(data.descpription,10);
            },
        }

    }
</script>

<style scoped>

</style>

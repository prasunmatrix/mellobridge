<template>
    <div class="main">

        <HeaderComponent/>
        <section class="here-banner">
            <b-container>
                <b-row class="align-items-center">
                    <b-col lg="12">
                        <h1>{{ $t('home.welcomeMsg') }}</h1>
                        <button  class="site-link" @click="scrollToElement('what-we-do')" >{{ $t('home.learnMore') }} </button >
                    </b-col>
                </b-row>
            </b-container>
        </section>


        <section class="what-we-do">
            <b-container>
                <b-row>
                    <b-col lg="4">
                        <h2>{{ $t('home.whatwedo') }}</h2>
                    </b-col>
                    <b-col lg="8">
                        <h2>{{ $t('home.hello') }}</h2>
                    </b-col>
                </b-row>
            </b-container>
        </section>

        <section class="process">
            <b-container>
                <b-row>
                    <b-col lg="4">
                        <div class="process-single">
                            <div class="process-img"><img src="/assets/images/service-1.png" alt=""></div>
                            <h3>{{ $t('home.addprofile') }}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </b-col>
                    <b-col lg="4">
                        <div class="process-single">
                            <div class="process-img"><img src="/assets/images/service-2.png" alt=""></div>
                            <h3>{{ $t('home.uploadpressrelease') }}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </b-col>
                    <b-col lg="4">
                        <div class="process-single">
                            <div class="process-img"><img src="/assets/images/service-3.png" alt=""></div>
                            <h3>{{ $t('home.publishpress') }}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </section>


        <section class="press">
            <b-container>
                <b-row class="align-items-center">
                    <b-col xl="5">
                        <div class="press-left">
                            <h2>Distribute your release to where it matters most from targeted journalists to
                                influencers for just fixed price.</h2>
                        </div>
                    </b-col>
                    <b-col xl="7">
                        <div class="press-right">
                            <div class="pressTitle">
                                <h2>Latest Press Releases</h2>
                                <router-link class="site-link black" :to="{name:'latest-release'}">View All </router-link>
                            </div>
                            <ul class="press-single">
                                <li v-for="item in latestReleaseArray" :key="item.id">
                                    <div class="press-img">
                                        <img v-bind:src="item.imgSrc" alt="Media" style="height: 150px;width: 150px;" />
                                    </div>
                                    <div class="press-txt">
                                        <h3 v-text="getShortenString(item.title,10)">   </h3>
                                        <h4>{{ item.publishedAt }} by {{ item.publishBy }} </h4>
                                        <p v-html="getBodyHtml(item)" ></p>
                                        
                                    </div>
                                    <router-link :to="{ name: 'press-release-details',params:{prId:item.id } }" >Read More </router-link>
                                </li>
                            </ul>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </section>


        <section class="services">
            <b-container>
                <h2>Our services</h2>
                <b-row>
                     
                    <b-col xl="4" lg="6" cols="6" v-for="item in ourserviceArray" :key="item.id">
                       
                            <div class="services-single" >
                                <div class="services-icon"><img v-bind:src="'/assets/ourservices/'+item.imgSrc" alt=""></div>
                                <h3>{{item.title}}</h3>
                                <p>{{item.description}}</p>
                            </div>
                        
                    </b-col>
                </b-row>
            </b-container>
        </section>


        <section class="sign-banner">
            <b-container>
                <b-row>
                    <b-col lg="8">
                        <h2>Get media coverage for your business with our powerful press release distribution
                            service.</h2>
                        <p>Simply create and publish your press release and we'll distribute it to targeted media
                            contacts to help your story attract ground breaking coverage</p>
                    </b-col>
                    <b-col lg="4">
                        <div class="text-right">
                            <router-link v-show="showSignupBtn" class="site-link" :to="{name:'signup'}">Sign Up for Free</router-link>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </section>

        <FooterComponent/>

    </div>
</template>

<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    import apiService from '../services/apiService';
    import moment from 'moment';
    // import imageCompressor from 'vue-image-compressor'

    export default {
        components: {
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent
        },
        data() {
            return {
                value: '',
                latestReleaseArray:[],
                ourserviceArray:[],
                showSignupBtn: localStorage.getItem('token') ? false : true,
            }
        },
        mounted() {
          this.setLastthreePressRelease();
          this.setourServices();
          this.scrollToElement('main');
        },
        methods:{
            scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
            },
            setLastthreePressRelease(){
                apiService.hitLatestPressreleaseApi('',1)
                    .then(res => {
                      if(res.has_error == 0 ){
                          let counter = 0;
                        if (Array.isArray(res.data.data) && res.data.data.length > 0 ){
                            res.data.data.map(pressData=> {
                                if( counter < 3){
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
                                    let pressObj= {
                                        id: pressData.id,
                                        imgSrc:postPreviewImage,
                                        title:pressData.headline,
                                        descpription:pressBodyObj.body_text,
                                        publishedAt:publishDate,
                                        publishBy:pressData.user_data.name
                                    };
                                    this.latestReleaseArray.push(pressObj); 
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
            setourServices(){
                apiService.hitourservicelistApi()
                    .then(res => {
                        console.log('ourservices', res);
                      if(res.has_error == 0 ){
                          
                        if (Array.isArray(res.data) && res.data.length > 0 ){
                            res.data.map(serviceData=> {
                                console.log(serviceData);
                                    let serviceObj= {
                                    id: serviceData.id,
                                    imgSrc:serviceData.logo,
                                    title:serviceData.title,
                                    description:serviceData.description,
                                   
                                    };
                                    // console.log('pressObj',pressObj);
                                    this.ourserviceArray.push(serviceObj); 
                                
                                
                              
                                
                            });
                        } 
                            // console.log('our services response',res.data);
                      }
                    })
                    .catch(err => {
                        console.log('error in category listing api',err);
                    });

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
                return str.replace(/<(.|\n)*?>/g, '');
            },
            getBodyHtml(data) {
             return this.getShortenString(data.descpription,10);
            },
            getFormattedDate(date) {
                let newDate = new Date(date);
                newDate= newDate.toString()
                console.log(newDate);
                return moment(newDate).format('LL');
            }
        }
    }
</script>

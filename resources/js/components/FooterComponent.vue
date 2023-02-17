<template>
<footer class="site-footer">
    <b-container>

        <div class="footer-top">
            <b-row>
                <b-col lg="3" sm="6" cols="6">
                    <div class="footer-single">
                        <h3>General</h3>
                        <ul>
                            <li><router-link :to="{name:'Home'}">Home</router-link></li>
                            <li><router-link :to="{ name: 'contact-us'}" >Contact Us</router-link></li>
                            <li><a href="#">About us</a></li>
                            <li><router-link :to="{ name: 'media'}" >For Journalists</router-link></li>
                            <li><router-link :to="{ name: 'faq'}" >FAQ</router-link></li>
                            <li><router-link :to="{ name: 'reviews'}" >Reviews</router-link></li>
                            <li><router-link :to="{name:'editorial-team'}">Editorial Team</router-link></li>
                        </ul>
                    </div>
                </b-col>
                <b-col lg="3" sm="6" cols="6">
                    <div class="footer-single">
                        <h3>Tour</h3>
                        <ul>
                            <li><router-link :to="{ name: 'pricing'}" >Pricing</router-link></li>
                            <li><a href="#">How It Works</a></li>
                            <li><a href="#">Newsroom</a></li>
                            <li><a href="#">Whitepapers</a></li>
                            <li><a href="#">Coverage Example</a></li>
                            <li><router-link :to="{ name: 'pa-media'}" >PA Media Group</router-link></li>
                            <li><a href="#">How To Write a</a></li>
                        </ul>
                    </div>
                </b-col>
                <b-col lg="3" sm="6" cols="6">
                    <div class="footer-single">
                        <h3>Services</h3>
                        <ul>
                            <li><router-link :to="{ name: 'photo-distribution'}" >Distribution</router-link></li>
                            <li><a href="#">Media Database</a></li>
                            <li><router-link :to="{ name: 'regulatory-disclosure'}" >Regulatory Disclosure</router-link></li>
                            <li><router-link :to="{ name: 'press-release-create'}" >Press Release Writing</router-link></li>
                            <li><router-link :to="{ name: 'copyright'}" >PR Translation</router-link></li>
                            <li><router-link :to="{ name: 'copy-proofing'}" >Copy Proofing</router-link></li>
                            <li><router-link :to="{ name: 'photo-distribution'}" >Photo Distribution</router-link></li>
                        </ul>
                    </div>
                </b-col>
                <b-col lg="3" sm="6" cols="6">
                    <div class="footer-single">
                        <h3>Legal</h3>
                        <ul>
                            <li><router-link :to="{ name: 'terms-and-conditions'}" >Terms & Conditions</router-link></li>
                            <li><router-link :to="{ name: 'editorial-guidelines'}" >Editorial Guidelines</router-link></li>
                            <li><router-link :to="{ name: 'privacy-policy'}" >Privacy Policy</router-link></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </b-col>
            </b-row>
        </div>

        <div class="footer-copy">
            <b-row class="align-items-center">
                <b-col lg="6" sm="6">
                    <p>© Copyright 2020 Bernays. All rights reserved.</p>
                </b-col>
                <b-col lg="6" sm="6">
                    <div class="footer-social">
                        <ul>
                            <li><a target="_blank" :href="twitterLink"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a target="_blank" :href="facebookLink"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a target="_blank" :href="youtubeLink"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            <li><a target="_blank" :href="vimeoLink"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                            <li><a target="_blank" :href="instagramLink"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </b-col>
            </b-row>
        </div>

    </b-container>
</footer>
</template>

<script>
    import apiService from "../services/apiService";
    export default {
        data: () => {
            return{
                twitterLink:'',
                facebookLink:'',
                youtubeLink:'',
                vimeoLink:'',
                instagramLink:'',

            }
        },
        mounted() {
            this.setSocialComponent();
        },
        methods:{
            setSocialComponent(){
                apiService.hitSiteSocialMediaListApi().then(res=>{
                    if(res.has_error == 0){
                        let settingObj=JSON.parse(res.data[0].setting_json);
                        this.facebookLink= settingObj.facebook_link;
                        this.twitterLink= settingObj.twitter_link;
                        this.youtubeLink= settingObj.youtube_link;
                        this.instagramLink= settingObj.instagram_link;    
                        this.vimeoLink= settingObj.vimeo_link;   
                         
                    }
                });
            }
        }


    }
</script>
<style scoped>


</style>

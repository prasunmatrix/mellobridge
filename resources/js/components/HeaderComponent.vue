<template>
<header class="site-header" :class="{ 'header-static': isActive }">
    <b-container>
        <b-row class="align-items-center">
            <b-col lg="3" sm="4" cols="6">
                <div class="logo">
                    <div class="mobClick" v-bind:class="{ open: showMobileMenu }" v-on:click="showMobileMenu = !showMobileMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <router-link :to="{ name: 'Home'}"><img src="/assets/images/logo.png" alt=""></router-link>
                </div>
            </b-col>
            <b-col lg="9" sm="8" cols="6" class="site-nav-wrap">
                <div class="site-nav" v-bind:class="{ open: showMobileMenu }" v-on:click="showMobileMenu = !showMobileMenu">
                    <ul>
                        <li><router-link :to="{name:'press-release-create'}"> {{ $t('home.sendarelease') }} </router-link></li>
                        <li><router-link :to="{name:'media'}">{{ $t('home.journalists') }}</router-link></li>
                        
                        <!-- <li><router-link :to="{ name: 'contact-us'}" >CONTACT US</router-link></li> -->
                        
                    </ul>
                </div>
                <toggle-button 
                        :value="languageVal"
                        @change="onLangChangeEventHandler"
                        :labels="{checked:checkedLang , unchecked:uncheckedLang }"/>
                
                
                <!-- <b-dropdown text="LANGUAGE">
                     <b-dropdown-item>
                    </b-dropdown-item>
                     <b-dropdown-item><a href="#" @click="setLocale('en')">English</a></b-dropdown-item>
                     <b-dropdown-item><a href="#" @click="setLocale('ar')">Arabic</a></b-dropdown-item>
                </b-dropdown> -->
                <b-dropdown text="MY ACCOUNT"  v-if="showMyAccount" >
                     <b-dropdown-item><router-link :to="{ name: 'Dashboard'}" >Dashboard</router-link></b-dropdown-item>
                    <b-dropdown-item><router-link :to="{ name: 'user-press-release-listing'}" >Press Release List</router-link></b-dropdown-item>
                    <b-dropdown-item><router-link :to="{name:'press-release-create'}">Release Your Press</router-link></b-dropdown-item>
                    <b-dropdown-item><router-link :to="{name:'edit-profile'}">Edit Profile</router-link></b-dropdown-item>
                    <b-dropdown-item><router-link :to="{name:'change-password'}">Change Password</router-link></b-dropdown-item>
                    <b-dropdown-item><router-link :to="{name:'copyright'}">PR Copy Write Request</router-link></b-dropdown-item>
                    <b-dropdown-item><router-link :to="{name:'copyright-listing'}">PR Copy Write List</router-link></b-dropdown-item>
                    
                    
                    <b-dropdown-item @click="logout">Logout</b-dropdown-item>
                </b-dropdown>
                <b-dropdown text="SIGN IN / SIGN UP"  v-else>
                    <b-dropdown-item><router-link :to="{name:'Login'}">SIGN IN</router-link></b-dropdown-item>
                    <b-dropdown-item ><router-link :to="{name:'signup'}">SIGN UP</router-link></b-dropdown-item>
                </b-dropdown>
            </b-col>
        </b-row>
    </b-container>
</header>
</template>

<script>
    export default {
        data(){
            return{
                showMyAccount:false,
                isActive:false,
                languageVal:false,
                userName:'',
                currentLang:'EN',
                checkedLang:'AR',
                uncheckedLang:'EN',
                showMobileMenu: false
            }
        },
        mounted() {
            if(localStorage.getItem('token')){
                this.showMyAccount=true
                this.isActive= true
            }
            if(String(this.$i18n.locale) == 'en') 
                this.currentLang = 'EN'
            else
                this.currentLang = 'AR'
            console.log('language',String(this.$i18n.locale) == 'en' );
            if(String(this.currentLang) == 'EN'){
                    console.log('if');
                    window._locale  = 'en';
                    this.checkedLang = 'AR'
                    this.uncheckedLang = 'EN'
                    this.currentLang ='EN';
                    this.languageVal = true
                    // this.$router.push({
                    //     params:{lang :'en'}
                    // })

                } else if(String(this.currentLang) == 'AR') {
                    console.log('else');
                     window._locale  = 'ar';
                     this.checkedLang = 'EN'
                     this.uncheckedLang = 'AR'
                     this.currentLang ='AR';
                     this.languageVal = false
                    //  this.$router.push({
                    //     params:{lang :'ar'}
                    // })
                }
        },
        methods: {
            setLocale:function(locale){
                 this.$i18n.locale = locale
                 window._locale = locale
                 this.$router.push({
                     params:{lang :locale}
                 })
            },
            onLangChangeEventHandler:function(event){
                if( String(this.$i18n.locale) == 'ar'){
                    this.$i18n.locale = 'en'
                    this.currentLang= 'en'
                    window._locale = 'en'
                    this.$router.push({
                        params:{lang :this.currentLang}
                    })
                } else{
                    this.currentLang= 'ar'
                    this.$i18n.locale = 'ar'
                    
                    this.$router.push({
                        params:{lang :this.currentLang}
                    })
                }   
            },
            logout: function () {
                localStorage.removeItem('token');
                localStorage.removeItem('user_obj');
                this.$router.push({name:'Login'})
                    .then(res => console.log('logged out successfully!'))
                    .catch(err => console.log(err))
            }
        },


    }
</script>

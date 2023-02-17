require('./bootstrap');
require('../../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')
require('../../node_modules/@ckeditor/ckeditor5-vue/dist/ckeditor.js')
// const redThemecss = () => import('@sass/app.scss')
// const blueThemecss = () => import('/css/app.css')

window.Vue = require('vue');
import vuetify from "./vuetify";
import {i18n} from "./plugins/i18n"
import router from "./router";
import './bootstrap-vue';
import App from "./components/AppComponent";
import { ValidationProvider } from 'vee-validate/dist/vee-validate.full.esm';
import { ValidationObserver } from 'vee-validate';
import axios from 'axios';
import { ToggleButton } from 'vue-js-toggle-button'

Vue.config.productionTip=false;

// if(process.env.MIX_SERVER_ENV == 'live')
  // axios.defaults.baseURL="http://bernays.demoyourprojects.com/api";
// else
   axios.defaults.baseURL="http://localhost:8000/api";



Vue.component('ValidationProvider',ValidationProvider);
Vue.component('ValidationObserver',ValidationObserver); 
Vue.component('ToggleButton', ToggleButton)

router.beforeEach((to,from,next)=>{
    let language = to.params.lang;
    if (!language){
         language ='en'
    }
    i18n.locale=language;
    window._locale = language;
    next();
})

var vm = new Vue({
                el: '#app',
                i18n,
                router,
                vuetify,
                components:{
                    'App':App
                }
            });

global.vm = vm;
window.Vue = require('vue');
import VueI18n from 'vue-i18n';
import Vue from 'vue';
import en from "../locales/en.json"
import ar from "../locales/ar.json"

Vue.use(VueI18n);

export const i18n= new VueI18n({
    locale:'en',
    fallbackLocale:'en',
    fallbackLng:'en',
    syncFiles: true,
    messages:{
        en,
        ar
    }
})
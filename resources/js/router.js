import Vue from 'vue';
import VueRouter from "vue-router";
import axios from "axios";
import LoginComponent from "./components/LoginComponent";
import DashboardComponent from "./components/DashboardComponent";
import HomeComponent from "./components/HomeComponent";
import PrCopyWriteComponent from "./components/PrcopywritelistComponent";
import SignupComponent from "./components/SignupComponent";
import ContactusComponent from "./components/ContactusComponent";
import MediaComponent from "./components/MediaComponent";
import InvoiceComponent from "./components/InvoiceComponent";
import LatestPressReleaseComponent from "./components/LatestPressReleaseComponent";
import UserNewsRoomComponent from "./components/UserNewsRoomComponent";
import StepsComponent from "./components/StepsComponent";
import CopyrightComponent from "./components/CopyrightComponent";
import CopyrightListingComponent from './components/CopyrightListingComponent';
import PricingComponent from "./components/PricingComponent";
import ForgotpassComponent from "./components/ForgotpassComponent";
import RecoverPasswordComponent from "./components/RecoverPasswordComponent";
import EditprofileComponent from "./components/EditprofileComponent";
import ChangePasswordComponent from "./components/ChangePasswordComponent";
import CopyrightComponent2 from "./components/CopyrightComponent2";
import PressReleasedetailsComponent from "./components/PressReleasedetailsComponent";

import PressreleaseListingComponent from "./components/PressreleaseListingComponent";
import RssListingComponent from "./components/RssListingComponent";
import CategoryPressReleaseComponent from "./components/CategoryPressReleaseComponent"

import PRCopywriteDetails from "./components/PRCopywriteDetails";
import SubscriberComponent from "./components/SubscriberComponent";


import { i18n } from './plugins/i18n';
import FaqComponent from "./components/FaqComponent";
import ReviewsComponent from "./components/ReviewsComponent";
import PaMediaComponent from "./components/PaMediaComponent";
import WritePressComponent from "./components/WritePressComponent";
import RegulatoryDisclosureComponent from "./components/RegulatoryDisclosureComponent";
import PressWritingComponent from "./components/PressWritingComponent";
import CopyProofingComponent from "./components/CopyProofingComponent";
import PhotoDistributionComponent from "./components/PhotoDistributionComponent";
import TermsConditionsComponent from "./components/TermsConditionsComponent";
import EditorialGuidelinesComponent from "./components/EditorialGuidelinesComponent";
import PrivacyPolicyComponent from "./components/PrivacyPolicyComponent";

import TeamComponent from "./components/TeamComponent";
import NewsDistributionComponent from "./components/NewsDistributionComponent"; 
import MediaDatabaseComponent from "./components/MediaDatabaseComponent";
import CoverageReportsComponent from "./components/CoverageReportsComponent";
import AboutComponent from "./components/AboutComponent";

Vue.use(VueRouter);

        
const routes = [
    {
        path:"/",
        redirect:`/${i18n.locale}`
    },
    {
       path:'/:lang',
       component:{
            render (c) { return c('router-view')}
       },
       children:[
       {
        path: "login",
        component: LoginComponent,
        name: 'Login',
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem('token')) {
                next('/dashboard');
            } else {
                next();
            }
        }
        },{
            path: "dashboard",
            component: DashboardComponent,
            name: 'Dashboard',
            
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }
            }
        },{
            path: "",
            component: HomeComponent,
            name: 'Home',
        },{
            path: "signup",
            component: SignupComponent,
            name: 'signup'
        },
        {
            path: "contact-us",
            component: ContactusComponent,
            name: 'contact-us'
        },
        {
            path: "media",
            component: MediaComponent,
            name: 'media'
         },{
            path: "invoice",
            component: InvoiceComponent,
            name: 'invoice'
        },{
            path: "latest-release",
            component: LatestPressReleaseComponent,
            name: 'latest-release'
        },{
            path: "category/:categoryId",
            component: LatestPressReleaseComponent,
            name: 'category-press-release'
        },{
            path: "release-your-presss",
            component: StepsComponent,
            name: 'press-release-create',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next({name:"Login"});
                }
            }
        },{
            path: "update-your-presss/:pressId",
            component: StepsComponent,
            name: 'press-release-update',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }
            }
        },{
            path: "copyright",
            component: CopyrightComponent2,
            name: 'copyright',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }
            }
        },
        {
            path: "subscribe-newsletter",
            component: SubscriberComponent,
            name: 'subscribe-newsletter'
        },{
            path: "update-pr-copy-write/:prId",
            component: CopyrightComponent2,
            name: 'pr-copywrite-update',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }
            }
        },
        {
            path: "copyright-listing",
            component: CopyrightListingComponent,
            name: 'copyright-listing',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }
            }
        },{
            path: "pricing",
            component: PricingComponent,
            name: 'pricing'
            },
            {
            path: "forgot-pass",
            component: ForgotpassComponent,
            name: 'forgot-pass'
        },
        {
            path: "recover-password/:userId",
            component: RecoverPasswordComponent,
            name: 'recover-password'
        },
        {
            path: "edit-profile",
            component: EditprofileComponent,
            name: 'edit-profile',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }
            }
        },{
            path: "change-password",
            component: ChangePasswordComponent,
            name: 'change-password',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }
            }
        },{
            path: "press-details/:prId",
            component: PressReleasedetailsComponent,
            name: 'press-release-details',
        },{
            path: "user-news-rooms/:userId",
            component: UserNewsRoomComponent,
            name: 'user-news-room',
        },{
            path: "copyright-2",
            component: CopyrightComponent2,
            name: 'copyright-2'
        },{
            path: "rss-details",
            component: PressReleasedetailsComponent,
            name: 'rss-details'
        },{
            path: "user-press-release-listing",
            component: PressreleaseListingComponent,
            name: 'user-press-release-listing',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }

            }
        },{
            path: "rss-list",
            component: RssListingComponent,
            name: 'rss-list'
        },{
            path: "faq",
            component: FaqComponent,
            name: 'faq'
        },{
            path: "reviews",
            component: ReviewsComponent,
            name: 'reviews'
        },{
            path: "pa-media",
            component: PaMediaComponent,
            name: 'pa-media'
        },{
            path: "write-press-release",
            component: WritePressComponent,
            name: 'write-press-release'
        },{
            path: "regulatory-disclosure",
            component: RegulatoryDisclosureComponent,
            name: 'regulatory-disclosure'
        },{
            path: "press-release-writing-services",
            component: PressWritingComponent,
            name: 'press-release-writing-services'
        },{
            path: "copy-proofing",
            component: CopyProofingComponent,
            name: 'copy-proofing'
        },{
            path: "photo-distribution",
            component: PhotoDistributionComponent,
            name: 'photo-distribution'
        },{
            path: "terms-and-conditions",
            component: TermsConditionsComponent,
            name: 'terms-and-conditions'
        },{
            path: "editorial-guidelines",
            component: EditorialGuidelinesComponent,
            name: 'editorial-guidelines'
        },{
            path: "privacy-policy",
            component: PrivacyPolicyComponent,
            name: 'privacy-policy'
        },{    
            path: "editorial-team",
            component: TeamComponent,
            name: 'editorial-team'
        },{
            path: "news-distribution",
            component: NewsDistributionComponent,
            name: 'news-distribution'
        },{
            path: "media-database",
            component: MediaDatabaseComponent,
            name: 'media-database'
        },{
            path: "coverage-reports",
            component: CoverageReportsComponent,
            name: 'coverage-reports'
        },{
            path: "about-us",
            component: AboutComponent,
            name: 'about-us'
        },
        {
            path:"pr-copywrite-details//:prId",
            component:PRCopywriteDetails,
            name: 'pr-copywrite-deatails',
            beforeEnter: (to, from, next) => {
                if (localStorage.getItem('token')) {
                    next();
                } else {
                    next('/login');
                }

            }
        }
    ]}

];

const router = new VueRouter({
    mode: 'history',
    
    routes
})
 router.beforeEach((to,from,next )=>{
     axios.defaults.headers.common['Content-Type'] = 'application/json';
     if(to.name ==='Dashboard' || 
        to.name === "copyright-listing" || 
        to.name === "copyright" ||
        to.name === "press-release-create" ||
        to.name === "user-press-release-listing" ||
        to.name === "edit-profile" ||
        to.name === "press-release-update" ||
        to.name === "invoice" ||
        to.name === "pr-copywrite-update" ||
        to.name === "invoice"  ||
        to.name === "pr-copywrite-deatails"
       ){
        const token=localStorage.getItem('token')
        axios.defaults.headers.common['Authorization'] = 'Bearer '+token;
    }
    next();
 });

 router.beforeResolve((to, from, next) => {

    if (to.name) {
        NProgress.start()
    }
    next()
  })
  router.afterEach((to, from) => {
    NProgress.done()
  })


export default router


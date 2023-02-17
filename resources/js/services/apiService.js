import axios from 'axios';

export default{
    hitLoginApi(data){
        return axios.post('/login', data )
                .then( response => {
                    return response.data;
                }).catch(err => {
                    
                });
    },
    hitPrCopyWriteListApi(){
        return axios.get('/pr-copy-writing-list')
                    .then(response =>{
                        return response.data;
                }).catch(err => {
                        
                })
    },
    hitPressReleaseUpdateStep1(data,pressId){
        return axios.post('/press-release-update-step-1/'+ pressId+'', data )
        .then( response => {
            return response.data;
        }).catch(err => {
            
        });
    },
    hitPressReleaseStep1(data){
        return axios.post('/step-1', data )
        .then( response => {
            return response.data;
        }).catch(err => {
            
        });
    },

    getPRCopywriteDetails(prId){
        return axios.get('/pr-copywrite-details/'+prId+'')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitPressReleaseStep2(data){
        return axios.post('/step-2', data, {
                                            headers: {
                                                "Content-Type":"multipart/form-data"
                                            }
                                        })
                        .then( response => {
                            return response.data;
                        }).catch(err => {
                            
                        });
    },
    hitAddOnsListApi(){
        return axios.get('/press-release-addon-list')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitPressReleaseStep3(data){
        return axios.post('/step-3', data )
        .then( response => {
            return response.data;
        }).catch(err => {
            
        });
    },
    hitPaymentForPressRelease(data){
        return axios.post('/payment-for-press-release', data )
        .then( response => {
            return response.data;
        }).catch(err => {
            
        });
    },
    hitpressReleaseDetails(pressId){
        return axios.get('/press-release-details/'+pressId+'')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitForgotPass(data){
        return axios.post('/forgot-password', data )
                .then( response => {
                    return response.data;
                }).catch(err => {
                    console.log('errrr',err);
                });
    },
    hitRessetPass(data){
        console.log('hitRessetPass');
        return axios.post('/reset-password', data )
                .then( response => {
                    return response.data;
                }).catch(err => {
                    console.log('errrr',err);
                });
    },
    hitPrCopyWriteCreate(data){
        return axios.post('/pr-copy-writing-create', data )
                .then( response => {
                    return response.data;
                }).catch(err => {
                    console.log('errrr',err);
                });
    },
    hitLatestPressreleaseApi(searchparam,pageNo,categoryParam){
        let page=1;
        if(typeof pageNo != undefined){
            page = pageNo;
        }
        let category = '';
        if(typeof categoryParam != undefined){
            category= categoryParam;
        }

        return axios.get('/press-release-list?q='+searchparam+'&category='+category+'&page='+page+'')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitUserNewsRoomApi(searchparam,pageNo,categoryParam,user_id){
        let page=1;
        if(typeof pageNo != undefined){
            page = pageNo;
        }
        let category = '';
        if(typeof categoryParam != undefined){
            category= categoryParam;
        }

        return axios.get('/press-release-list?q='+searchparam+'&category='+category+'&page='+page+'&created_user='+user_id+'')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitSubscriberCreate(data){
        return axios.post('/subscriber-create', data )
                .then( response => {
                    return response.data;
                }).catch(err => {
                    console.log('errrr',err);
                });
    },
    hitContactUsApi(data){
        console.log('data',data)
        return axios.post('/contact-us', data )
                .then( response => {
                    
                    return response.data;
                }).catch(err => {
                    console.log('errrr',err);
                });
    },

    hitPressreleaseListingApi(){
        return axios.get('/user-press-release-listing')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },hitshowupdateUserApi(){
        return axios.get('/show-update-user')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                        return err;
                    })
    },
    hitDashboardCountApi(){
        return axios.get('/dashboard-counting')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                        return response.data;
                    })
    },
    hitCategoryPressrelease(category){
        return axios.get('/press-release-list?q=&category='+category+'')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },
    hitCatgoryAPI(){
        return axios.get('/master-category-list')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },
    hitPressreleaseListingApi(){
        return axios.get('/user-press-release-listing')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitshowupdateUserApi(){
        return axios.get('/user')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },
    hitUpdateUserApi(data){
        return axios.post('/update-user', data ,{
                                                    headers: {
                                                        "Content-Type":"multipart/form-data"
                                                    }
                        }).then( response => {
                                     return response.data;
                        }).catch(err => {
                            console.log('errrr',err);
                        });
    },
    getPressReleasePaymentStatus(data){
        return axios.post('/get-user-press-release-payment-status',data )
                .then( response => {
                    return response.data;
                }).catch(err => {
                    console.log('errrr',err);
                });
    },

    hitsubscriptionslistApi(){
        return axios.get('/subscriptions-list')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },
    hitinvoicelistApi(){
        return axios.get('/transaction-list')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },
    hitRegisterApi(data){
        return axios.post('/register',   
                        data ,{ headers: {
                                        "Content-Type":"multipart/form-data"
                                    }
                        }).then( response => {
                            return response.data;
                        }).catch(err => {
                            console.log('errrr',err);
                        });
    },
    hitourservicelistApi(){
        return axios.get('/our-services-list')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },
    hitcmslistApi(slug){
        return axios.get('/cms-list/'+slug+'')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                            
                    })
    },
    hituserloginpressreleaseApi(){
        return axios.get('/latest-press-release-list')
                    .then(response =>{
                        return response.data;
                    }).catch(err => {
                        return err;
                    })
    },

    hitPrCopyWriteReturnRequestApi(data){
        return axios.post('/pr-copy-writing-return-request', data)
                .then( response => {
                    return response.data;
                }).catch(err => {
                    console.log('errrr',err);
                });
    },

    hitPRcopyWriteUpdateApi(data,prId){
        return axios.post('/pr-copy-writing-update/'+ prId+'', data )
        .then( response => {
            return response.data;
        }).catch(err => {
            
        });
    },

    hitPRcopyWriteDetails(prId){
        return axios.get('/pr-copy-writing-details/'+prId+'')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitUserEmailDetails(user_id){
        return axios.get('/get-user-email-by-id/'+user_id+'')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitSiteSocialMediaListApi(){
        return axios.get('/site-social-media-listing')
        .then(response =>{
            return response.data;
        }).catch(err => {
                
        })
    },
    hitPRcopyWriteCountReturnRequest(user_id){
      return axios.get('/copywrite-count-return-request/'+user_id+'')
        .then(response =>{
            return response.data;
        }).catch(err => {
           return err     
        })
    }


}
    
    
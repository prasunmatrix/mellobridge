<template>
<div class="main">

<HeaderComponent/>

<section class="here-banner small">
  <b-container>
    <b-row class="align-items-center">
      <b-col lg="12">
          <h1>Subscribe Newsletter</h1>
      </b-col>
    </b-row>
  </b-container>
</section>

  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a>Subscribe Newsletter</a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <v-snackbar
      v-model="snackbar"
      :color="snackbarColor"
      :timeout="snackbarTtimeout"
      left="left"
      right="right"
      :multi-line="snackbarMultiLine"
      top="top" >
      {{ snackbarText }}
      <template v-slot:action="{ attrs }">
        <v-btn
          dark
          snackbarText
          v-bind="attrs"
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
    <h2 class="topTitle">Subscribe News Letter</h2>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form @submit.prevent="handleSubmit(onSubmit)">

        <div class="copy-form">
        <div class="custom-form">
          <div class="inp-block nogap">
            <h5><i class="fa fa-bullhorn" aria-hidden="true"></i> Full Name :</h5>
            <ValidationProvider name="Name" rules ="required" v-slot="{ errors }">
              <v-text-field placeholder="please provide your name"  v-model="formData.name" ></v-text-field>  
               <span>{{ errors[0] }}</span> 
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-bullhorn" aria-hidden="true"></i> Email Address :</h5>
            <ValidationProvider name="Email" rules ="required" v-slot="{ errors }">
               <v-text-field placeholder="please provide your email"  v-model="formData.email" ></v-text-field>  
              <span>{{ errors[0] }}</span> 
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <h5><i class="fa fa-external-link" aria-hidden="true"></i> Media Outlet :</h5>
            <ValidationProvider name="Media Outlet" rules ="required" v-slot="{ errors }">
               <v-text-field placeholder="please provide media oulet"  v-model="formData.media_outlet" ></v-text-field>  
                <span>{{ errors[0] }}</span>
            </ValidationProvider> 
          </div>

          <div class="inp-block nogap">
            <ValidationProvider name="Job Type" rules ="required" v-slot="{ errors }">
             <v-select :items="jobTypeArray" 
                        v-model="formData.job_type"
                        prepend-icon="fa fa-sticky-note-o" 
                        label="Job Type *" 
                        aria-hidden="true"
                        placeholder="Choose your job type"
                        item-text="display_name"
                        item-value="value"
                        >
                </v-select>
              <span>{{ errors[0] }}</span>  
            </ValidationProvider>
          </div>

          <div class="inp-block nogap">
            <ValidationProvider name="Additional" rules ="required" v-slot="{ errors }">
             <v-select :items="catArray" 
                        v-model="formData.category"
                        prepend-icon="fa fa-sticky-note-o" 
                        label="Category*" 
                        aria-hidden="true"
                        placeholder="Choose Category"
                        item-text="name"
                        item-value="id"
                        multiple
                        >
                </v-select>
              <span>{{ errors[0] }}</span>  
            </ValidationProvider>
          </div>
        </div>
        <p>&nbsp;</p>
         <b-button type="submit" variant="primary">Submit</b-button>
        <p class="merg-top">By Next step this form you agree to our <a href="">Terms & Conditions</a>.</p>
        </div>
      </form>
  </ValidationObserver>
  </b-container>

</div>
<FooterComponent/>


</div>



</template>

<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    import apiService from "../services/apiService";
    export default {
        components: {
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent,
        },
        data: () => ({
            items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
            date: new Date().toISOString().substr(0, 10),
            menu2: false,
            snackbar:false,
            snackbarTtimeout:-1,
            snackbarText:"",
            snackbarColor:"",
            catArray:[],
            jobTypeArray:[{display_name:'Editor',value:'editor'},{display_name:'Journalist',value:'journalist'},{display_name:'Reporter',value:'reporter'},{display_name:'Others',value:'others'}],
            snackbarMultiLine:true,
            prCopyWriteId:0,
            validationError:[],
            formData:{
              name:'',
              email:'',
              media_outlet:'', 
              job_type:'',
              category:[],
            }
        }),
         mounted(){
          if (typeof this.$route.params.prId !== 'undefined'){
              this.prCopyWriteId=this.$route.params.prId;
              this.setPrCopyWritedetails(this.$route.params.prId);
             
          }
          this.getCat();
          this.scrollToElement('here-banner small');
      },

        methods:{
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
          async onSubmit(e) {
            this.snackbarColor='info';
            this.snackbarText='Processing...';
            this.snackbarTtimeout=6000;
            this.snackbar=true;
            let subscriberObj ={
              'full_name':this.formData.name,
              'email':this.formData.email,
              'media_outlet':this.formData.media_outlet,
              'job_type':this.formData.job_type,
              'category':this.formData.category,
            }

            apiService.hitSubscriberCreate( subscriberObj)
                .then(res => {
                    if(res.has_error == 0 ){
                        this.snackbarColor='success';
                        this.snackbarText=res.msg;
                        this.snackbarTtimeout=6000;
                        this.snackbar=true;
                        this.formData.name='';
                        this.formData.email='';
                        this.formData.media_outlet='';
                        this.formData.job_type='';
                        this.formData.category=[];
                    } else {
                        this.snackbarColor='error';
                        this.snackbarText=res.msg;
                        this.snackbarTtimeout=6000;
                        this.snackbar=true;
                    }
                    
                })
                .catch(err => {
                    this.snackbarColor='error';
                    this.snackbarText=err
                    this.snackbarTtimeout=10000;
                    this.snackbar=true;
                })
               
          },
          showNameFieldError:function(error){
              this.showValidationError();
          }

        }
    }
</script>


<style scoped>
  span{
    display: block;
  }
</style>

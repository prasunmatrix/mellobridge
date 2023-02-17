<template>
<div class="main">

<HeaderComponent/>

<section class="here-banner small">
  <b-container>
    <v-snackbar
      v-model="showSnackbar"
    >
      {{ snackbarText }}

      <template v-slot:action="{ attrs }">
        <v-btn
          color="pink"
          snackbarText
          v-bind="attrs"
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
    <b-row class="align-items-center">
      <b-col lg="12">
          <h1>Create Press Release - Step {{ tab.toUpperCase() }}</h1>
      </b-col>
    </b-row>
  </b-container>
</section>

  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
       
         <li><router-link :to="{name:'Dashboard'}">Dashboard</router-link></li>
        <li><a >Create Press Release</a></li>
      </ul>
    </div>
  </section>

  <b-container>
    <h2 class="topTitle text-center">Create Press Release</h2>

<div class="theme-tabs">    
<v-tabs centered 
        v-model='tab' >
  <v-tab href="#one" ><div class="tabMain"><span>1</span> Create</div></v-tab>
  <v-tab href="#two" :disabled="disabledTab"><div class="tabMain" ><span>2</span> Media</div></v-tab>
  <v-tab href="#three"  :disabled="disabledTab"><div class="tabMain"><span>3</span> Add-ons</div></v-tab>
  <v-tab href="#four"  :disabled="disabledTab" ><div class="tabMain"><span>4</span> Complete</div></v-tab>
    <v-tab-item value="one">
      <ValidationObserver v-slot="{ invalid  }">
        <form @submit.prevent="onSubmit">
          <v-alert
              type ="error"
              v-model="showAlert"
              dismissible
              class="multi-line"
            >
            <p v-html="alertText"></p>
        </v-alert>
          <div class="formTop">
          <b-row>
            <b-col lg="6">
              <div class="formTop-left">
                <div class="formTop-left-main">
                    <p>Every press release needs to be published on behalf of a company or individual. To create a new profile click here.</p>
                    <p>A headline should be self-explanatory and contain relevant keywords.</p>
                    <p>Use bold text, hyper-links and quote blocks to emphasise and format your press release.</p>
                    <p>Remember that keywords optimise your release and help rank your article for related/ complimentary search terms. They must always be relevant to the article and context.</p>
                </div>  
              </div>
            </b-col> 
            <b-col lg="6">
                <div class="step-form-top">
                    <div class="custom-form">  
                      <ValidationProvider name="Company Name" rules ="required" v-slot="{ errors }">
                        <v-text-field prepend-icon="mdi-alpha-c-circle-outline" 
                                    label="Company Name: *" 
                                    disabled
                                    placeholder="Your Company"
                                    v-model="formData.companyName"
                                  >
                        </v-text-field>  
                        <span class="validation-error">{{ errors[0] }}</span> 
                      </ValidationProvider>
                      <ValidationProvider name="PR Language" rules ="required|alpha" v-slot="{ errors }">
                        <v-select :items="langs" 
                                  v-model="formData.lang"
                                  prepend-icon="mdi-apache-kafka" 
                                  label="PR Language: *" 
                                  placeholder="Select Language"
                                  item-text="name"
                                  item-value="id"
                                  >
                        </v-select>
                        <span class="validation-error" >{{ errors[0] }}</span>  
                      </ValidationProvider>
                      <ValidationProvider name="Headline" rules ="required" v-slot="{ errors }">
                        <v-text-field prepend-icon="mdi-alarm-light-outline" 
                                      label="Headline: *" 
                                      v-model="formData.headline"
                                      placeholder="This is the title of your news story">
                        </v-text-field> 
                        <span class="validation-error" >{{ errors[0] }}</span>
                      </ValidationProvider> 
                    </div>    
                </div>
            </b-col>   
          </b-row>   
          </div>

          <div class="form-bottom">
              <div class="custom-form">
                <ValidationProvider name="Body" rules ="required" v-slot="{ errors }">
                  <ckeditor :editor="editor"  
                            v-model="formData.body_text" 
                            :config="editorConfig">
                  </ckeditor>
                  <span class="validation-error">{{ errors[0] }}</span>
                </ValidationProvider>
                <v-text-field prepend-icon="mdi-format-quote-close" 
                              v-model="formData.caption"
                              label="BCaption/ Blockquote:" 
                              placeholder="A sentence or phrase within your press release that you wish to draw attention to.">
                </v-text-field>  
                <v-textarea prepend-icon="mdi-note-text-outline" 
                            v-model="formData.modaretion_note"
                            label="Moderation Notes: (these are not published):" 
                            placeholder="Please inform our team of any additional information relating to your press release.">
                </v-textarea>  
                <b-row>
                  <b-col lg="6">
                    <ValidationProvider name="Relevant sectors" rules ="required" v-slot="{ errors }">
                      <v-select :items="relevantsSectors" 
                                prepend-icon="mdi-border-all" 
                                label="Relevant sectors: *" 
                                v-model="formData.category"
                                item-text="name"
                                item-value="id"
                                attach
                                chips
                                multiple
                                placeholder="None Selected">
                      </v-select>
                      <span class="validation-error">{{ errors[0] }}</span>
                    </ValidationProvider>
                  </b-col> 
                  <b-col lg="6">
                    <v-menu v-model="showDatePicker" 
                            :close-on-content-click="false" 
                            :nudge-right="40" 
                            transition="scale-transition" 
                            offset-y min-width="290px">
                            <template v-slot:activator="{ on, attrs }">
                              <ValidationProvider name="Publication Date" rules ="required" v-slot="{ errors }">
                                <v-text-field v-model="computedDateFormatted" 
                                            label="Publication date: *" 
                                            prepend-icon="mdi-calendar" 
                                            readonly 
                                            v-bind="attrs" 
                                            v-on="on"
                                            hint="DD/MM/YYYY format"
                                            persistent-hint >
                                </v-text-field>
                                <span calss="validation-error">{{ errors[0] }}</span>
                              </ValidationProvider>
                            </template>
                          <v-date-picker v-model="date" :min="toDay" @input="showDatePicker = false">
                          </v-date-picker>
                    </v-menu>
                  </b-col> 
                </b-row>
                <v-text-field prepend-icon="mdi-cellphone-key" 
                              v-model="formData.seo_keywords"
                              label="SEO Keywords (up to 20 and separated by a comma):" 
                              placeholder="dog, cat, tiny mouse, trap">
                </v-text-field>  
                <v-btn type="submit" 
                      :loading="formLoader"
                      :disabled="invalid"
                      color="btn-auto merg-top">Save & Step 2
                      <i class="fa fa-arrow-right" aria-hidden="true">
                      </i>
                </v-btn>
                <p class="merg-top">By Next step this form you agree to our <router-link :to="{ name: 'terms-and-conditions'}" >Terms & Conditions</router-link>.</p>
              </div>
          </div>
        </form>
      </ValidationObserver>
    </v-tab-item>

    <v-tab-item value="two">
        <div class="media-up">
          <p>Media Count {{ showMediaCount }}</p>
          <h3><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Media</h3>
          <h4>Upload images, video and documents.</h4>
          <ValidationObserver v-slot="{ invalidMedia  }">
            <form @submit.prevent="onMediaSubmit">
            <div class="custom-form">
              <b-row>
                <b-col lg="6">
                  <b-form-file label="Media File:" 
                                placeholder="Click to select media file" 
                                prepend-icon="mdi-card-text-outline"
                                v-model="file"
                                ref="inputFile"
                                @change="onFilePicked">
                    </b-form-file>
                </b-col>
                <b-col lg="6">
                  <v-text-field label="Media Description:" 
                                placeholder="Describe the media you have selected above." 
                                prepend-icon="mdi-card-text-outline"
                                ref="inputFileDescription"
                                v-model="mediaData.media_description"
                                >
                  </v-text-field>
                </b-col>
                <b-col lg="12">
                  <p>
                    <small>The following file formats are accepted: jpeg, jpg, png and file size should be max 2 MB.
                    </small>
                  </p>
                </b-col>
              </b-row>
              <hr/>
              <h3><i class="fa fa-code" aria-hidden="true"></i> Embed Media</h3>
              <h4>Embed video and audio.</h4>
              <b-row>
                <b-col lg="12">
                  <v-textarea prepend-icon="mdi-video-wireless-outline" 
                              label="Embed Source:" 
                              placeholder="Paste in your embed code." 
                              ref="inputEmbededLink"
                              v-model="mediaData.embeded_link"
                              >
                  </v-textarea>
                </b-col>
                <b-col lg="12">
                  <p><small>Popular embeds include Youtube, Vimeo, Soundcloud etc. For instructions on how to obtain the embed code click here.</small></p>
                </b-col> 
              </b-row>
              <hr/>
              <h3><i class="fa fa-link" aria-hidden="true"></i> Link Media</h3>
              <h4>Link to a media resource.</h4>
              <b-row>
                <b-col lg="12">
                  <v-text-field prepend-icon="mdi-link" 
                                label="Link:" 
                                ref="inputMediaLink"
                                placeholder="http://www.website.com/myresource"
                                v-model="mediaData.media_link"
                                >
                  </v-text-field> 
                </b-col>
                <b-col lg="12">
                  <p><small>Simply paste the full URL to link directly to media files hosted elsewhere.</small></p>
                </b-col>
              </b-row>
              <b-row>
                <b-col lg="12">
                  <v-btn @click="backToStepOne"
                        color="btn-auto btn-bdr merg-top">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                  </v-btn>
                  <v-btn type="submit" 
                        color="btn-auto merg-top"
                        :disabled="invalidMedia"
                        >
                        Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
                  </v-btn>
                  <p class="merg-top">By Next step this form you agree to our <router-link :to="{ name: 'terms-and-conditions'}" >Terms & Conditions</router-link>.</p>
                </b-col>
              </b-row>
            </div>
          </form>
          </ValidationObserver>
        </div>
    </v-tab-item>

    <v-tab-item value="three">
      <ValidationObserver v-slot="{ invalidAddons  }">
          <form @submit.prevent="onAddonsSubmit">
            <b-row>
              <b-col lg="12">
                <div class="media-up" v-for="item in addons" :key="item.title">
                  <h3 class="with-swwitch"><v-switch :value="getId(item)"  v-model="addonsData.addonId"></v-switch> | <span>${{item.price}}</span> <div class="accpic"> <img v-bind:src="item.logo_path" alt=""> </div> @{{ item.title }}  </h3>
                  <div class="media-hide">
                    <p>{{ item.description }}</p>
                  </div>
                </div>
              </b-col>
              <b-col lg="12">
                <v-btn  @click="backToStepTwo" color="btn-auto btn-bdr merg-top"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</v-btn>
                <v-btn type="submit" 
                        :loading="formLoader"
                        :disabled="invalidAddons"
                        color="btn-auto merg-top">Save & Step 4
                        <i class="fa fa-arrow-right" aria-hidden="true">
                        </i>
                </v-btn>
                <p class="merg-top">By Next step this form you agree to our <router-link :to="{ name: 'terms-and-conditions'}" >Terms & Conditions</router-link>.</p>
              </b-col>
            </b-row>
          </form>
        </ValidationObserver> 
    </v-tab-item>

    <v-tab-item value="four">
        <ValidationObserver v-slot="{ invalidPayments  }">
          <form @submit.prevent="onPaymentSubmit">
        <div class="media-up" >
          <b-row class="align-items-center">
            <b-col lg="3">
              <div><img v-bind:src="userImgUrl" alt="User" /></div>
            </b-col>
            <b-col lg="5">
              <h3>Press release details:</h3>
              <p class="alt"><strong>Publish Date: </strong> {{ date }}</p>
              <p class="alt"><strong>Headline:</strong> {{ formData.headline }}</p>
              <p class="alt"><strong>Company Profile:</strong> {{ userName }}</p>
            </b-col>
            <b-col lg="4">
              <ul class="postTags">
                <li>Business & Finance</li>
                <li>Health</li>
              </ul>
              <p class="alt"><strong>Preview</strong></p>
              <router-link  target= '_blank' class="viewPost" :to="{name:'press-release-details',params:{ prId:pressReleaseId}}"><i class="fa fa-external-link" aria-hidden="true"></i> Click to see what your press release will look like</router-link>
            </b-col>
          </b-row>
        </div>

        <div class="payment" v-if="pressPayment && payment">
          <div class="media-up">
            <h3>Payment overview:</h3>
                <p><strong>Order summary:</strong></p>
            <b-row class="align-items-end">
              <b-col lg="8">
                <table class="table">
                  <tr>
                    <td>1x Press Release with {{ bodyWordCount }} words </td>
                    <td class="text-right">{{ pressAmount }}</td>
                  </tr>
                  <tr>
                    <td>VAT</td>
                    <td class="text-right">{{ pressVat }}</td>
                  </tr>
                  <tr>
                    <td>Addons</td>
                    <td class="text-right">{{ pressAddonsAmount }}</td>
                  </tr>
                  <tr>
                    <td><strong>Total to pay</strong></td>
                    <td class="text-right"><strong>{{ getTotalAmount(pressAmount,pressVat,pressAddonsAmount) }}</strong></td>
                  </tr>
                </table>

                <div class="ptCard">
                  <b-row class="align-items-center">
                    <b-col lg="6"><strong>Payment Gatway:</strong></b-col>
                    <b-col lg="6">
                     <p>Under Develompment</p>
                    </b-col>
                  </b-row>
                </div>
              </b-col>
              <b-col lg="4">
                <p><small>By submitting this press release you agree to the Pressat <router-link :to="{ name: 'terms-and-conditions'}" >Terms & Conditions</router-link> and <router-link :to="{ name: 'privacy-policy'}" >Privacy Policy</router-link>.</small></p>
              </b-col>
            </b-row>
          </div>
        </div>
        <div class="payment" v-else-if="pressSubscriptionPayment && payment">
          <div class="media-up">
            <h3>Payment overview:</h3>
                <p><strong>Order summary:</strong></p>
            <b-row class="align-items-end">
              <b-col lg="8">
                <table class="table">
                  <tr>
                    <td>Deducted 1 Submission from</td>
                    <td class="text-right">{{ remaingCount}} out of {{ totalCount }} </td>
                  </tr>
                </table>
              </b-col>
              
            </b-row>
          </div>
        </div>
      <div class="media-up" >
        <b-row class="align-items-center">
          <b-col lg="12">
              <v-btn type="submit" color="btn-auto btn-bdr merg-top"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</v-btn>
              <v-btn type="submit" 
                        :loading="formLoader"
                        :disabled="invalidPayments"
                      color="btn-auto merg-top">{{ PaymentFormButtonText }}
                      <i class="fa fa-arrow-right" aria-hidden="true">
                      </i>
              </v-btn>
              <p class="merg-top">By Next step this form you agree to our <router-link :to="{ name: 'terms-and-conditions'}" >Terms & Conditions</router-link>.</p>
          </b-col>
        </b-row>
      </div>
      </form>
        </ValidationObserver> 
    </v-tab-item>

</v-tabs>
</div>

  </b-container>

</div>
<FooterComponent/>


</div>



</template>

<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    import CKEditor from '@ckeditor/ckeditor5-vue';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import apiService from "../services/apiService";
    import moment from 'moment';
  
    export default {
        components: {
            'HeaderComponent': HeaderComponent,
            'FooterComponent': FooterComponent,
             ckeditor: CKEditor.component
        },

         data: () => {
            return {
                date: '',
                userName:'',
                bodyWordCount:0,
                pressAddonsAmount:0,
                userName:'',
                userImgUrl:'',
                pressPayment:false,
                payment:true,
                pressSubscriptionPayment:true,
                PaymentFormButtonText:'Save & Published',
                remaingCount:0,
                totalCount:0,
                pressAmount:0,
                pressVat:0,
                disabledTab:true,
                tab:'one',
                pressReleaseWordCount:0,
                pressReleaseId:0,
                showMediaCount:0,
                formLoader:false,
                formValid:true,
                toDay:new Date().toISOString().substr(0, 10),
                showDatePicker: false,
                alertText:"You've got <strong> 5</strong>new updates on your timeline!. \n hjj \n ddd",
                showAlert:false,
                showSnackbar:false,
                snackbarText:"",
                file: [],
                addons:[],
                formData:{
                  companyName:'',
                  lang:'',
                  headline:'',
                  body_text:'',
                  caption:'',
                  modaretion_note:'',
                  category:[],
                  publication_date:'',
                  seo_keywords:''
                },
                mediaData:{
                  upload_media_path:'',
                  media_description:'',
                  embeded_link:'',
                  media_link:''
                },
                addonsData:{
                  addonId:[],
                  press_release_id:0,
                },
                langs: [
                  {
                      name:"Arabic",
                      id:'en'
                    },
                    {
                      name:"English",
                      id:'ar'
                    }
                ],
                relevantsSectors:[],
                editor: ClassicEditor,
                editorData: '',
                editorConfig: {
                language: 'en',    
                }
            };
          },
      computed: {
        computedDateFormatted () {
          console.log('this.date',this.date);
          return this.formatDate(this.date)
        }
      },
      mounted(){
          this.getCategortList();
          this.getCompanyName();
          this.getAddOnsList();

          apiService.hitshowupdateUserApi()
            .then(resp=> {
                this.userName = resp.name;
            })
            .catch( err=> {
                localStorage.removeItem('token');
                localStorage.removeItem('user_obj');
                this.$router.push({name:'Login'})
                    .then(res => console.log('logged out successfully!'))
                    .catch(err => console.log(err))
                
            });
         
          this.scrollToElement('align-items-center');
          if (typeof this.$route.params.pressId !== 'undefined'){
              this.pressReleaseId=this.$route.params.pressId;
              this.setPressreleasedetails(this.$route.params.pressId);
              this.disabledTab= false
          }

      },

    watch: {
      date (val) {
        this.formData.publication_date = this.formatDate(this.date)
      },
    },
    methods:{
      backToStepTwo(){
         this.tab='two';
         this.scrollToElement('theme-tabs');
      },
      backToStepOne(){
         this.tab='one';
         this.scrollToElement('theme-tabs');
      },
      getTotalAmount(a,b,c){
        return +a + +b + +c;
      },
      getUserPaymentStatus(){
        apiService.getPressReleasePaymentStatus({'content':this.formData.body_text,'press_id':this.pressReleaseId})
                  .then(res => {
                      if(res.has_error == 0 ){
                          if(res.payment == true){
                            this.pressPayment =true;
                            this.pressSubscriptionPayment=false;
                            this.pressAmount= res.payment_amount.amount;
                            this.pressVat = res.vat_amount;
                            this.bodyWordCount = res.payment_amount.word_count;
                            this.pressAddonsAmount = res.addons_amount;
                          } else{
                            this.pressPayment =false;
                             this.pressSubscriptionPayment=true;
                             this.totalCount=res.total_count;
                             this.remaingCount=res.remaining_count;
                          }
                      }  
                  })
                  .catch(err => {
                      console.log('error in category listing api',err);
                  });
      },
      setPressreleasedetails(pressId){
        apiService.hitpressReleaseDetails(pressId)
                  .then(res => {
                      if(res.has_error == 0 ){
                        this.showMediaCount = res.data.pressrelease_data.length;  
                         let detailsJosn=JSON.parse(res.data.content_json);
                          if(res.data.payment_id != null){
                            this.payment =false
                            this.PaymentFormButtonText = "Save" ;
                          }
                         this.userImgUrl= res.data.user_data.image_url;
                         this.userName = res.data.user_data.name;
                         this.formData.headline=res.data.headline;
                         this.formData.lang=detailsJosn.lang;
                         this.formData.body_text=detailsJosn.body_text;
                         this.formData.caption=detailsJosn.caption
                         this.formData.modaretion_note =detailsJosn.modaretion_note
                         this.formData.seo_keywords=res.data.seo_keywords;
                         if (Array.isArray(res.data.pressrelease_category_data) && res.data.pressrelease_category_data.length > 0 ){
                           let newCategory=[];
                              res.data.pressrelease_category_data.map(catData => {
                                  newCategory.push(catData.category_id);
                              });
                              this.formData.category = newCategory;
                         }
                        this.date=moment(res.data.publication_date,"YYYY-MM-DD HH:mm:ss").format("YYYY-MM-DD") 
                        this.computedDateFormatted;
                        if (Array.isArray(res.data.pressrelease_addon_data) && res.data.pressrelease_addon_data.length > 0 ){
                           let newAddons=[];
                              res.data.pressrelease_addon_data.map(addons => {
                                  newAddons.push(addons.addons_id);
                              });
                              this.addonsData.addonId = newAddons;
                         }
                      }
                  })
                  .catch(err => {
                      console.log('error in category listing api',err);
                  });
      },
      getFormattedDate(date){
        let newDate = new Date(date);
        newDate= newDate.toString()
        return moment(newDate).format("DD/MM/YYYY")
      },
      getId(data){
        return data.id;
      },
      step2(){
        this.tab='two';
      },
      onFilePicked(e) {
          const files = e.target.files
          if (files[0] !== undefined) {
              this.imageName = files[0].name
              if (this.imageName.lastIndexOf('.') <= 0) {
                  return
              }
              const fr = new FileReader()
              fr.readAsDataURL(files[0])
              fr.addEventListener('load', () => {
                  // this.imageUrl = fr.result
                  this.mediaData.upload_media_path = files[0] // this is an image file that can be sent to server... 
              })
          }
      },
      emptyEditor() {
          this.formData.body_text = '';
      },
      getAddOnsList(){
        apiService.hitAddOnsListApi()
                .then(res => {
                    if(res.has_error == 0 ){
                        if (Array.isArray(res.data) && res.data.length > 0 ){
                            res.data.map(addonsData => {
                                let addonObj= {
                                    title:  addonsData.title,
                                    id:  addonsData.id,
                                    price: addonsData.price,
                                    description:addonsData.description,
                                    logo_path:res.path+'/'+addonsData.addon_logo
                                };
                                this.addons.push(addonObj);
                            });
                        } 
                    }
                })
                .catch(err => {
                    console.log('error in category listing api',err);
                });
      },
      getCompanyName(){
        let retrievedObject = JSON.parse(localStorage.getItem('user_obj'));
        this.formData.companyName = retrievedObject.name;
      },
      getCategortList(){
        apiService.hitCatgoryAPI()
                  .then(res => {
                    console.log('res',res);
                      if(res.has_error == 0 ){
                          if (Array.isArray(res.data) && res.data.length > 0 ){
                              res.data.map(catData => {
                                  let catObj= {
                                      name:  catData.name,
                                      id:  catData.id,
                                  };
                                  this.relevantsSectors.push(catObj);
                              });
                          } 
                      }
                  })
                  .catch(err => {
                      console.log('error in category listing api',err);
                  });
      },
      formatDate (date) {
        if (!date) return null

        const [year, month, day] = date.split('-')
        return `${day}/${month}/${year}`
      },
      parseDate (date) {
        if (!date) return null
        const [month, day, year] = date.split('/')
        return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
      },
      scrollToElement(className) {
        const el = this.$el.getElementsByClassName(className)[0];

        if (el) {
            el.scrollIntoView();
        }
      },
      onSubmit(){
        this.formLoader=true;
        this.snackbarText="Processing.Please Wait..."
        this.showSnackbar=true;
        if(this.pressReleaseId == 0 ){
            apiService.hitPressReleaseStep1(this.formData,this.pressReleaseId)
                      .then(res => {
                            console.log('response',res);
                            if(res.has_error == 0 ){
                              console.log('step1 response',res);
                              this.disabledTab= false;
                                this.formLoader=false;
                                this.showSnackbar=false;
                                this.snackbarText=res.msg;
                                this.showSnackbar=true;
                                this.tab='two';
                                this.pressReleaseId=res.id;
                                this.setPressreleasedetails(this.pressReleaseId);
                               
                            } else {
                                this.alertText=res.error;
                                this.showAlert=true;
                                this.formLoader=false;
                            }
                             this.getUserPaymentStatus();
                            this.scrollToElement('theme-tabs');
                            this.setPressreleasedetails(this.pressReleaseId)
                        })
                        .catch(err => {
                            this.text = err.response;
                            this.loader=false;
                            this.snackbar = true
                        });
        } else {
            apiService.hitPressReleaseUpdateStep1(this.formData,this.pressReleaseId)
                      .then(res => {
                            console.log('ress',res);
                            if(res.has_error == 0 ){
                                this.formLoader=false;
                                this.showSnackbar=false;
                                this.snackbarText=res.msg;
                                this.showSnackbar=true;
                                this.tab='two';
                            } else {
                                this.alertText=res.msg;
                                this.showAlert=true;
                            }
                             
                            this.scrollToElement('theme-tabs');
                            this.setPressreleasedetails(this.pressReleaseId)
                        })
                        .catch(err => {
                            this.text = err.response;
                            this.loader=false;
                            this.snackbar = true
                        });

        }
      },
      onMediaSubmit(){
        this.formLoader=true;
         this.snackbarText="Processing.Please Wait..."
        this.showSnackbar=true;
        let mediaData = new FormData();
        mediaData.append('press_release_id', this.pressReleaseId);
        mediaData.append('upload_media_path', this.mediaData.upload_media_path)
        mediaData.append('media_description',this.mediaData.media_description)
        mediaData.append('embeded_link',this.mediaData.embeded_link)
        mediaData.append('media_link',this.mediaData.media_link)
        apiService.hitPressReleaseStep2(mediaData)
                .then(res => {
                    if(res.has_error == 0 ){
                        this.formLoader=false;
                        this.showSnackbar=false;
                        this.snackbarText=res.msg;
                        this.showSnackbar=true;
                        this.tab='three';

                        this.$refs.inputFile.reset();
                        this.$refs.inputFileDescription.reset();
                        this.$refs.inputEmbededLink.reset();
                        this.$refs.inputMediaLink.reset();
                        this.mediaData.upload_media_path = '';
                        this.mediaData.media_description ='';
                        this.mediaData.embeded_link= '';
                        this.mediaData.media_link= '';
                        
                        // this.mediaData.upload_media_path ='';
                        // this.mediaData.media_description= '';
                        // this.mediaData.embeded_link ='';
                        // this.mediaData.media_link ='';
                        // console.log('media-setp 2 api');
                        this.setPressreleasedetails(this.pressReleaseId);
                    } else {
                        this.alertText=res.error;
                        this.showAlert=true;
                        this.formLoader=false
                    }
                    this.scrollToElement('theme-tabs');
                })
                .catch(err => {
                    this.text = err.response;
                    this.loader=false;
                    this.snackbar = true
                });
      },
      onAddonsSubmit(){
        this.formLoader=true;
        this.snackbarText="Processing.Please Wait..."
        this.showSnackbar=true;
        
        this.addonsData.press_release_id=this.pressReleaseId;
         apiService.hitPressReleaseStep3(this.addonsData)
                .then(res => {
                   
                    if(res.has_error == 0 ){
                        this.formLoader=false;
                        this.formLoader=false;
                        this.showSnackbar=false;
                        this.snackbarText=res.msg;
                        this.showSnackbar=true;
                        this.tab='four';
                        console.log('media-setp 3 api');

                    } else {
                        this.alertText=res.msg;
                        this.showAlert=true;
                    }
                    this.getUserPaymentStatus();
                    this.scrollToElement('theme-tabs');
                })
                .catch(err => {
                    this.text = err.response;
                    this.loader=false;
                    this.snackbar = true
                });
      },
      scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          },
      onPaymentSubmit(){
        this.formLoader=true;
        this.snackbarText="Processing.Please Wait..."
        this.showSnackbar=true;
        if(this.payment == true){
          let paymentFormData= new FormData()
          paymentFormData.append('press_release_id',this.pressReleaseId);
          apiService.hitPaymentForPressRelease(paymentFormData)
                  .then(res => {
                      if(res.has_error == 0 ){
                          this.formLoader=false;
                          this.formLoader=false;
                          this.showSnackbar=false;
                          this.snackbarText=res.msg;
                          this.showSnackbar=true;
                        this.$router.push({name: 'user-press-release-listing'})
                              .then(res => console.log('Payment Successful'))
                              .catch(err => console.log(err))
                      } else {
                          this.alertText=res.msg;
                          this.showAlert=true;
                      }
                  })
                  .catch(err => {
                      this.text = err.response;
                      this.loader=false;
                      this.snackbar = true
                  });
        } else {
          this.$router.push({name: 'user-press-release-listing'})
                              .then(res => console.log('Payment Successful'))
                              .catch(err => console.log(err))
        }
        
      }
    }


  }
</script>
<style>
  .validation-error{
    display: block;
    color: red;
  }
  .multi-line {
    white-space: pre-line;
  }
   .ck-editor__editable {
        min-height: 350px;
    }
    .ck-content { height:500px; }
</style>

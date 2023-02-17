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
      <h1>{{ copywriteTicketNo }}</h1>
     
        <p> <strong>{{publishedBy}}</strong> Created On <strong>{{ publishedOn }}</strong>  </p>
      
      <b-row>
        
        <b-col lg="12">
          <div class="details-right" v-for="item in mediaContent" :key="item.id" >
            <div class="post-meta">
              <p> <strong>{{ item.created_at }}</strong> -- <strong> {{ item.status}} </strong> </p>
            </div> 
            <div class="post-tags">
              
            </div>
            <div class="post-content" v-html="item.title">
            </div>
          </div>
        </b-col>
      </b-row>
      <div class="btn-group">
        <router-link :to="{name:'copyright-listing'}"> Back</router-link>
      </div>
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
            PRCopyWriteId:'',
            copywriteTicketNo:'',
            mediaContent:[],
            publishedBy:'',
            publishedOn:'',
            mediaBody:''
          }
        },
        mounted(){
          this.PRCopyWriteId=this.$route.params.prId;
          this.setPrContentDetails(this.PRCopyWriteId);
          this.scrollToElement('wrap-bg white');
        },
        methods:{
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

          setPrContentDetails(prId){
            
            apiServices.getPRCopywriteDetails(prId)
                  .then(res => {
                    console.log('resposne',res);
                    if(res.has_error==0){
                      this.copywriteTicketNo =res.data.ticket_no;
                      this.publishedOn=this.getFormattedDate(res.data.created_at);
                      if(Array.isArray(res.data.allcontent) && res.data.allcontent.length > 0){
                        res.data.allcontent.map(prData=>{
                            let prCopywriteObj = {
                              title:prData.content,
                              status:prData.status,
                              created_at:this.getFormattedDate(prData.created_at)
                            }
                            this.mediaContent.push(prCopywriteObj);
                        });
                        
                      }
                    }else{

                    }
                  }).catch(err=>{
                    console.log('error'.err);
                  })
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

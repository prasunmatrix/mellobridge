<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Frequently Asked Questions</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
       <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >FAQ</a></li>
      </ul>
    </div>
  </section>

<b-container>
<div class="faq-panel">
<h2>Press release</h2>
<v-expansion-panels>
    <v-expansion-panel>
      <v-expansion-panel-header>How can I submit a press release?</v-expansion-panel-header>
      <v-expansion-panel-content>
        <p>Submitting a press release is easy with our self-publishing step by step process.</p>
        <ul>
          <li>Sign up here: https://pressat.co.uk/user/register/</li>
          <li>Create your company profile</li>
          <li>Add your press release and multimedia</li>
          <li>Choose optional add-ons e.g. Press Association</li>
          <li>Pay and submit</li>
        </ul>
        <p>Your press release is then moderated by our support team and distributed on your chosen date.</p>
        <p>Alternatively a member of our support team can add the press release to your account.</p>
      </v-expansion-panel-content>
    </v-expansion-panel>

    <v-expansion-panel>
      <v-expansion-panel-header>Do you provide regulatory announcement services?</v-expansion-panel-header>
      <v-expansion-panel-content>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-expansion-panels>
</div>

<div class="faq-panel">
<h2>Account</h2>
<v-expansion-panels>
    <v-expansion-panel>
      <v-expansion-panel-header>Why has my press release not had the desired impact?</v-expansion-panel-header>
      <v-expansion-panel-content>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </v-expansion-panel-content>
    </v-expansion-panel>

    <v-expansion-panel>
      <v-expansion-panel-header>What keywords should I use?</v-expansion-panel-header>
      <v-expansion-panel-content>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-expansion-panels>
</div>

<div class="faq-panel">
<h2>Distribution</h2>
<v-expansion-panels>
    <v-expansion-panel>
      <v-expansion-panel-header>Do you provide press release clipping?</v-expansion-panel-header>
      <v-expansion-panel-content>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </v-expansion-panel-content>
    </v-expansion-panel>

    <v-expansion-panel>
      <v-expansion-panel-header>What is the Press Association?</v-expansion-panel-header>
      <v-expansion-panel-content>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-expansion-panels>
</div>
</b-container>

  

</div>
<FooterComponent/>


</div>



</template>

<script>
    import HeaderComponent from "./HeaderComponent";
    import FooterComponent from "./FooterComponent";
    export default {
        components: {
            'HeaderComponent' : HeaderComponent,
            'FooterComponent':FooterComponent
        },
         methods:{
             scrollToElement(className) {
                const el = this.$el.getElementsByClassName(className)[0];

                if (el) {
                    el.scrollIntoView();
                }
          }
          },
           mounted() {
           this.scrollToElement('wrap-bg');
        },
    }
</script>


<style scoped></style>

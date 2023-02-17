<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>About Us</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg white alt">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >About Us</a></li>
      </ul>
    </div>
  </section>

</div>

<section class="press-ab">
<b-container>
  <h1>Hello! We're a Press Release Agency  distribute your release for just one fixed price to where it matters most.</h1>
<b-row>
  <b-col xl="6">
      <div class="press-ab-left">
        <div class="press-left-main"><h2>Founded in 2010, Bernays media has rapidly grown into one of the leading press release distribution services in the UK and continues to provide a low-cost communications toolkit for businesses, both small and large.</h2></div>
      </div>
  </b-col>
  <b-col xl="6">
      <div class="">
        <h2>Our Story</h2>
        <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
        <h2>Are you an agency?</h2>
        <p>Cost effectively publish, distribute and manage a high volume of Bernays media for multiple clients.</p>
      </div>
  </b-col>
</b-row>
</b-container>
</section>

<section class="services">
    <b-container>
        <h2>Our services</h2>
        <b-row>
            <b-col xl="4" lg="6" cols="6">
                <div class="services-single">
                    <div class="services-icon"><img src="/assets/images/service-icon-1.png" alt=""></div>
                    <h3>News Distribution</h3>
                    <p>Target journalists, key influencer's and stakeholders effortlessly through our
                        distribution platform.</p>
                </div>
            </b-col>
            <b-col xl="4" lg="6" cols="6">
                <div class="services-single">
                    <div class="services-icon"><img src="/assets/images/service-icon-2.png" alt=""></div>
                    <h3>Extra Distribution</h3>
                    <p>Leverage additional distribution through the Press Association & NASDAQ omx circuits.</p>
                </div>
            </b-col>
            <b-col xl="4" lg="6" cols="6">
                <div class="services-single">
                    <div class="services-icon"><img src="/assets/images/service-icon-3.png" alt=""></div>
                    <h3>Translation</h3>
                    <p>Have your press release professionally translated for a specific demographic
                        (country).</p>
                </div>
            </b-col>
            <b-col xl="4" lg="6" cols="6">
                <div class="services-single">
                    <div class="services-icon"><img src="/assets/images/service-icon-4.png" alt=""></div>
                    <h3>Disclosure Service</h3>
                    <p>Target journalists, key influencer's and stakeholders effortlessly through our
                        distribution platform.</p>
                </div>
            </b-col>
            <b-col xl="4" lg="6" cols="6">
                <div class="services-single">
                    <div class="services-icon"><img src="/assets/images/service-icon-5.png" alt=""></div>
                    <h3>Copywriting</h3>
                    <p>Utilise our experienced UK copywriters to bring your news idea to life! It's quick with
                        one fixed price.</p>
                </div>
            </b-col>
            <b-col xl="4" lg="6" cols="6">
                <div class="services-single">
                    <div class="services-icon"><img src="/assets/images/service-icon-6.png" alt=""></div>
                    <h3>Media Database</h3>
                    <p>Find the right people with our up-to-date media database and engage with your specific
                        audience.</p>
                </div>
            </b-col>
        </b-row>
    </b-container>
</section>

<section class="brand-list">
  <b-container>
    <h2>We work with the brands you love</h2>
    <ul>
      <li>
        <div class="brand-list-single"><img src="/assets/images/brand-1.png" alt=""></div>
      </li>
      <li>
        <div class="brand-list-single"><img src="/assets/images/brand-2.png" alt=""></div>
      </li>
      <li>
        <div class="brand-list-single"><img src="/assets/images/brand-3.png" alt=""></div>
      </li>
      <li>
        <div class="brand-list-single"><img src="/assets/images/brand-4.png" alt=""></div>
      </li>
      <li>
        <div class="brand-list-single"><img src="/assets/images/brand-5.png" alt=""></div>
      </li>
    </ul>
  </b-container>
</section>

<section class="sign-banner">
            <b-container>
                <b-row>
                    <b-col lg="8">
                        <h2>Get media coverage for your business with our powerful press release distribution
                            service.</h2>
                        <p>Simply create and publish your press release and we'll distribute it to targeted media
                            contacts to help your story attract ground breaking coverage</p>
                    </b-col>
                    <b-col lg="4">
                        <div class="text-right">
                            <a class="site-link" href="#">Sign Up for Free</a>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
        </section>

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
        }
    }
</script>


<style scoped></style>

<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>Media Database</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg white">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <<li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >Media Database</a></li>
      </ul>
    </div>
  </section>


  <div class="media-data">
		<b-container>
			<h2>Media database is a real-time web-based application containing more than 1.4 million media profiles. It enables PR professionals to quickly and easily identify specific media contacts that can be used to globally influence audiences across traditional media and social media outlets.</h2>

			<div class="media-data-single">
				<b-row>
					<b-col lg="6">
						<div class="media-data-txt">
							<h3>Identify</h3>
							<p>Identifying the most relevant media contacts who are interested and want to read your news is vital for a successful PR campaign.</p>
							<p>With the Bernays media database you can quickly identify journalists, bloggers, editors and other media staff based on specific sectors, beats, locations, publications and other social aspects.</p>
						</div>
					</b-col>
					<b-col lg="6">
						<div class="media-data-img" style="background-image:url('/assets/images/media-data-1.png');"></div>
					</b-col>
				</b-row>
			</div>

      <div class="media-data-single">
				<b-row>
					<b-col lg="6">
						<div class="media-data-txt">
							<h3>Reach</h3>
							<p>Streamline the processes of press-release distribution with the self-publishing aspect of the media database, which avoids the delays of working with a third party and gives you the power to search and distribute on your own timeline.</p>
							<p>Customise lists to reach a broad audience based on industry sectors, major circuits, or specific location.</p>
						</div>
					</b-col>
					<b-col lg="6">
						<div class="media-data-img" style="background-image:url('/assets/images/media-data-2.png');"></div>
					</b-col>
				</b-row>
			</div>

      <div class="media-data-single">
				<b-row>
					<b-col lg="6">
						<div class="media-data-txt">
							<h3>Monitor</h3>
							<p>To understand your campaign’s impact and improve future distribution, monitoring online outlets and social outlets is crucial. You can track the success of your campaign by performing unlimited searches and reports using an intuitive and easy-to-use interface.</p>
						</div>
					</b-col>
					<b-col lg="6">
						<div class="media-data-img" style="background-image:url('/assets/images/media-data-3.png');"></div>
					</b-col>
				</b-row>
			</div>
			
		</b-container>
	</div>
  

</div>

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

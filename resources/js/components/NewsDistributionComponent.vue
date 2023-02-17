<template>
<div class="main">

<HeaderComponent/>

    <section class="here-banner small">
      <b-container>
        <b-row class="align-items-center">
          <b-col lg="12">
             <h1>News Distribution</h1>
          </b-col>
        </b-row>
      </b-container>
    </section>


  <div class="wrap-bg white">
  <section class="page-breadcrumb">
    <div class="container">
      <ul>
        <li><router-link :to="{ name: 'Home'}" >Home</router-link></li>
        <li><a >News Distribution</a></li>
      </ul>
    </div>
  </section>


	<section class="what-we-do">
			<b-container>
					<b-row>
							<b-col lg="4">
									<h2>How it works</h2>
							</b-col>
							<b-col lg="8">
									<h2>Distribute your press release through the Bernays media newswire to reach targeted journalists, editors, influencers & news-desks.</h2>
							</b-col>
					</b-row>
			</b-container>
	</section>


  <b-container>
    <div class="newsWrap">
			<b-row class="align-items-center">
				<b-col lg="6">
					<div class="newsTxt">
						<div class="txtNum">1</div>
						<h2>Targeted & Precise Distribution</h2>
						<p>Ensuring your press release reaches the most relevant media is vital to the success of any PR campaign. Pressat uses tried and tested methods to precisely target journalists based on beat, geographic region, industry and journalist back-history (previously covered stories).</p>
						<p>Pressat also serves more than 33,000 opt-in subscribers with customised news alerts, ranging from journalists and editors right through to analysts and bloggers.</p>
						<ul>
							<li>Targeted distribution of your press release</li>
							<li>Reach thousands of opted-in journalists, editors & reporters</li>
							<li>Reach major news agencies worldwide</li>
							<li>Syndicated to Bing News, DowJones, NewsNow, Thomson Reuters & more</li>
						</ul>
					</div>
				</b-col>
				<b-col lg="6">
					<div class="newsImg"><img src="/assets/images/news-1.png" alt=""></div>
				</b-col>
			</b-row>
		</div>
		<div class="newsWrap">
			<b-row class="align-items-center">
				<b-col lg="6">
					<div class="newsTxt">
						<div class="txtNum">2</div>
						<h2>Generate online Media visibility</h2>
						<p>Ensuring your press release reaches the most relevant media is vital to the success of any PR campaign. Pressat uses tried and tested methods to precisely target journalists based on beat, geographic region, industry and journalist back-history (previously covered stories).</p>
						<p>Pressat also serves more than 33,000 opt-in subscribers with customised news alerts, ranging from journalists and editors right through to analysts and bloggers.</p>
						<ul>
							<li>Targeted distribution of your press release</li>
							<li>Reach thousands of opted-in journalists, editors & reporters</li>
							<li>Reach major news agencies worldwide</li>
							<li>Syndicated to Bing News, DowJones, NewsNow, Thomson Reuters & more</li>
						</ul>
					</div>
				</b-col>
				<b-col lg="6">
					<div class="newsImg"><img src="/assets/images/news-2.png" alt=""></div>
				</b-col>
			</b-row>
		</div>
		<div class="newsWrap">
			<b-row class="align-items-center">
				<b-col lg="6">
					<div class="newsTxt">
						<div class="txtNum">3</div>
						<h2>Customisable <br> Newsroom</h2>
						<p>Ensuring your press release reaches the most relevant media is vital to the success of any PR campaign. Pressat uses tried and tested methods to precisely target journalists based on beat, geographic region, industry and journalist back-history (previously covered stories).</p>
						<p>Pressat also serves more than 33,000 opt-in subscribers with customised news alerts, ranging from journalists and editors right through to analysts and bloggers.</p>
						<ul>
							<li>Targeted distribution of your press release</li>
							<li>Reach thousands of opted-in journalists, editors & reporters</li>
							<li>Reach major news agencies worldwide</li>
							<li>Syndicated to Bing News, DowJones, NewsNow, Thomson Reuters & more</li>
						</ul>
					</div>
				</b-col>
				<b-col lg="6">
					<div class="newsImg"><img src="/assets/images/news-3.png" alt=""></div>
				</b-col>
			</b-row>
		</div>
		<div class="newsWrap">
			<b-row class="align-items-center">
				<b-col lg="6">
					<div class="newsTxt">
						<div class="txtNum">4</div>
						<h2>Opted-in journalists & subscribers</h2>
						<p>Ensuring your press release reaches the most relevant media is vital to the success of any PR campaign. Pressat uses tried and tested methods to precisely target journalists based on beat, geographic region, industry and journalist back-history (previously covered stories).</p>
						<p>Pressat also serves more than 33,000 opt-in subscribers with customised news alerts, ranging from journalists and editors right through to analysts and bloggers.</p>
						<ul>
							<li>Targeted distribution of your press release</li>
							<li>Reach thousands of opted-in journalists, editors & reporters</li>
							<li>Reach major news agencies worldwide</li>
							<li>Syndicated to Bing News, DowJones, NewsNow, Thomson Reuters & more</li>
						</ul>
					</div>
				</b-col>
				<b-col lg="6">
					<div class="newsImg"><img src="/assets/images/news-4.png" alt=""></div>
				</b-col>
			</b-row>
		</div>
		<div class="newsWrap">
			<b-row class="align-items-center">
				<b-col lg="6">
					<div class="newsTxt">
						<div class="txtNum">5</div>
						<h2>Syndicated via <br> Partnership</h2>
						<p>Ensuring your press release reaches the most relevant media is vital to the success of any PR campaign. Pressat uses tried and tested methods to precisely target journalists based on beat, geographic region, industry and journalist back-history (previously covered stories).</p>
						<p>Pressat also serves more than 33,000 opt-in subscribers with customised news alerts, ranging from journalists and editors right through to analysts and bloggers.</p>
						<ul>
							<li>Targeted distribution of your press release</li>
							<li>Reach thousands of opted-in journalists, editors & reporters</li>
							<li>Reach major news agencies worldwide</li>
							<li>Syndicated to Bing News, DowJones, NewsNow, Thomson Reuters & more</li>
						</ul>
					</div>
				</b-col>
				<b-col lg="6">
					<div class="newsImg"><img src="/assets/images/news-5.png" alt=""></div>
				</b-col>
			</b-row>
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
        }
    }
</script>


<style scoped></style>

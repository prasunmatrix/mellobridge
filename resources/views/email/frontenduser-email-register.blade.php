<h1>Mello Bridge</h1>
<p>Please click on the below link to confirm your email address</p>

<a href="{!! url('/verify', ['code'=>$token]) !!}">Click Here to Confirm Your Email Address 
</a> <br/><br/>
<!-- <p>This is test mail!</p> -->

<p>If you can't click on the above click, please copy the below link in to a browser and click Enter</p>

<p>{!! url('/verify', ['code'=>$token]) !!}</p>

Thank you, Mello Bridge <br/><br/>
     


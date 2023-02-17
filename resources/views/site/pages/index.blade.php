@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<!--...............Banner section........................-->
<style>
  input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance:textfield;
}
#cover-spin {
    position: fixed;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.7);
    z-index: 9999;
    display: none;
  }

  @-webkit-keyframes spin {
    from {
      -webkit-transform: rotate(0deg);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  #cover-spin::after {
    content: '';
    display: block;
    position: absolute;
    left: 48%;
    top: 40%;
    width: 40px;
    height: 40px;
    border-style: solid;
    border-color: black;
    border-top-color: transparent;
    border-width: 4px;
    border-radius: 50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
  }
}


</style>
<script defer>
  // const calculatorSubmitted ="{{ $scroll }}";
  // if(calculatorSubmitted === '1') window.location = './homepage/#calculator'
</script>
<div class="wrapper">
  <div class="banner-area">
    <h1>E-commerce Shipping Solution</h1>
    <h2>Sell, ship and save</h2>
    <p>
      Fed up with high shipping costs? We were too! That's why we made shipping low-cost and simple to help you sell more and grow your business.
    </p>
    <a href="{{ url('/how-its-work') }}" class="custom-btn extraspace">How it Works</a>
    <img src="{{ asset('site/assets/images/banner-img.png') }}" alt="" />

  </div>
</div>
<div class="white-area"></div>

<!--...............Estimate section........................-->
<div class="wrapper" id="calculator">
  <div class="estimate-area">
    <div class="estimate-area-inner">
      <h2>Get an estimate now</h2>
      <h3>Save up to 50% from traditional shipping companies</h3>
      <h4 class="infoship">Enter the information of your shipment</h4>
      <h4 class="infoship" style="color: red;">All fields are mandatory</h4>
      <form  id="calculator_result">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <div class="estimate-form">
          <div class="custom_selection" style="width:245px;">
            <select name="shape" id="shape" required value="{{old('shape')}}">
              <option value="">Package Type</option>
              <option value="Parcel">Parcel</option>
              {{--<option value="Flat">Postcard</option>
              <option value="FlatRateEnvelope">FlatRateEnvelope</option>
              <option value="LegalFlatRateEnvelope">LegalFlatRateEnvelope</option>
              <option value="PaddedFlatRateEnvelope">PaddedFlatRateEnvelope</option>
              <option value="SmallFlatRateBox">SmallFlatRateBox</option>
              <option value="MediumFlatRateBox">MediumFlatRateBox</option>
              <option value="LargeFlatRateBox">LargeFlatRateBox</option>
              <option value="RegionalRateBoxA">RegionalRateBoxA</option>
              <option value="RegionalRateBoxB">RegionalRateBoxB</option>--}}
            </select>
            
          </div>
          

          <div class="formarea">
            <input type="number" name="weight" id="weight" required min="1" placeholder="Weight" class="custominput" value="{{old('weight')}}" />
            <div class="custom_selection" style="width:115px;">
              <select name="unit" id="unit" required value="{{old('unit')}}">
                <option value="">Unit</option>
                <option value="oz">Ounces</option>
                <option value="g">Grams</option>
              </select>
              
            </div>
            
          </div>

          <div class="formarea extramargin">
            <input type="number" name="length" id="length"  required placeholder="Length" class="custominput" />
            <input type="number" name="width" id="width" placeholder="Width" min="0" required class="custominput" />
            <input type="number" name="height" id="height" min="0" required placeholder="Height" class="custominput" />
            <div class="custom_selection" style="width:145px;">
              <select name="dimensions_unit" id="dimensions_unit" required value="{{old('dimensions_unit')}}">
                <option value="">Dimension Unit</option>
                <option value="cm">cm</option>
                <option value="in">inch</option>
                
              </select>
            </div>
          </div>


          <div class="formarea">
            <!-- <div class="custom-select" style="width:210px;">
            <select>
              <option value="0">Going To</option>
            </select>
            </div> -->
            <div class="custom_selection" style="width:145px;">
             {{-- <select name="country" id="country" onchange="selectcountryState(this.value)">--}}
              <select name="country" id="country" onchange="selectcountryState(this.value)">
                      <option value="">Select Country</option>
                      @if(!empty($countryList))
                        @foreach ($countryList as $country)
                          <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                      @endif  
                  </select>
            </div>

            <div class="custom_selection" style="width:145px;">
              <select name="state_code" id="state_code" required>
                <option value="">Select State</option>
               
              </select>
            </div>
            <input type="text" name="to_postal_code" id="to_postal_code" min="1" placeholder="Receiver's Postal Code" required style="width: 381px;" class="custominput" />
           {{-- <span class="custom_selection">(Ex: 94306)</span>--}}
          </div>
          

          <div class="clear"></div>
          <div class="formarea extramargin" id="custom_form" style="display:none;">
            <!-- <div class="custom-select" style="width:210px;">
            <select>
              <option value="0">Going To</option>
            </select>
            </div> -->
            <div class="custom_selection" style="width:150px;">
              <select name="package_content" id="package_content" required>
                <option value="">Package Content</option>
                <option value="Merchandise">Merchandise</option>
                  <option value="Documents">Documents</option>
                  <option value="Sample">Sample</option>
                  <option value="Gift and other">Gift and other</option>
              </select>
            </div>
            <input type="text" name="description" id="description" min="1" placeholder="Description" required style="width: 300px;" class="custominput" />
            <input type="number" name="quantity" id="quantity" min="1" placeholder="Quantity" required style="width: 100px;" class="custominput" />
            <input type="number" name="value_price" id="value_price" min="1" placeholder="Value" required style="width: 100px;" class="custominput" />
           {{-- <span class="custom_selection">(Ex: 94306)</span>--}}
          </div>
          <div class="clear"></div>
          
          <div style="margin-top:25px;">
            <input type="button" value="Calculate Rate" onclick="formValidationAdd();" id="btnSubmit" class="customformbtn" />
           
            <!-- {{--@if(!empty(is_numeric($total_price)))--}}
          <span class="custom_selection result ">@if(!empty($total_price)) {{$total_price ?? ''}} @else Result @endif</span>
          {{--@else--}} -->
            <!-- <span class="custom_selection result error-result">@if(!empty($total_price)) {{$total_price}} @else Result @endif</span>   -->
          </div>
          <div>
        
         
          <div class="resultArea">
         
          
            <div class="resultText" id="successmsg"style="display:none;"></div>
            
          
            <div class="errorText" id= "errormsg"style="display:none;"></div>
            
          </div>
          <!-- {{--@endif--}}  -->
        </div>
        <div id="cover-spin"></div>
      </form>
    </div>
  </div>

</div>

<!--...............Explore section........................-->
<div class="wrapper">
  <div class="explore-area">
    <h2>Explore MelloBridge</h2>
    <div class="explore-area-inner">

      <div class="explore-box">
        <h3>Why Us</h3>
        <img src="{{ asset('site/assets/images/why-us.svg') }}" alt="" />
        <p>Discover why choosing MelloBridge can transform your business today</p>
        <a href="#" class="custom-btn smallbtn">Discover</a>
      </div>

      <div class="explore-box">
        <h3>Locations</h3>
        <img src="{{ asset('site/assets/images/location.svg') }}" alt="" />
        <p>Find the closest location near you</p>
        <a href="{{ url('/location') }}" class="custom-btn smallbtn">Find</a>
      </div>

      <div class="explore-box">
        <h3>Pricing</h3>
        <img src="{{ asset('site/assets/images/pricing.svg') }}" alt="" />
        <p>Get a quick estimate with our shipping calculator</p>
        <a href="homepage#calculator" class="custom-btn smallbtn">Estimate</a>
      </div>

    </div>
    <a href="{{ url('/signup') }}" class="custom-btn extraspace">Sign Up Now</a>
  </div>
</div>
@endsection
@push('custom-styles')
<!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
<!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
<!-- <script>
    $(document).ready(function() {
       $('html,body').animate({scrollTop: 100},"slow");
    })
</script> -->
@endpush
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>
    function formValidationAdd(){			
                    var shape = $("#shape").val();
                    var weight = $("#weight").val();
                    var unit = $("#unit").val();
                    var length = $("#length").val();
                    var width = $("#width").val();
                    var height = $("#height").val();
                    var country = $("#country").val();
                    var dimensions_unit = $("#dimensions_unit").val();
                    var state_code = $("#state_code").val();
                    var to_postal_code = $("#to_postal_code").val();
                    //alert(shape);
                      if(shape==''){
			                  $("#shape").focus();
                        alert('Please enter package type');
			                  return false;
		                  }
                      if(country==''){
			                  $("#country").focus();
                        alert('Please select country');
			                  return false;
		                  }
                      if(weight==''){
			                  $("#weight").focus();
                        alert('Please enter parcel weight');
			                  return false;
		                  }
                      if(unit==''){
			                  $("#unit").focus();
                        alert('Please enter parcel weight unit');
			                  return false;
		                  }
                      if(length==''){
			                  $("#length").focus();
                        alert('Please enter parcel length');
			                  return false;
		                  }
                      if(width==''){
			                  $("#width").focus();
                        alert('Please enter parcel width');
			                  return false;
		                  }
                      if(height==''){
			                  $("#height").focus();
                        alert('Please enter parcel height');
			                  return false;
		                  }
                      if(dimensions_unit==''){
			                  $("#dimensions_unit").focus();
                        alert('Please enter parcel dimension unit');
			                  return false;
		                  }
                      if(state_code==''){
			                  $("#state_code").focus();
                        alert('Please enter state');
			                  return false;
		                  }
                      if(to_postal_code==''){
			                  $("#to_postal_code").focus();
                        alert('Please enter postal code');
			                  return false;
		                  }
                    
                    $('#cover-spin').show(0);
                    // $('#loading-image').show();
                    var url = "{!! route("homepage") !!}";
                    $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                     $.ajax({
                     type: "POST",
                     url: url,
                     data:({
                      shape : shape,
                      weight : weight,
                      unit : unit,
                      length : length,
                      country : country,
                      width : width,
                      height : height,
                      dimensions_unit : dimensions_unit,
                      state_code : state_code,
                      to_postal_code : to_postal_code,
                              }),
                     cache: false,
                     success: function(data)
                     {  
                      $('#cover-spin').hide(0); 
                      // $('#loading-image').hide();
                      if(data.responsecode==500){
                      $("#errormsg").show();
                      $("#successmsg").hide();
                      $("#errormsg").html(data.total_price);

                       }else if(data.responsecode==200){
                        $("#successmsg").show();
                        $("#errormsg").hide();
                        $("#successmsg").html(data.total_price);

                       }
                       
                              
                     }
                  });
                
                   
                  };
                
              
                </script>
                <script>
              $("#scrollTo").click(function() {
    $('html, body').animate({
        scrollTop: $("#calculator").offset().top
    }, 2000);
});
</script>
<script>
  function selectcountryState(val){
   /* if(val ==2){
      $("#custom_form").show();
    }else{
      $("#custom_form").hide();
    }*/

  if(val == '') {
    $("select[name=state_code]").html('<option value="">State</option>');
}
$.ajax(
{  
    url :'{!! route("getstates") !!}',
    type: 'GET',
    data : { country : val },
}).done( 
    function(response) 
    {
        var obj = JSON.parse(response);
        html = '<option value="">State*</option>';
        $.each(obj,function(key, value) 
        {
            html = html + '<option value=' + key + '>' + value + '</option>';
        });
        $("select[name=state_code]").html(html);
    }
);
}
</script>
              
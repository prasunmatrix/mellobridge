@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<!--...............Banner section........................-->
<div class="wrapper">
  <div class="banner-area">
    <h1>E-commerce Shipping Solution</h1>
    <h2>Sell, ship and save</h2>
    <p>
      Fed up with high shipping costs? We were too! That's why we made shipping low-cost and simple to help you sell more and grow your business.
    </p>
    <a href="#" class="custom-btn extraspace">How it Works</a>
    <img src="{{ asset('site/assets/images/banner-img.png') }}" alt=""/>
    
  </div>
</div>
<div class="white-area"></div>

<!--...............Estimate section........................-->
<div class="wrapper">
  <div class="estimate-area">
    <div class="estimate-area-inner">
      <h2>Get an estimate now</h2>
      <h3>Save up to 50% from traditional shipping companies</h3>
      <h4>Enter the information of your shipment</h4> 
      <form  action="{{route('calculator') }}" method="post"  id="calculator_result">
        <input type="hidden" value="<?=csrf_token()?>" name="_token">
        <div class="estimate-form">
          <div class="custom_selection" style="width:245px;">
            <select name="shape" id="shape" required value="{{old('shape')}}">
              <option value="">Choose option</option>
              <option value="Parcel">Parcel</option>
              <option value="Flat">Flat</option>
              <option value="FlatRateEnvelope">FlatRateEnvelope</option>
              <option value="LegalFlatRateEnvelope">LegalFlatRateEnvelope</option>
              <option value="PaddedFlatRateEnvelope">PaddedFlatRateEnvelope</option>
              <option value="SmallFlatRateBox">SmallFlatRateBox</option>
              <option value="MediumFlatRateBox">MediumFlatRateBox</option>
              <option value="LargeFlatRateBox">LargeFlatRateBox</option>
              <option value="RegionalRateBoxA">RegionalRateBoxA</option>
              <option value="RegionalRateBoxB">RegionalRateBoxB</option>
            </select>
          </div>

          <div class="formarea">
            <input type="number" name="weight" id="weight" required min="1" placeholder="Weight" class="custominput" value="{{old('weight')}}"/>
            <div class="custom_selection" style="width:115px;">
              <select name="unit" id="unit" required value="{{old('unit')}}">
                <option value="">Unit</option>
                <option value="oz">oz</option>
                <option value="lb">lb</option>
              </select>
            </div>
          </div>

          <div class="formarea extramargin">
            <input type="number" name="length" id="length" min="0" required placeholder="Length" class="custominput"/>
            <input type="number" name="width" id="width" placeholder="Width" min="0"  required class="custominput"/>
            <input type="number" name="height" id="height" min="0" required placeholder="Height" class="custominput"/>
            <div class="custom_selection" style="width:145px;">
              <select name="dimensions_unit" id="dimensions_unit" required value="{{old('dimensions_unit')}}">
                <option value="">Dimensions Unit</option>
                <option value="cm">cm</option>
                <option value="in">in</option>
                <option value="ft">ft</option>
                <option value="mm">mm</option>
                <option value="m">m</option>
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
              <select name="state_code" id="state_code" required>
                <option value="">Select State</option>
                @if(!empty($stateList))
                  @foreach ($stateList as $state)
                    <option value="{{$state->state_code}}">{{$state->name}}</option>
                  @endforeach
                @endif
              </select>
            </div>
            <input type="number" name="to_postal_code" id="to_postal_code" min="1" placeholder="Receiver's Postal Code"  required style="width: 236px;" class="custominput"/>
            <span class="custom_selection">(Ex: 94306)</span>
          </div>

          <div class="clear"></div>
          <div style="margin-top:25px;">
          <input type="submit" value="Calculate Rate" class="customformbtn"/>
          <!-- {{--@if(!empty(is_numeric($total_price)))--}}
          <span class="custom_selection result ">@if(!empty($total_price)) {{$total_price ?? ''}} @else Result @endif</span>
          {{--@else--}} -->
          <span class="custom_selection result error-result">@if(!empty($total_price)) {{$total_price}} @else Result @endif</span>  
           </div>
          <!-- {{--@endif--}}  -->
        </div>
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
        <img src="{{ asset('site/assets/images/why-us.svg') }}" alt=""/>
        <p>Discover why choosing MelloBridge can transform your business today</p>
        <a href="#" class="custom-btn smallbtn">Discover</a>
      </div>

      <div class="explore-box">
        <h3>Locations</h3>
        <img src="{{ asset('site/assets/images/location.svg') }}" alt=""/>
        <p>Find the closest location near you</p>
        <a href="#" class="custom-btn smallbtn">Find</a>
      </div>

      <div class="explore-box">
        <h3>Pricing</h3>
        <img src="{{ asset('site/assets/images/pricing.svg') }}" alt=""/>
        <p>Get a quick estimate with our shipping calculator</p>
        <a href="#" class="custom-btn smallbtn">Estimate</a>
      </div>

      </div>
      <a href="#" class="custom-btn extraspace">Sign Up Now</a>
    </div>
</div>
@endsection
@push('custom-styles')
    <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
    <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush 
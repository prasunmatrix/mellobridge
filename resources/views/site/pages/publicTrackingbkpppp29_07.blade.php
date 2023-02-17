@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<style>
  .sipinput{
    padding-top:15px;
  }
  .sipinput input[type="text"]{
    width: 100%;
    padding: 1rem;
    background: #e4e7eb;
    border: none;
    box-shadow: none;
    margin-bottom: 15px;
  }
  .sipinput .custom-btn {
    width: 135px;
    height: 45px;
    padding: 0;
    line-height: 45px;
    border: none;
    cursor: pointer;
  }
</style>
<div class="inner-wrapper extra-padding">
    <h1>Track Your Shipment</h1>
    {{--<h2 class="sip-id">Shipment ID: 0987654321</h2>--}}
    
    
  <!-- tracking --

  <div class="shipments tracking-information">
    <p>Please note that the tracking information available to our Support team is the same information shown on the tracking page. </p>
  </div>

  <!-- 2 colum area -->

  <div class="track-area">
    <div class="track-area-lft">
    @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissable __web-inspector-hide-shortcut__">                      
                      <span style="color:green;">{{ Session::get('success') }}</span>
                  </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissable">
                    <span style="color:red;">{{ Session::get('error') }}</span>
                </div>
                @endif
    <form method="get" action="{{ route('tracking') }}" id="tracking" name="tracking">
    {{ csrf_field() }}
    <div class="sipinput">
      <input type="text" name="tracking_id" required id="tracking_id"/>
      <input type="submit" class="custom-btn"/>
    </div>
   </form>

      <div class="latest-update">

        {{--<div class="track-area-lft">
          <h3>Latest Update</h3>
          <p>
            April 17, 2022<br/>
            In Transit
          </p>
        </div>
        <div class="track-area-rgt align-right">
          <h3>Estimated delivery</h3>
          <p>
            5-15 estimated business days<br/>
            Fully tracked<br/>
            RICHMOND CA 90210<br/>
            United States
          </p>
        </div>--}}

      </div>

      <!-- slider area -->

      {{--<div class="tracking-slider">
        <img src="{{ asset('site/assets/images/slider.jpg') }}" alt=""/>
      </div>--}}

     <!-- Alert area -->
     <div class="alert-area">
        <h3>Carrier Alert <img src="{{ asset('site/assets/images/alert_icon2.svg') }}" alt=""/></h3>
        <p>COVID-19 safety measures are causing delays with ALL carriers. Please note our Client Service agents have no further details than what is displayed on the tracking page.</p>
     </div>

     <!-- Tracking history -->

     {{--<div class="tracking-history">
       <h3>Tracking History</h3>

 

<div class="row">
  <div class="col col-25">
    <p>April 16, 2022</p>
  </div>
  <div class="col col-25">
    <p>10:53 AM</p>
  </div>
  <div class="col col-50">
    <p>Shipment created, MelloBridge awaiting item</p>
  </div>
</div>

     </div>--}}

    </div>
    <div class="track-area-rgt">
     {{-- <a href="#" class="custom-btn full-width">Copy Tracking Link</a>--}}
      <h3>Partner Carrier</h3>
      <p>
        MelloBridge has partnered with USPS for the last mile delivery of your package.
      </p>
      <p>
        USPS Tracking <a href="#">12345678901234567890 </a>
      </p>

      <h3>Support</h3>
      <p>
        If you are concerned about delays, damage or lost items, please contact the seller for more information about how to proceed with your transaction. 
      </p>
      <p>
        When the carrier attempts delivery and the recipient is unavailable, a notice to collect the shipment from a local post office or pickup point may be left. In this case, please contact the carrier directly for more information. 
      </p>
    </div>

  </div>

</div>
@endsection
@push('custom-styles')
    <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
    <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush
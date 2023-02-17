@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');body{background-color: #5E47D2;font-family: 'Open Sans',serif}.container{margin-top:50px;margin-bottom: 50px}
   
      .track{position: relative;height: 100px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative }.track .step.active:before{background: #5E47D2}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px;  background: #000000;}.track .step.active .icon{background: #5E47D2;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #ee5435;border-color: #ee5435;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #ff2b00;border-color: #ff2b00;border-radius: 1px}
    </style>
   <!-- <style>
      #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #5E47D2;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 33.33%;
    float: left;
    position: relative;
    font-weight: 400;
    color: #455A64 !important;
    
}

#progressbar #step1:before {
    content: "1";
    color: #fff;
    width: 29px;
    margin-left: 15px !important;
    padding-left: 11px !important;
}


#progressbar #step2:before {
    content: "2";
    color: #fff;
    width: 29px;

}

#progressbar #step3:before {
    content: "3";
    color: #fff;
    width: 29px;
    margin-right: 15px !important;
    padding-right: 11px !important;
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #455A64 ;
    border-radius: 50%;
    margin: auto;
}

 #progressbar li:after {
    content: '';
    width: 121%;
    height: 2px;
    background: #455A64;
    position: absolute;
    left: 0%;
    right: 0%;
    top: 15px;
    z-index: -1;
} 

#progressbar li:nth-child(2):after {
    left: 50%;
}

#progressbar li:nth-child(1):after {
    left: 25%;
    width: 121%;
}
#progressbar li:nth-child(3):after {
    left: 25% !important;
    width: 50% !important;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #4bb8a9; 
}
</style>-->
<div class="inner-wrapper extra-padding">
    <h1>Track Your Shipment</h1>
    <h2 class="sip-id">Shipment ID: {{$shipmentid}}</h2>

  <!-- tracking -->

  <div class="shipments tracking-information">
    <p>Please note that the tracking information available to our Support team is the same information shown on the tracking page. </p>
  </div>

  <!-- 2 colum area -->

  <div class="track-area">
    <div class="track-area-lft">

      <div class="latest-update">

        <div class="track-area-lft">
          <h3>Latest Update</h3>
          @php
          $dt = new DateTime($timeStamp);
          $lastdate= $dt->format('Y-m-d');
          @endphp
          <p>
            {{$lastdate}}<br/>
            {{$lastStatus}}
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
        </div>

      </div>

      <!-- slider area -->

      <div class="tracking-slider">
        {{--<img src="{{ asset('site/assets/images/slider.jpg') }}" alt=""/>--}}
       <div class="track">
      
               @if(count($trackingStatus) >= 1 && count($trackingStatus) <=4)
                   <div class="step active"> 
                  <span class="icon"> <i class="fa fa-check"></i> </span>
                   <span class="text">{{$lastStatus}}</span> </div>
                   <div class="step " > 
                  <span class="icon"style="display:none"> <i class="fa fa-check"></i> </span>
                   <span class="text" style="display:none">In transit</span> </div>
                   <div class="step "> 
                  <span class="icon"style="display:none"> <i class="fa fa-check"></i> </span>
                   <span class="text"style="display:none"> </span> </div>
                   @endif
                   @if(count($trackingStatus) >= 5 && count($trackingStatus) <=12)
                   <div class="step active "> 
                  <span class="icon"style="display:none"> <i class="fa fa-check"></i> </span>
                   <span class="text"style="display:none">{{$lastStatus}}</span> </div>
                   <div class="step active" > 
                  <span class="icon"> <i class="fa fa-check"></i> </span>
                   <span class="text" >{{$lastStatus}}</span> </div>
                   <div class="step "> 
                  <span class="icon"style="display:none"> <i class="fa fa-check"></i> </span>
                   <span class="text"style="display:none"> </span> </div>
                   @endif
                   @if(count($trackingStatus) >= 13)
                   <div class="step active "> 
                  <span class="icon"style="display:none"> <i class="fa fa-check"></i> </span>
                   <span class="text"style="display:none">{{$lastStatus}}</span> </div>
                   <div class="step active" > 
                  <span class="icon" style="display:none"> <i class="fa fa-check"></i> </span>
                   <span class="text" style="display:none">{{$lastStatus}}</span> </div>
                   <div class="step active "> 
                  <span class="icon"> <i class="fa fa-check"></i> </span>
                   <span class="text"> {{$lastStatus}}</span> </div>
                   @endif
               
      </div>
     {{-- <div class="row px-3">
            <div class="col">
                <ul id="progressbar" >
                    <li class="step0 active " id="step1">PLACED</li>
                    <li class="step0 active text-center" id="step2">SHIPPED</li>
                    <li class="step0  text-muted text-right" id="step3">DELIVERED</li>
                </ul>
            </div>
        </div>--}}
      
</div>

     <!-- Alert area -->
     {{--<div class="alert-area">
        <h3>Carrier Alert <img src="{{ asset('site/assets/images/alert_icon2.svg') }}" alt=""/></h3>
        <p>COVID-19 safety measures are causing delays with ALL carriers. Please note our Client Service agents have no further details than what is displayed on the tracking page.</p>
     </div>--}}

     <!-- Tracking history -->

     <div class="tracking-history">
       <h3>Tracking History</h3>
       @if(!empty($trackingStatus))
                @foreach($trackingStatus as $key=>$tracking)
       <div class="row">
          <div class="col col-25">
            @php
          $dt = new DateTime($tracking['timestamp']);
          $date= $dt->format('Y-m-d');
          $time= $dt->format('H:i');
          @endphp
            <p>{{$date}} </p>
          </div>
          <div class="col col-25">
            <p>{{$time}}</p>
          </div>
          <div class="col col-50">
            <p>{{$tracking['status']}}   </p>
          </div>
       </div>
       @endforeach
                @endif

      


    {{-- <div class="row">
      <div class="col col-25">
      </div>
      <div class="col col-25">
        <p>6:10 AM</p>
      </div>
      <div class="col col-50">
        <p>Out for delivery. Expected delivery by 9pm
          - RICHMOND, CA  </p>
      </div>
   </div>

   <div class="row">
    <div class="col col-25">
    </div>
    <div class="col col-25">
      <p>4:51 AM</p>
    </div>
    <div class="col col-50">
      <p>Arrived at Post Office - RICHMOND, CA  </p>
    </div>
 </div>

 <div class="row">
  <div class="col col-25">
    <p>April 21, 2022</p>
  </div>
  <div class="col col-25">
    <p>3:40 PM</p>
  </div>
  <div class="col col-50">
    <p>Departed USPS Regional Facility
      - SAN FRANCISCO NETWORK DISTRIBUTION
      CENTER </p>
  </div>
</div>


<div class="row">
  <div class="col col-25">
  </div>
  <div class="col col-25">
    <p>2:12 AM</p>
  </div>
  <div class="col col-50">
    <p>Arrived at USPS Regional Facility
      - SAN FRANCISCO NETWORK DISTRIBUTION
      CENTER </p>
  </div>
</div>

<div class="row">
  <div class="col col-25">
    <p>April 20, 2022</p>
  </div>
  <div class="col col-25">
    <p>6:34 PM</p>
  </div>
  <div class="col col-50">
    <p>In transit - Tracking 12345678901234567890  </p>
  </div>
</div>

<div class="row">
  <div class="col col-25">
  </div>
  <div class="col col-25">
    <p>6:12 PM</p>
  </div>
  <div class="col col-50">
    <p>Departed USPS Regional Facility
      - LOS ANGELES CA DISTRIBUTION CENTER</p>
  </div>
</div>

<div class="row">
  <div class="col col-25">
  </div>
  <div class="col col-25">
    <p>4:23 PM</p>
  </div>
  <div class="col col-50">
    <p>Arrived at USPS Regional Facility
      - LOS ANGELES CA DISTRIBUTION CENTER</p>
  </div>
</div>

<div class="row">
  <div class="col col-25">
  </div>
  <div class="col col-25">
    <p>1:12 PM</p>
  </div>
  <div class="col col-50">
    <p>Accepted at USPS Origin Facility
      - LOS ANGELES CA DISTRIBUTION CENTER</p>
  </div>
</div>

<div class="row">
  <div class="col col-25">
    <p>April 18, 2022</p>
  </div>
  <div class="col col-25">
    <p>6:12 PM</p>
  </div>
  <div class="col col-50">
    <p>Departed MelloBridge </p>
  </div>
</div>

<div class="row">
  <div class="col col-25">
  </div>
  <div class="col col-25">
    <p>9:12 AM</p>
  </div>
  <div class="col col-50">
    <p>Received by MelloBridge</p>
  </div>
</div>

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
</div>--}}

     </div>

    </div>
    <div class="track-area-rgt">
     {{-- <a href="#" class="custom-btn full-width">Copy Tracking Link</a>--}}
      <h3>Partner Carrier</h3>
      <p>
        MelloBridge has partnered with USPS for the last mile delivery of your package.
      </p>
      <p>
        USPS Tracking <a href="#">{{$TRackingnum}} </a>
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
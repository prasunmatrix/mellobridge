<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('frontenduser/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontenduser/assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('frontenduser/assets/css/responsive.css') }}" >
    <link rel="stylesheet" href="{{asset('frontenduser/assets/css/jquery.dataTables.min.css')}}" >
      <link rel="stylesheet" href="{{asset('frontenduser/assets/css/select.dataTables.min.css')}}" >
    <link rel="shortcut icon" href="{{ asset('frontenduser/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <title>Mello Bridge</title>
    <style media="screen">
    .ticker-container {
      background: #fcc104;
      width: 100%;
      overflow: hidden;
      margin: 0 auto;
      height: 35px;
      padding-top: 8px;
      text-align:center;
    }
    .ticker-text {
      height: 150%;
      color: #fafafa;
      white-space:nowrap;
      display:inline-block;
    }
    .ticker-text h3{padding: 0; margin: 0; font-weight: 400; color: #fff;}
    </style>
  </head>
  <body>
    <!-- header start -->
 
    @if(!empty($notificationList))
    <div class="news-feed-sec">
      <div class = "ticker-container">
      	<div class = "ticker-text">
       
          <h3>{{$notificationList->message}}</h3>
         
      	</div>
      </div>
    </div>
    
    @endif
   
    <header>
        <div class="container">
          <div class="row">
              <div class="left">
                <div class="logo">
                    <div class="mob-click">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <a href="{{ url('/')}}"><img src="{{ asset('frontenduser/assets/images/logo.svg') }}" alt="Mello Bridge"></a>
                </div>
                <div class="page-title">{{$page_title}}</div>
              </div>
              @if(Route::currentRouteName() =='dashboard'  )
              <div class="right">
                <a href="javascript:void(0)" onclick="popupCreate();" class="btn-lg btn-purple">Create Shipment</a>
                <a href="{{url('/import-shipment')}}" class="btn-lg btn-black">Import Shipment</a>
              </div>
              @endif
              @if(Route::currentRouteName() =='settings'  )
              <div class="right">
                <a href="javascript:void(0)" onclick="popupCreate();" class="btn-lg btn-purple">Create Shipment</a>
                <a href="{{url('/import-shipment')}}" class="btn-lg btn-black">Import Shipment</a>
              </div>
              @endif
              @if(Route::currentRouteName() =='import-shipment'  )
              <div class="right">
                <a href="javascript:void(0)" onclick="popupCreate();" class="btn-lg btn-purple">Create Shipment</a>
                <a href="{{url('/import-shipment')}}" class="btn-lg btn-black">Import Shipment</a>
              </div>
              @endif
              @if(Route::currentRouteName() =='add-credits'  )
              <div class="right">
                <a href="javascript:void(0)" onclick="popupCreate();" class="btn-lg btn-purple">Create Shipment</a>
                <a href="{{url('/import-shipment')}}" class="btn-lg btn-black">Import Shipment</a>
              </div>
              @endif
              @if(Route::currentRouteName() =='account'  )
              <div class="right">
                <a href="javascript:void(0)" onclick="popupCreate();" class="btn-lg btn-purple">Create Shipment</a>
                <a href="{{url('/import-shipment')}}" class="btn-lg btn-black">Import Shipment</a>
              </div>
              @endif
              @if(Route::currentRouteName() =='all-transaction'  )
              <div class="right">
                <a href="javascript:void(0)" onclick="popupCreate();" class="btn-lg btn-purple">Create Shipment</a>
                <a href="{{url('/import-shipment')}}" class="btn-lg btn-black">Import Shipment</a>
              </div>
              @endif
            
             
          </div>
        </div>
    </header>
    @include('frontenduser.dashboard.create_shipment_ajax')

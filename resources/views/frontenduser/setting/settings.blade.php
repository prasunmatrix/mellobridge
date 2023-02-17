@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
      <!-- header end -->
      <section class="main-container">
         <!-- left menu start -->
         @include('frontenduser.elements.leftmenu')
         <!-- left menu end -->
         <!-- Setting content start -->
         <div class="setting-area">
            <div class="row">
               <div class="setting-box">
                  <div class="txt">
                     <h5><a href="{{url('/account')}}">Account</a></h5>
                     <p>View and update your account and contact details</p>
                  </div>
               </div>
               <div class="setting-box">
                  <div class="txt">
                     <h5><a href="{{url('/add-credits')}}">Credits & Billing</a></h5>
                     <p>Manage your payment method, credit balance and view your transaction history</p>
                  </div>
               </div>
               {{--<div class="setting-box">
                  <div class="txt">
                     <h5>Shipping</h5>
                     <p>Manage your region, insurance preferences and shipping presets</p>
                  </div>
               </div>
               <div class="setting-box">
                  <div class="txt">
                     <h5>Sales Channels</h5>
                     <p>Connect your online store to import your orders</p>
                  </div>
               </div>
               <div class="setting-box">
                  <div class="txt">
                     <h5>Notifications</h5>
                     <p>Manage email notifications</p>
                  </div>
               </div>--}}
            </div>
         </div>
         <!-- Setting content end -->
      </section>
      @endsection
      @push('custom-styles')
        <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
      @endpush
      @push('custom-scripts')
        <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
      @endpush

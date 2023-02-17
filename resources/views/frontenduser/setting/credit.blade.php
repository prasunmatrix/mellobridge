@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
      <!-- header end -->
      <section class="main-container">
         <!-- left menu start -->
        
         @include('frontenduser.elements.leftmenu')
         <!-- left menu end -->
         <!-- account content start -->
         <div class="setting-area account credits">
            <div class="row">
               <div class="col col-30">
                  <h2>Credits</h2>
                  <p>
                     A payment method is required to add credits to your account. Use credits to pay for postage and services 
                  </p>
                  <p>
                  Contact our Client Support team to request a refund of account credits. For
postage refund requests, go to your shipment in the “Pending” page, and
click on “Request Refund” in the bottom toolbar. Only “Pending” shipments
can be refunded."
                  </p>
               </div>
               <div class="col col-50 padding-80">
                  <div class="row margin40">
                     <div class="col col-40">
                        <h2>Available Credits</h2>
                        <div class="set-price">${{Auth::guard('frontenduser')->user()->wallet_amount}}</div>
                        <a href="javascript:void(0)"  onclick="stripe_load_modal();"class="btn-md btn-purple">Add Credits</a>
                     </div>
                     <div class="col col-60">
                        <div class="setting-box-area">
                           Next Step: <br/>
                           Go to your <a href="{{url('/pending-shipment')}}">Pending</a>  tab to buy postage for any shipments you’ve created
                        </div>
                     </div>
                  </div>

                  <div class="row margin40">
                     <div class="col">
                        <h2>Billing</h2>
                        <p>
                           Statements of financial activity including shipping fees, refunds and credits.
                        </p>
                       <a href="{{url('/all-transaction')}}" class="btn-md btn-transparent">All Transactions</a>  {{--<a href="#" class="btn-md btn-transparent">All Statements</a>  <a href="#" class="btn-md btn-transparent">All Transactions</a>--}}
                     </div>
                  </div>

                  <div class="row">
                     <div class="col">
                        <h2>Payment Method </h2>
                        <p>
                           We accept payment by credit card (Visa, Mastercard and American Express).
                        </p>
                       {{-- <div class="payment-area">
                           <div class="setting-box-area">
                              <input type="text" placeholder="MasterCard ****1234 04/2022"/>
                           </div>
                           <a href="#" class="btn-md btn-transparent">Edit</a>  <a href="#" class="btn-md btn-transparent">Remove</a> 
                        </div>--}}

                        <p class="pay-txt">MelloBridge does not store your credit card information on our servers, nor do we have access to this information. Your credit card information is securely stored by our payment provider, Stripe.</p>

                        <p class="pay-txt">Your payment method will only be charged when you add credits manually</p>
                        <p><img src="assets/images/ae.png" alt=""/></p>
                     </div>
                  </div>


               </div>
            </div>
            
         </div>
         <!-- Notifications content end -->
      </section>
      @include('frontenduser.dashboard.create_shipment_ajax')
    
@endsection
@push('custom-styles')
  <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
  <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush

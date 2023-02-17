@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')


      <!-- header end -->
      <section class="main-container">
         <!-- left menu start -->

         @include('frontenduser.elements.leftmenu')
         <!-- left menu end -->
         <!-- datatable content start -->
         <div class="pending-datatable intransit-shipment-sec">
            <h2>MelloBridge Tracking</h2>
            <div class="intransit-btn">
              {{--<a href="#" class="btn-md btn-purple block">Copy Tracking Link</a>--}}
              <a href="{{url('public-tracking')}}" class="btn-md btn-blue block">Go to Public Tracking Page</a>
            </div>
            <div class="intransit-update-sec">
              <div class="row">
                 <div class="col-50">
                    <h2>Latest Update</h2>
                    <p>April 16, 2022
                      <span>Shipment created, MelloBridge awaiting item</span>
                    </p>
                 </div>
                 <div class="col-50">
                   <h2>Estimated delivery</h2>
                   <p>15-20 estimated business days
                      <span>Fully tracked</span>
                      <span>RICHMOND CA 90210</span>
                      United States
                    </p>
                 </div>
              </div>
            </div>
            <div class="tracking-slider">
        <img src="{{ asset('site/assets/images/slider.jpg') }}" alt=""/>
</div>
            <div class="intransit-progress-sec">
              <img src="assets/images/progress-bar.png" alt="">
              <span>Shipment Created</span>
            </div>
           {{-- <div class="intransit-alert-sec">
              <h2>Carrier Alert <img src="assets/images/alert_icon.png" alt="" border="0"></h2>
              <p>COVID-19 safety measures are causing delays with ALL carriers. Please note our Client Service agents have no further details than what is displayed on the tracking page.</p>
            </div>--}}
            <div class="intransit-tracking-sec">
              <h2>Tracking History</h2>
              <div class="table-responsive">
                <table style="width:100%">
                  <tbody>
                    <tr>
                      <td>April 16, 2022</td>
                      <td>10:53 AM</td>
                      <td>Shipment created, MelloBridge awaiting item</td>
                    </tr>
                    <tr>
                      <td>April 16, 2022</td>
                      <td>10:53 AM</td>
                      <td>Shipment created, MelloBridge awaiting item</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
         </div>
         <!-- datatable content end -->
         <!-- side-bar-right start -->
         <div class="side-bar-right"  >
            <div class="side-right-box" >

               <div class="heading-title">MelloBridge Shipment ID</div>
               <div class="tracking" id ="tracking"></div>
               <div class="paid-unpaid"><i class="fa fa-exclamation-circle"></i> Unpaid</div>
               <div class="view-shipment"><a href="#">View Shipment <i class="fa fa-angle-right"></i></a></div>
               <!-- <div class="batch"><span class="txt">Batch</span><span class="batch-id">56780</span></div> -->
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Postage</div>
                  {{--<div class="edit"><a href="#">Edit</a></div>--}}
               </div>
               <div class="postage-details">
                  <div class="flag"><img src="assets/images/flag-us.svg" alt=""></div>
                  <div class="details">
                     <div class="details-row">
                        <div class="left">
                           MelloBridge U.S. Tracked
                           <div class="note">Full tracking included<br>
                              2-12 estimated business days
                           </div>
                        </div>
                        <div class="price" id="postage-amount"></div>
                     </div>
                     <div class="details-row">
                        <div class="left">
                           Tax
                        </div>
                        <div class="price">$0.00</div>
                     </div>
                  </div>
               </div>
               <div class="total">
                  <div class="left">Total</div>
                  <div class="right" id="total_amount"></div>
               </div>
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Package</div>
                  <div class="edit" id="package_edit"></div>
               </div>
               <div class="item" id="shape"></div>
               <div class="item-des" >
                  <p id="dimension"></p>
                  <p id="weight"></p>
               </div>
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Description</div>
                  <div class="edit" id="description_edit"></div>
               </div>
               <div class="item">Merchandise</div>
               <div class="item-des">
                  <ul>
                     <li>1 Handmade Necklace</li>
                     <li>1 Handmade Earrings</li>
                  </ul>
               </div>
               <div class="price">US $50.00</div>
               <div class="order-id">
                  <span class="txt">Order ID</span>
                  <span class="id-no">123456789</span>
               </div>
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Recipient</div>
                  <div class="edit" id="recipient_edit"></div>
               </div>
               <div class="address">
                  John Smith<br>
                  PO BOX 32142<br>
                  CAMBIE RPO<br>
                  RICHMOND CA 90210<br>
                  United States
               </div>

            </div>

         </div>
         <!-- side-bar-right end -->

               

      </section>
    
      <footer>
         <div class="footer-btn">
            <a href="#" class="btn-sm btn-purple">Pay for Shipment</a>
            <a href="#" class="btn-sm btn-disable">Print Postage</a>
            <!-- <a href="#" class="btn-sm btn-purple">Batch <i class="fa fa-angle-up"></i></a> -->
            <div class="footer-btn-dropdown">
              <a href="#" class="btn-sm btn-purple dropdown-btn">Other <i class="fa fa-angle-up"></i></a>
              <ul class="dropdown-sec">
                <li><a href="#" class="btn-sm btn-purple">Pay for Shipment</a></li>
                <li><a href="#" class="btn-sm btn-purple">Pay for Shipment</a></li>
               
              </ul>
            </div>
         </div>
      </footer>

@endsection
@push('custom-styles')
  <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
  <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush


@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
<style media="screen">
  .pending-datatable{width: calc(100% - 240px - 30px);}
  @media screen and (max-width: 991px) {
    .pending-datatable{width: 100%;}
  }
</style>
      <!-- header end -->
      <section class="main-container">
         <!-- left menu start -->

         @include('frontenduser.elements.leftmenu')
         <!-- left menu end -->
         <!-- datatable content start -->
         <div class="pending-datatable">
            <div class="table-responsive">
               <div class="sortarea">
                  <label>Sort By</label>
                  <select style="display:none">

                  </select>
                  <select >
                     <option>Descending</option>
                  </select>
               </div>
               <table id="transaction-shipment" class="display" style="width:100%">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Transaction Id</th>
                        <th>Transaction Date</th>
                        <th>Transaction Type</th>
                        <th>Order Id</th>
                        <th>Charge</th>
                        <th>Credit</th>
                        <th>Account Balance</th>
                        {{--<th>Postage</th>
                        <th>Rate</th>
                        <th>Status</th>--}}


                        <!-- <th>Batch</th> -->
                     </tr>
                  </thead>
                  <tbody>
                    {{-- <tr>
                        <td></td>
                        <td>Order#_input</td>
                        <td>Recipient_input</td>
                        <td>Country_input</td>
                        <td>Description_input</td>
                        <td>Postagetype_input</td>
                        <td>Rate_input</td>
                        <td>Status_input</td>
                        <td>Createddate_input</td>
                        <!-- <td>Batch#_input</td> -->
                     </tr>--}}


                  </tbody>
               </table>
            </div>
         </div>
         <!-- datatable content end -->
         <!-- side-bar-right start -->
         <div class="side-bar-right" style="display:none;" id="shipment_detail">
            <div class="side-right-box" >

               <div class="heading-title">MelloBridge Shipment ID</div>
               <div class="tracking" id ="tracking"></div>
               <div class="paid-unpaid" id="paidstatus"><i class="fa fa-exclamation-circle"></i> </div>
               <div class="view-shipment" id="viewship"></div>
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
                        <div class="price" id="postage"></div>
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
                  <div id="dimension"></div>
                  <div id="weight"></div>
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
                     <li id="content"></li>

                  </ul>
               </div>
               <div class="price" id="retailvalue"></div>
               <div class="order-id">
                  <span class="txt">Order ID</span>
                  <span class="id-no" id="orderid"></span>
               </div>
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Recipient</div>
                  <div class="edit" id="recipient_edit"></div>
               </div>
               <div class="address" id="useraddress">

               </div>

            </div>

         </div>
         <!-- side-bar-right end -->

               <!-- <div class="side-bar-right shipping-pats"  id="shipment_blank"><div class="ship-area">
               <img src="assets/images/ship-car.png" alt=""/>
               <h3><span>Click on shipment</span> to view detail</h3>
            </div></div>
         <div class="side-bar-right shipping-pats"  id="shipment_blank_count" style="display:none;"><div class="ship-area">
               <img src="assets/images/ship-car.png" alt=""/>
               <h3 id="ship_count"></h3>
            </div></div> -->
          </div>

      </section>


      
      <input type="hidden" id="selected-value"  >
@endsection
@push('custom-styles')
  <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
  <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


            <script>
               $(document).ready(function () {

                  // alert('aaaa');
                   oTable = $('#transaction-shipment').DataTable({
                       processing: true,
                       serverSide: true,
                       order: [[2, 'desc']],
                       bDestroy: true,
                        pageLength: 10,

                       ajax: {
                           url: '{!! route("alltransaction.list.table") !!}',
                           data: function (d) {
                               d.type = $('select[name=type]').val();
                           }

                       },

                       columns: [
                        {data: 'id', name: 'id'},
                        {data: 'transaction_id', name: 'transaction_id'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'type', name: 'type'},
                        {data: 'order_id', name: 'order_id'},
                        {data: 'totalpay', name: 'totalpay'},
                        {data: 'credit_amount', name: 'credit_amount'},
                        {data: 'wallet', name: 'wallet'},
                        
                       ],


                       drawCallback: function () {
                           // $('[data-toggle=confirmation]').confirmation({
                           //     rootSelector: '[data-toggle=confirmation]',
                           //     container: 'body'
                           // });
                       }
                   });
                   $('select[name="type"]').on("change", function (event) {
                       oTable.draw();
                       event.preventDefault();
                   });
               });

                   </script>

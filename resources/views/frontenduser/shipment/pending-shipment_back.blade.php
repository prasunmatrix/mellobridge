@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')

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
                  <select>
                     <option>Created</option>
                  </select>
                  <select>
                     <option>Descending</option>
                  </select>
               </div>
               <table id="pending-shipment" class="display" style="width:100%">
                  <thead>
                     <tr>
                        <th><input type="checkbox"/></th>
                        <th>Order</th>
                        <th>Recipient</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Postage</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Created</th>
                        <!-- <th>Batch</th> -->
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
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
                     </tr>
                     <tr>
                        <td></td>
                        <td>123456789</td>
                        <td>John Smith</td>
                        <td>US</td>
                        <td>1 Handmade Necklace, 1 Handmade Earrings</td>
                        <td>MelloBridgeU.S. Tracked</td>
                        <td>$14.01</td>
                        <td><i class="fa fa-exclamation-circle"></i> Unpaid</td>
                        <td>April 16, 2022</td>
                        <!-- <td>56780</td> -->
                     </tr>
                     <tr>
                        <td></td>
                        <td>123456790</td>
                        <td>Jane Doe</td>
                        <td>US</td>
                        <td>2 Azure Bracelets</td>
                        <td>MelloBridgeU.S. Tracked</td>
                        <td>$8.75</td>
                        <td><i class="fa fa-check-circle" aria-hidden="true"></i> paid</td>
                        <td>April 13, 2022</td>
                        <!-- <td>56780</td> -->
                     </tr>
                     <tr>
                        <td></td>
                        <td>123456791</td>
                        <td>Michael John Doe</td>
                        <td>CA</td>
                        <td>1 Pack of 5 Ceramic Handmade Plates</td>
                        <td>MelloBridge Canada Tracked</td>
                        <td>$20.12</td>
                        <td><i class="fa fa-exclamation-circle"></i> Postage Expired</td>
                        <td>December 3, 2021</td>
                        <!-- <td>56780</td> -->
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- datatable content end -->
         <!-- side-bar-right start -->
         <div class="side-bar-right">
            <div class="side-right-box">
               <div class="heading-title">MelloBridge Shipment ID</div>
               <div class="phone">0987654321</div>
               <div class="paid-unpaid"><i class="fa fa-exclamation-circle"></i> Unpaid</div>
               <div class="view-shipment"><a href="#">View Shipment <i class="fa fa-angle-right"></i></a></div>
               <!-- <div class="batch"><span class="txt">Batch</span><span class="batch-id">56780</span></div> -->
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Postage</div>
                  <div class="edit"><a href="#">Edit</a></div>
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
                        <div class="price">$14.01</div>
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
                  <div class="right">$14.01</div>
               </div>
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Package</div>
                  <div class="edit"><a href="#">Edit</a></div>
               </div>
               <div class="item">Parcel</div>
               <div class="item-des">
                  <p>24 × 30 × 5 cm</p>
                  <p>300 g</p>
               </div>
            </div>
            <div class="side-right-box">
               <div class="header">
                  <div class="title">Description</div>
                  <div class="edit"><a href="#">Edit</a></div>
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
                  <div class="edit"><a href="#">Edit</a></div>
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
            <a href="#" class="btn-sm btn-purple">Other <i class="fa fa-angle-up"></i></a>
         </div>
      </footer>
       
@endsection
@push('custom-styles')
  <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
  <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush
<script>
               $(document).ready(function () {
                   oTable = $('#pending-shipment').DataTable({
                       processing: true,
                       serverSide: true,
                        pageLength: 50,
                       ajax: {
                           url: '{!! route("pendingshipment.list.table") !!}',
                           data: function (d) {
                               d.type = $('select[name=type]').val();
                           }
                       },
                       columns: [
                        {data: 'first_name', name: 'first_name'},
                        {data: 'country', name: 'country'},
                        {data: 'discount_amount', name: 'discount_amount'},
                        {data: 'valid_from', name: 'valid_from'},
                        {data: 'valid_upto', name: 'valid_upto'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
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
              
           

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
                  <select style="display:none">
                     <option>Created</option>
                  </select>
                  <select name="type" >
                     <option value=1>Descending</option>
                     <option value=2>Ascending</option>
                  </select>
               </div>
               <table id="pending-shipment" class="display" style="width:100%">
                  <thead>
                     <tr>
                        {{--<th><input type="checkbox"/></th>--}}
                        <th><input type="checkbox" id="flowcheckall" value="" /></th>
                        <th>Order ID</th>
                        <th>Recipient</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Postage Price</th>
                        {{--<th>Postage</th>
                        <th>Rate</th>
                        <th>Status</th>--}}
                        <th>Created</th>
                       
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
               <div class="item" id="shape_type"></div>
               <div class="item-des" >
                  <div id="dimension"></div>
                  <div id="weight-uni"></div>
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
        
               <div class="side-bar-right shipping-pats"  id="shipment_blank"><div class="ship-area">
               <img src="assets/images/ship-car.png" alt=""/>
               <h3><span>Click on Shipment</span> to view detail</h3>
            </div></div>
         <div class="side-bar-right shipping-pats"  id="shipment_blank_count" style="display:none;"><div class="ship-area">
               <img src="assets/images/ship-car.png" alt=""/>
               <h3 id="ship_count"></h3>
            </div></div></div>
         
      </section>
     
      <footer>
         <div class="footer-btn">
           {{-- <a href="#" class="btn-sm btn-purple">Pay for Shipment</a>--}}
            <a href="#" class="btn-sm btn-disable">Pay for Shipment</a>
            <a href="#" class="btn-sm btn-disable">Print Postage</a>
            <div class="footer-btn-dropdown">
              <a href="#" class="btn-sm btn-disable">Other <i class="fa fa-angle-up"></i></a>
              <ul class="dropdown-sec">
                <li><a href="javascript:void(0)" class="btn-sm btn-purple deleteshipment">Delete</a></li>
                <li><a href="javascript:void(0)" class="btn-sm btn-purple refundshipment">Refund Request</a></li>
               
              </ul>
            </div>
            <!-- <a href="#" class="btn-sm btn-purple">Batch <i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="btn-sm btn-purple deleteshipment">Delete <i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="btn-sm btn-purple refundshipment">Refund Request<i class="fa fa-angle-up"></i></a>-->
               <input type="hidden" id="selected-value"  >  
         </div>
      </footer>
       
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
                   oTable = $('#pending-shipment').DataTable({
                       processing: true,
                       serverSide: false,
                       bDestroy: true,
                       order: [[6, 'desc']],
                        pageLength: 10,
                        
                       ajax: {
                           url: '{!! route("voidshipment.list.table") !!}',
                           data: function (d) {
                               d.type = $('select[name=type]').val();
                           }
                           
                       },
                       
                       columns: [
                        {data: 'check_box', name: 'check_box'},
                        {data: 'order_id', name: 'order_id'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'country_name', name: 'country_name'},
                        {data: 'parcel_description', name: 'parcel_description'},
                        {data: 'totalpay', name: 'totalpay'},
                        {data: 'created_at', name: 'created_at'},
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
                       var currentOrder = oTable.order()[0];
                       if ( currentOrder[0] === 6 && currentOrder[1] === 'asc' ) {
                        oTable.order( [ 6, 'desc' ] ).draw();
                           }
                           else {
                              oTable.order( [ 6, 'asc' ] ).draw();
                           }
                     //   alert(currentOrder);
                   });
               });
               var selectedchekbox=new Array();
              $(document).on('click', '.recep-name', function (e) {
                    e.preventDefault();
                    let redirectUrl= $(this).data('redirect-url');
                    var url = "{!! route("pending-shipment") !!}";
                  var countcheckbox = document.getElementsByClassName("recep-name");
                  $('.check_details').prop("checked", false);
                  //if checkbox checked more than one box
                   for (var i = 0; i < countcheckbox.length; i++) {
                     countcheckbox[i].checked = false;
                    }
                     // $("#shipment_"+redirectUrl).prop('checked', false);
                    $(this).closest('tr').find('#shipment_'+redirectUrl).prop("checked", true);

                     $.ajax({
                     type: "GET",
                     url: url,
                     data:({
                              redirectUrl : redirectUrl,
                           }),
                     cache: false,
                     success: function(data)
                     {  
                           if(data.pending_detail !=''){
                              $("#shipment_detail").show();
                              $("#shipment_blank").hide();
                              $("#shipment_blank_count").hide();
                           }
                           $("#tracking").html(data.tracking_number);
                           $("#postage").html(data.postage_amount);
                           $("#total_amount").html(data.total_amount);
                           $("#shape_type").html(data.shape);
                           $("#dimension").html(data.dimension);
                           $("#weight-uni").html(data.weight);
                           $("#content").html(data.package_description);
                           $("#retailvalue").html(data.reatil_value);
                           $("#orderid").html(data.order_id);
                           $("#useraddress").html(data.name +'<br>'+data.addressline1+ '<br>'+data.city+'<br>'+data.postal_code);
                           if(data.is_paid ==1){
                              $("#paidstatus").html('Paid');
                           }
                           if(data.is_paid ==0){
                            
                              $("#paidstatus").html('Unpaid');
                              
                           }
                           
                                
                     }
                  });
                
                }); 
                   $(document).on('click', '.check_details', function (e) {
                     let redirectUrl= $(this).data('redirect-url');
                     var url = "{!! route("pending-shipment") !!}";
                     var numberOfChecked = $('input:checkbox:checked').length;
                     if($(this).prop("checked")){
                        selectedchekbox.push($(this).data('redirect-url'));
                     }else{
                      selectedchekbox.pop($(this).data('redirect-url'));
                     }
                     // alert(JSON.stringify(selectedchekbox));
                     $('#selected-value').val(JSON.stringify(selectedchekbox));
                     if(numberOfChecked ==1){
                        $("#shipment_detail").show();
                        $("#shipment_blank").hide();
                        $("#shipment_blank_count").hide();
                     }

                     //if checkbox is selected more than one time.
                     if(numberOfChecked >1){
                        var text ="shipments selected"
                        var totalshipment = numberOfChecked + ' ' + text;
                        $("#ship_count").text(totalshipment);
                        $("#shipment_detail").hide();
                        $("#shipment_blank").hide();
                        $("#shipment_blank_count").show();
                      }
                     $.ajax({
                     type: "GET",
                     url: url,
                     data:({
                              redirectUrl : redirectUrl,
                           }),
                     cache: false,
                     success: function(data)
                     {  
                           if(data.pending_detail !=''){
                              $("#shipment_detail").show();
                              $("#shipment_blank").hide();
                           }
                           if(numberOfChecked ==0){
                              $("#shipment_detail").hide();
                              $("#shipment_blank").show();
                              $("#shipment_blank_count").hide();
                           }
                           $("#tracking").html(data.tracking_number);
                           $("#postage").html(data.postage_amount);
                           $("#total_amount").html(data.total_amount);
                           $("#shape_type").html(data.shape);
                           $("#dimension").html(data.dimension);
                           $("#weight-uni").html(data.weight);
                           $("#content").html(data.package_description);
                           $("#retailvalue").html(data.reatil_value);
                           $("#orderid").html(data.order_id);
                           $("#useraddress").html(data.name +'<br>'+data.addressline1+ '<br>'+data.city+'<br>'+data.postal_code);
                           if(data.is_paid ==1){
                              $("#paidstatus").html('Paid');
                           }
                           if(data.is_paid ==0){
                             
                              $("#paidstatus").html('Unpaid');
                           }
                           
                                
                     }
                  });
                    

                   });
                   $(document).on('click', '.deleteshipment', function (e) {
                    e.preventDefault();
                    let text = "Are you sure to delete this shipments";
                    if (confirm(text) == true) {
                        var selectedvalue = $('#selected-value').val();
                        var url = "{!! route("shipmentdelete") !!}";
                        $.ajax({
                           type: "GET",
                           url: url,
                           data:({
                              selectedvalue : selectedvalue,
                                 }),
                           cache: false,
                           success: function(data)
                           {  
                              toastr.success(data.message);
                              window.setTimeout(function(){
                                 location.reload();

                           }, 2000);
                                       
                                    
                           }
                        });
                     }
                    
                  });
                  $(document).on('click', '.refundshipment', function (e) {
                    e.preventDefault();
                    let text = "Are you sure to refund this shipments";
                    if (confirm(text) == true) {
                        var selectedvalue = $('#selected-value').val();
                        var url = "{!! route("shipmentrefund") !!}";
                        $.ajax({
                           type: "GET",
                           url: url,
                           data:({
                              selectedvalue : selectedvalue,
                                 }),
                           cache: false,
                           success: function(data)
                           {  
                              toastr.success(data.message);
                              window.setTimeout(function(){
                                 location.reload();

                           }, 2000);
                                       
                                    
                           }
                        });
                     }
                    
                  });
                   </script>
            
              
           

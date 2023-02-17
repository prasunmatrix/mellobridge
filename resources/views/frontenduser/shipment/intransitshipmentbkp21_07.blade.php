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
               <table id="intransit-shipment" class="display" style="width:100%">
                  <thead>
                     <tr>
                        {{--<th><input type="checkbox"/></th>--}}
                        <th>#</th>
                        <th>Recipient</th>
                        <th>Description</th>
                        <th>Postage Amount</th>
                        <th>Total amount</th>
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
        
               <div class="side-bar-right shipping-pats"  id="shipment_blank"><div class="ship-area">
               <img src="assets/images/ship-car.png" alt=""/>
               <h3><span>Click On shipment</span> to view detail</h3>
            </div></div>
         <div class="side-bar-right shipping-pats"  id="shipment_blank_count" style="display:none;"><div class="ship-area">
               <img src="assets/images/ship-car.png" alt=""/>
               <h3 id="ship_count"></h3>
            </div></div></div>
         
      </section>
      @include('frontenduser.dashboard.create_shipment_ajax')
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


            <script>
               $(document).ready(function () {
                  // alert('aaaa');
                   oTable = $('#intransit-shipment').DataTable({
                       processing: true,
                       serverSide: true,
                       bDestroy: true,
                        pageLength: 10,
                        
                       ajax: {
                           url: '{!! route("intransitshipment.list.table") !!}',
                           data: function (d) {
                               d.type = $('select[name=type]').val();
                           }
                           
                       },
                       
                       columns: [
                        {data: 'check_box', name: 'check_box'},
                        {data: 'first_name', name: 'first_name'},
                        {data: 'parcel_description', name: 'parcel_description'},
                        {data: 'postage_amount', name: 'postage_amount'},
                        {data: 'total_amount', name: 'total_amount'},
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
                   });
               });

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
                           $("#shape").html(data.shape);
                           $("#dimension").html(data.dimension);
                           $("#weight").html(data.weight);
                          
                           
                                
                     }
                  });
                
                }); 
                   $(document).on('click', '.check_details', function (e) {
                     let redirectUrl= $(this).data('redirect-url');
                     var url = "{!! route("pending-shipment") !!}";
                     var numberOfChecked = $('input:checkbox:checked').length;
                     // alert(numberOfChecked);
                     //if checkbox is selected more than one time.
                     if(numberOfChecked >1){
                        var text ="shipments checked"
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
                           $("#shape").html(data.shape);
                           $("#dimension").html(data.dimension);
                           $("#weight").html(data.weight);
                           if(data.is_paid ==0){
                              Descripthtml ='<a href="javascript:void(0)" onclick="popupdescription();"id="descipedit" data-package-content=' + data.package_content + ' data-retail-value=' + data.reatil_value + ' data-package-description=' + data.package_description + ' >Edit</a>';
                              $("#description_edit").html(Descripthtml);
                              Packagehtml ='<a href="javascript:void(0)" onclick="popuppackage();" id="packageedit"data-height=' + data.height + ' data-width=' + data.width + ' data-length=' + data.length + ' data-dimensionUnit=' + data.dimensionUnit + ' data-ship_weight=' + data.ship_weight + 'data-weight_unit=' + data.weight_unit + '>Edit</a>';
                              $("#package_edit").html(Packagehtml);
                              Recipienthtml ='<a href="javascript:void(0)" onclick="popupOne();" id ="recipientedit" data-name=' + data.name +' data-addressline1=' + data.addressline1 +' data-addressline2=' + data.addressline2 +' data-city=' + data.city +' data-postal_code=' + data.postal_code +'>Edit</a>';
                              $("#recipient_edit").html(Recipienthtml);
                           }
                           
                                
                     }
                  });
                    

                   });
                   </script>
            
              
           

@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')

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
                  <select name="type" >
                     <option value=1>Descending</option>
                     <option value=2>Ascending</option>
                  </select>
               </div>
               <table id="pending-shipment" class="display" style="width:100%">
                  <thead>
                     <tr>
                     <th><input type="checkbox" class="flowcheckall"id="flowcheckall" value="" /></th>
                        
                        <th>Order ID</th>
                        <th>Recipient</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Status </th>
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
               <div class="item" id="packtype"></div>
               <div class="item-des">
                 
                     <div id="content"></div>
                    
                 
               </div>
               <div class="price" id="retailvalue"></div>
               <div class="order-id">
               
                  <span class="txt">Order ID</span>
                 
                  <div class="id-no" id="orderid"> ></div>
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
            <a href="#" id="paybutton1"class="btn-sm btn-disable" >Pay for Shipment</a>
            <a href="javascript:void(0)" id="paybutton"class="btn-sm btn-purple payshipment" style="display:none">Pay for Shipment</a>
            <a href="#"  id="printbutton1"class="btn-sm btn-disable">Print Postage</a>
            <a href="javascript:void(0)"  id="printbutton"class="btn-sm btn-purple printshipment" style="display:none">Print Postage</a>
            <div class="footer-btn-dropdown">
              <a href="#" class="btn-sm btn-purple dropdown-btn">Other <i class="fa fa-angle-up"></i></a>
              <ul class="dropdown-sec">
              <li><a href="#" id="deletebutton1" class="btn-sm btn-disable">Delete</a></li>
                <li><a href="javascript:void(0)" id="deletebutton"class="btn-sm btn-purple deleteshipment" style="display:none">Delete</a></li>
                <li><a href="#"  id="refundbutton1"class="btn-sm btn-disable">Refund Request</a></li>
                <li><a href="javascript:void(0)" id="refundbutton"class="btn-sm btn-purple refundshipment" style="display:none">Refund Request</a></li>
               
              </ul>
            </div>
            <!-- <a href="#" class="btn-sm btn-purple">Batch <i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="btn-sm btn-purple deleteshipment">Delete <i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="btn-sm btn-purple printshipment">Refund Request<i class="fa fa-angle-up"></i></a>-->
               <input type="hidden" id="selected-value"  >  
         </div>
      </footer>
      <!--print postage modal-->
<div id="print_postage" class="mello-overlay mello-popup-new">
  <div class="mello-popup">
    <div class="content">
      <section class="create-shipment">
          <a class="close" onclick="popupClose('pop1')" href="javascript:void(0)">&times;</a>
          <h4>Print Postage</h4>
          {{--<h3 id="total_ship">4 shipments ready to print</h3>--}}
          <h3 id="total_ship"></h3>
          <div class="popup-table-new">
             <div class="table-responsive">
               <table style="width:100%" id="print_post">
               <tbody>
                   <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                    
                   </tr>
                 
                  
                 </tbody>
               {{-- <tbody>
                   <tr>
                     <td>Elizabeth M</td>
                     <td><img src="https://demoyourprojects.com/mellobridge/site/assets/images/icon-im-1.png" alt="" border="0">MelloBridge U.S. Tracked</td>
                     <td><a href="#">Download</a></td>
                   </tr>
                 
                  
                 </tbody>--}}
               </table>
             </div>
          </div>
          <div class="popup-btn-sec">
            <a href="{{url('/pending-shipment')}}">Done</a>
            {{--<a href="#">Print Postage</a>--}}
          </div>
      </section>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


            <script>
               $(document).ready(function () {

                  // alert('aaaa');
                   oTable = $('#pending-shipment').DataTable({
                     
                       processing: true,
                       serverSide: false,
                       order: [[7, 'desc']],
                       bDestroy: true,
                        pageLength: 10,
                        
                       ajax: {
                           url: '{!! route("pendingshipment.list.table") !!}',
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
                        {data: 'is_paid', name: 'is_paid'},
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
                       if ( currentOrder[0] === 7 && currentOrder[1] === 'asc' ) {
                        oTable.order( [ 7, 'desc' ] ).draw();
                           }
                           else {
                              oTable.order( [ 7, 'asc' ] ).draw();
                           }
                     //   alert(currentOrder);
                   });
               });
               var selectedchekbox=new Array();
               $(document).on('click', '#flowcheckall', function (e) {
                  var cells = oTable.column(0).nodes(), // Cells from 1st column
                     state = this.checked;

                  for (var i = 0; i < cells.length; i += 1) {
                     cells[i].querySelector("input[type='checkbox']").checked = state;
                  }
                     var numberOfChecked = $('input:checkbox:checked').length;
                     if(numberOfChecked ==0){
                        $("#shipment_detail").hide();
                        $("#shipment_blank").show();
                        $("#shipment_blank_count").hide();
                        $("#paybutton").hide();
                        $("#paybutton1").show();
                        $("#deletebutton").hide();
                        $("#deletebutton1").show();
                        $("#refundbutton").hide();
                        $("#refundbutton1").show();
                     }
                     if(numberOfChecked >1){
                       
                        var text ="shipments selected";
                        var totalnumber =numberOfChecked-1;
                        var totalshipment = totalnumber + ' ' + text;
                        $("#ship_count").text(totalshipment);
                        $("#shipment_detail").hide();
                        $("#shipment_blank").hide();
                        $("#shipment_blank_count").show();
                      }
                     if(numberOfChecked >1){
                     var url = "{!! route("allpendingselect") !!}";
                    
                        $.ajax({
                           type: "GET",
                           url: url,
                           cache: false,
                           success: function(data)
                           {  
                              $('#selected-value').val(data.allid);
                              if(data.status ==2){
                              $("#paybutton").show();
                              $("#paybutton1").hide();
                              $("#deletebutton").show();
                              $("#deletebutton1").hide();
                              $("#refundbutton").hide();
                              $("#refundbutton1").show();
                           }
                           if(data.status ==1){
                              $("#paybutton").hide();
                              $("#paybutton1").show();
                              $("#deletebutton").hide();
                              $("#deletebutton1").show();
                              $("#refundbutton").show();
                              $("#refundbutton1").hide();
                           }
                           if(data.printstatus ==1){
                              $("#printbutton").hide();
                              $("#printbutton1").show();
                           }
                           if(data.printstatus ==2){
                              $("#printbutton").show();
                              $("#printbutton1").hide();
                           }
                                    
                           }
                        });
                     }
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
                    if( $(this).closest('tr').find('#shipment_'+redirectUrl).prop("checked", true)){
                        selectedchekbox.push($(this).data('redirect-url'));
                     }else{
                        if ((index = selectedchekbox.indexOf($(this).data('redirect-url'))) !== -1){
                           selectedchekbox.splice(index, 1);
                        }
                     //  selectedchekbox.pop($(this).data('redirect-url'));
                     }
                     // alert(JSON.stringify(selectedchekbox));
                     $('#selected-value').val(JSON.stringify(selectedchekbox));

                     // $("#shipment_"+redirectUrl).prop('checked', false);
                    $(this).closest('tr').find('#shipment_'+redirectUrl).prop("checked", true);

                     $.ajax({
                     type: "GET",
                     url: url,
                     data:({
                              redirectUrl : redirectUrl,
                              selectedvalue : JSON.stringify(selectedchekbox),
                              
                           }),
                     cache: false,
                     success: function(data)
                     {  
                        // alert(data.name);
                           if(data.pending_detail !=''){
                              $("#shipment_detail").show();
                              $("#shipment_blank").hide();
                              $("#shipment_blank_count").hide();
                           }
                           $("#tracking").html(data.tracking_number);
                           $("#postage-amount").html(data.postage_amount);
                           $("#total_amount").html(data.total_amount);
                           if(data.shape=='FlatRateEnvelope'){
                              $("#shape_type").html('thick Envelope');
                           }else{
                              $("#shape_type").html(data.shape);
                           }
                           $("#packtype").html(data.package_content);
                           $("#dimension").html(data.dimension);
                           $("#weight-uni").html(data.weight);
                           $("#content").html(data.package_description);
                           $("#retailvalue").html(data.reatil_value);
                           $("#orderid").html(data.order_id);
                           $("#viewship").html(data.viewship);
                           $("#useraddress").html(data.name +'<br>'+data.addressline1+ '<br>'+data.city+'<br>'+data.postal_code);
                           if(data.is_paid ==1){
                              $("#paidstatus").html('Paid');
                              Descripthtml ='';
                              $("#description_edit").html(Descripthtml);
                              Packagehtml ='';
                              $("#package_edit").html(Packagehtml);
                              Recipienthtml ='';
                              $("#recipient_edit").html(Recipienthtml);
                           }
                           // alert(data.is_paid)
                           if(data.is_paid ==0){
                              Descripthtml ='<a href="javascript:void(0)" onclick="popupdescription();"id="descipedit" data-phone="' + data.phone + '" data-order-id="' + data.order_id + '" data-state-name="' + data.state_name + '" data-state=' + data.state + ' data-country="' + data.country_name + '" data-shape-type=' + data.shape + ' data-ship-id=' + data.id +' data-ship-unit="' + data.weight_unit +'" data-name="' + data.name +'" data-addressline1="' + data.addressline1 + '" data-addressline2="' + data.addressline2 + '"  data-city="' + data.city + '" data-postal_code=' + data.postal_code +' data-package-content="' + data.package_content + '" data-retail-value=' + data.reatil_value + ' data-description="' + data.package_description + '" data-height=' + data.height + ' data-width=' + data.width + '  data-length=' + data.length + ' data-dimensionUnit=' + data.dimensionUnit + ' data-ship-weight=' + data.ship_weight + '>Edit</a>';
                              $("#description_edit").html(Descripthtml);
                              Packagehtml ='<a href="javascript:void(0)" onclick="popuppackage();" id="packageedit" data-phone="' + data.phone + '" data-order-id="' + data.order_id + '" data-state-name="' + data.state_name + '" data-state=' + data.state + ' data-country="' + data.country_name + '" data-shape-type=' + data.shape +' data-ship-id=' + data.id +' data-ship-unit="' + data.weight_unit +'" data-name="' + data.name +'" data-addressline1="' + data.addressline1 + '" data-addressline2="' + data.addressline2 + '" data-city="' + data.city + '" data-postal_code=' + data.postal_code +' data-retail-value=' + data.reatil_value + ' data-description="' + data.package_description + '" data-package-content="' + data.package_content + '" data-height=' + data.height + ' data-width=' + data.width + ' data-length=' + data.length + ' data-dimensionUnit=' + data.dimensionUnit + ' data-ship-weight=' + data.ship_weight +   '>Edit</a>';
                              $("#package_edit").html(Packagehtml);
                              Recipienthtml ='<a href="javascript:void(0)" onclick="popupOne();" id ="recipientedit" data-phone="' + data.phone + '" data-order-id="' + data.order_id + '" data-state-name="' + data.state_name + '" data-state=' + data.state + ' data-country="' + data.country_name + '" data-shape-type=' + data.shape +' data-ship-id=' + data.id +' data-ship-unit="' + data.weight_unit +'" data-name="' + data.name +'" data-addressline1="' + data.addressline1 + '" data-addressline2="' + data.addressline2 + '" data-city="' + data.city + '" data-postal_code=' + data.postal_code +' data-package-content="' + data.package_content + '" data-retail-value=' + data.reatil_value + ' data-description="' + data.package_description + '" data-height=' + data.height + ' data-width=' + data.width + ' data-length=' + data.length + ' data-dimensionUnit=' + data.dimensionUnit + ' data-ship-weight=' + data.ship_weight + ' >Edit</a>';
                              $("#recipient_edit").html(Recipienthtml);
                              $("#paidstatus").html('Unpaid');
                              
                           }
                           if(data.status ==2){
                              $("#paybutton").show();
                              $("#paybutton1").hide();
                              $("#deletebutton").show();
                              $("#deletebutton1").hide();
                              $("#refundbutton").hide();
                              $("#refundbutton1").show();
                              $("#printbutton").hide();
                              $("#printbutton1").hide();
                           }
                           if(data.status ==1){
                              $("#paybutton").hide();
                              $("#paybutton1").show();
                              $("#deletebutton").hide();
                              $("#deletebutton1").show();
                              $("#refundbutton").show();
                              $("#refundbutton1").hide();
                              $("#printbutton").hide();
                              $("#printbutton1").hide();
                           }
                           if(data.printstatus ==1){
                              $("#printbutton").hide();
                              $("#printbutton1").show();
                           }
                           if(data.printstatus ==2){
                              $("#printbutton").show();
                              $("#printbutton1").hide();
                           }
                           
                                
                     }
                  });
                
                }); 
                   $(document).on('click', '.check_details', function (e) {
                     // alert($('#selected-value').val());
                     if (!$(this).prop("checked")){
                       $("#flowcheckall").prop("checked",false);
                      }
                     let redirectUrl= $(this).data('redirect-url');
                     // alert(redirectUrl);
                     var url = "{!! route("pending-shipment") !!}";
                     var numberOfChecked = $('input:checkbox:checked').length;
                     if($(this).prop("checked")){
                        selectedchekbox.push($(this).data('redirect-url'));
                     }else{
                        if ((index = selectedchekbox.indexOf($(this).data('redirect-url'))) !== -1){
                           selectedchekbox.splice(index, 1);
                        }
                     //  selectedchekbox.pop($(this).data('redirect-url'));
                     }
                     // alert(JSON.stringify(selectedchekbox));
                     // alert(selectedchekbox);
                     if(numberOfChecked ==1){
                        redirectUrl=selectedchekbox;
                     }
                     $('#selected-value').val(JSON.stringify(selectedchekbox));
                     //  alert(JSON.stringify(selectedchekbox));
                     
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
                              selectedvalue : JSON.stringify(selectedchekbox),
                           }),
                     cache: false,
                     success: function(data)
                     {  
                        //  alert(data.status);
                         
                           if(data.pending_detail !=''){
                              $("#shipment_detail").show();
                              $("#shipment_blank").hide();
                           }
                           if(numberOfChecked ==0){
                              $("#shipment_detail").hide();
                              $("#shipment_blank").show();
                              $("#shipment_blank_count").hide();
                           }
                           if(data.status ==2){
                              $("#paybutton").show();
                              $("#paybutton1").hide();
                              $("#deletebutton").show();
                              $("#deletebutton1").hide();
                              $("#refundbutton").hide();
                              $("#refundbutton1").show();
                              $("#printbutton").hide();
                              $("#printbutton1").hide();
                           }
                           if(data.status ==1){
                              $("#paybutton").hide();
                              $("#paybutton1").show();
                              $("#deletebutton").hide();
                              $("#deletebutton1").show();
                              $("#refundbutton").show();
                              $("#refundbutton1").hide();
                              $("#printbutton").hide();
                              $("#printbutton1").hide();
                           }
                           if(data.printstatus ==1){
                              $("#printbutton").hide();
                              $("#printbutton1").show();
                           }
                           if(data.printstatus ==2){
                              $("#printbutton").show();
                              $("#printbutton1").hide();
                           }
                           $("#tracking").html(data.tracking_number);
                           $("#postage-amount").html(data.postage_amount);
                           $("#total_amount").html(data.total_amount);
                           if(data.shape=='FlatRateEnvelope'){
                              $("#shape_type").html('thick Envelope');
                           }else{
                              $("#shape_type").html(data.shape);
                           }
                           
                           $("#packtype").html(data.package_content);
                           $("#dimension").html(data.dimension);
                           $("#weight-uni").html(data.weight);
                           $("#content").html(data.package_description);
                           $("#retailvalue").html(data.reatil_value);
                           $("#orderid").html(data.order_id);
                           $("#viewship").html(data.viewship);
                           $("#useraddress").html(data.name +'<br>'+data.addressline1+ '<br>'+data.city+'<br>'+data.postal_code);
                           if(data.is_paid ==1){
                              $("#paidstatus").html('Paid');
                              Descripthtml ='';
                              $("#description_edit").html(Descripthtml);
                              Packagehtml ='';
                              $("#package_edit").html(Packagehtml);
                              Recipienthtml ='';
                              $("#recipient_edit").html(Recipienthtml);
                           }
               
                           if(data.is_paid ==0){
                              Descripthtml ='<a href="javascript:void(0)" onclick="popupdescription();"id="descipedit" data-phone="' + data.phone + '" data-order-id="' + data.order_id + '" data-state-name="' + data.state_name + '" data-state=' + data.state + '  data-country="' + data.country_name + '" data-shape-type=' + data.shape +' data-ship-id=' + data.id +' data-ship-unit="' + data.weight_unit +'" data-name="' + data.name +'" data-addressline1="' + data.addressline1 + '" data-addressline2="' + data.addressline2 + '"  data-city="' + data.city + '" data-postal_code=' + data.postal_code +' data-package-content="' + data.package_content + '" data-retail-value=' + data.reatil_value + ' data-description="' + data.package_description + '" data-height=' + data.height + ' data-width=' + data.width + '  data-length=' + data.length + ' data-dimensionUnit=' + data.dimensionUnit + ' data-ship-weight=' + data.ship_weight + '>Edit</a>';
                              $("#description_edit").html(Descripthtml);
                              Packagehtml ='<a href="javascript:void(0)" onclick="popuppackage();" id="packageedit" data-phone="' + data.phone + '" data-order-id="' + data.order_id + '" data-state-name="' + data.state_name + '" data-state=' + data.state + ' data-country="' + data.country_name + '" data-shape-type=' + data.shape +' data-ship-id=' + data.id +' data-ship-unit="' + data.weight_unit +'" data-name="' + data.name +'" data-addressline1="' + data.addressline1 + '" data-addressline2="' + data.addressline2 + '" data-city="' + data.city + '" data-postal_code=' + data.postal_code +' data-retail-value=' + data.reatil_value + ' data-description="' + data.package_description + '" data-package-content="' + data.package_content + '" data-height=' + data.height + ' data-width=' + data.width + ' data-length=' + data.length + ' data-dimensionUnit=' + data.dimensionUnit + ' data-ship-weight=' + data.ship_weight +   '>Edit</a>';
                              $("#package_edit").html(Packagehtml);
                              Recipienthtml ='<a href="javascript:void(0)" onclick="popupOne();" id ="recipientedit" data-phone="' + data.phone + '" data-order-id="' + data.order_id + '" data-state-name="' + data.state_name + '" data-state=' + data.state + '  data-country="' + data.country_name + '" data-shape-type=' + data.shape +' data-ship-id=' + data.id +' data-ship-unit="' + data.weight_unit +'" data-name="' + data.name +'" data-addressline1="' + data.addressline1 + '" data-addressline2="' + data.addressline2 + '" data-city="' + data.city + '" data-postal_code=' + data.postal_code +' data-package-content="' + data.package_content + '" data-retail-value=' + data.reatil_value + ' data-description="' + data.package_description + '" data-height=' + data.height + ' data-width=' + data.width + ' data-length=' + data.length + ' data-dimensionUnit=' + data.dimensionUnit + ' data-ship-weight=' + data.ship_weight + ' >Edit</a>';
                              $("#recipient_edit").html(Recipienthtml);
                              $("#paidstatus").html('Unpaid');
                              
                           }
                           if(numberOfChecked ==1){
                        $("#shipment_detail").show();
                        $("#shipment_blank").hide();
                        $("#shipment_blank_count").hide();
                     }
                           
                           
                                
                     }
                  });
                    

                   });
                   $(document).on('click', '.deleteshipment', function (e) {
                    e.preventDefault();
                    var selectedvalue = $('#selected-value').val();
                  //   alert(selectedvalue);
                    if(selectedvalue==''){
                     alert('Please select at least one shipment');
                     return false;
                    }
                    if(selectedvalue=='[]'){
                     alert('Please select at least one shipment');
                     return false;
                    }
                    let text = "Are you sure you want to delete this shipments";
                    if (confirm(text) == true) {
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
                    var selectedvalue = $('#selected-value').val();

                    if(selectedvalue==''){
                     alert('Please select at least one shipment');
                     return false;
                    }
                    if(selectedvalue=='[]'){
                     alert('Please select at least one shipment');
                     return false;
                    }
                    let text = "Would you like to request a refund?";
                    if (confirm(text) == true) {
                        
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
                             if(data.status ==0){
                              toastr.error(data.message);
                             }else{
                              toastr.success(data.message);
                             }
                              window.setTimeout(function(){
                                 location.reload();

                           }, 4000);
                                       
                                    
                           }
                        });
                     }
                    
                  });
                  $(document).on('click', '.payshipment', function (e) {
                    e.preventDefault();
                    var selectedvalue = $('#selected-value').val();
                  //   alert(selectedvalue);
                    if(selectedvalue==''){
                     alert('Please select at least one shipment');
                     return false;
                    }
                    if(selectedvalue=='[]'){
                     alert('Please select at least one shipment');
                     return false;
                    }
                    let text = "Are you sure you want to pay for this shipment?";
                    if (confirm(text) == true) {
                        var url = "{!! route("payshipment") !!}";
                        $.ajax({
                           type: "GET",
                           url: url,
                           data:({
                              selectedvalue : selectedvalue,
                                 }),
                           cache: false,
                           success: function(data)
                           {  if(data.status ==0){
                              toastr.error(data.message);

                           }else{
                              toastr.success(data.message);
                              // console.log(data.shipmentdata);
                              $("#total_ship").html(data.shipmentdata.length+' shipments ready to print');
                              
                             /* for(i = 0; i < data.shipmentdata.length; i++){
                                 var id = data.shipmentdata[i].id;
                                 var name = data.shipmentdata[i].first_name+' '+data.shipmentdata[i].last_name;
                                 print_preview_html = '<tbody><tr><td>'+name+' </td><td><img src="https://demoyourprojects.com/mellobridge/site/assets/images/icon-im-1.png" alt="" border="0">MelloBridge U.S. Tracked</td></tr></tbody>';
                                 $("#print_post").html(print_preview_html);
                              }*/
                             
                              $.each(data.shipmentdata, function (i, payment) {
                                 var x = $('#print_post tbody tr:first').clone().appendTo('#print_post tbody');
                                 x.find('td').eq(0).text(data.shipmentdata[i].first_name +' '+data.shipmentdata[i].last_name);
                                 x.find('td').eq(1).html('<img src="https://demoyourprojects.com/mellobridge/frontenduser/assets/images/flag.png" alt="" border="0">MelloBridge U.S. Tracked');
                                 x.find('td').eq(2).html('<a href="https://demoyourprojects.com/mellobridge/generate-pdf/'+data.shipmentdata[i].id +'" target="_blank">Download</a>');
                              });
                              
                              $('#print_postage').css({'visibility':'visible','opacity':1});
                               $('#print_postage').show();
                           }
                             
                             
                                       
                                    
                           }
                        });
                     }
                    
                  });
                  $(document).on('click', '.printshipment', function (e) {
                    e.preventDefault();
                    var selectedvalue = $('#selected-value').val();
                  //   alert(selectedvalue);
                    if(selectedvalue==''){
                     alert('Please select at least one shipment');
                     return false;
                    }
                    if(selectedvalue=='[]'){
                     alert('Please select at least one shipment');
                     return false;
                    }
                   // let text = "Are you sure you want to print for this shipment?";
                  //  if (confirm(text) == true) {
                        var url = "{!! route("printshipment") !!}";
                        $.ajax({
                           type: "GET",
                           url: url,
                           data:({
                              selectedvalue : selectedvalue,
                                 }),
                           cache: false,
                           success: function(data)
                           {  
                             
                             
                              $.each(data.shipmentdata, function (i, payment) {
                                 var x = $('#print_post tbody tr:first').clone().appendTo('#print_post tbody');
                                 x.find('td').eq(0).text(data.shipmentdata[i].first_name +' '+data.shipmentdata[i].last_name);
                                 x.find('td').eq(1).html('<img src="https://demoyourprojects.com/mellobridge/frontenduser/assets/images/flag.png" alt="" border="0">MelloBridge U.S. Tracked');
                                 x.find('td').eq(2).html('<a href="https://demoyourprojects.com/mellobridge/generate-pdf/'+data.shipmentdata[i].id +'" target="_blank">Download</a>');
                              });
                              
                              $('#print_postage').css({'visibility':'visible','opacity':1});
                               $('#print_postage').show();
                           
                             
                             
                                       
                                    
                           }
                        });
                     //}
                    
                  });
                  function popupprint(){
                     $('#print_postage').css({'visibility':'visible','opacity':1});
                     $('#print_postage').show();
                  }
                   </script>
            
              
           

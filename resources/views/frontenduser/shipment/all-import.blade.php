@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
<style media="screen">
  .allimport{width: calc(100% - 240px - 30px);}
  @media screen and (max-width: 991px) {
    .allimport{width: 100%;}
  }
  
</style>

      <!-- header end -->
      <section class="main-container">
         <!-- left menu start -->

         @include('frontenduser.elements.leftmenu')
         <!-- left menu end -->
         <!-- datatable content start -->
         <div class="pending-datatable allimport">
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
                      <th><input type="checkbox" id="flowcheckall" value="" /></th>
                        {{--<th>#</th>--}}
                        <th>Order ID</th>
                        <th>Recipient</th>
                        <th>Country</th>
                        <th>Description</th>
                        <th>Value</th>
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
       
         <!-- side-bar-right end -->
        
              
         
      </section>
    
     
      <footer>
         <div class="footer-btn">
            <a href="#" class="btn-sm btn-purple cancelorders">Cancel & Restart</a>
            
            <a href="javascript:void(0)"  class="btn-sm btn-purple importorders">Import Orders</a>
            <div class="footer-btn-dropdown">
             
            </div>
            <!-- <a href="#" class="btn-sm btn-purple">Batch <i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="btn-sm btn-purple deleteshipment">Delete <i class="fa fa-angle-up"></i></a>
            <a href="javascript:void(0)" class="btn-sm btn-purple refundshipment">Refund Request<i class="fa fa-angle-up"></i></a>-->
               <input type="hidden" id="selected-value"  > 
               <input type="hidden" id="all-value"  >  
         </div>
      </footer>
      <!--print postage modal-->

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
                       order: [[6, 'desc']],
                       bDestroy: true,
                        pageLength: 10,
                        
                       ajax: {
                           url: '{!! route("allimport.list.table") !!}',
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
               $(document).on('click', '#flowcheckall', function (e) {
                  var cells = oTable.column(0).nodes(), // Cells from 1st column
                     state = this.checked;

                  for (var i = 0; i < cells.length; i += 1) {
                     cells[i].querySelector("input[type='checkbox']").checked = state;
                  }
                     var numberOfChecked = $('input:checkbox:checked').length;
                     if(numberOfChecked >1){
                     var url = "{!! route("allimportselect") !!}";
                    
                        $.ajax({
                           type: "GET",
                           url: url,
                           cache: false,
                           success: function(data)
                           {  
                              // $('#selected-value').val(data.allid);
                              $('#selected-value').val(data.allid);
                                    
                           }
                        });
                     }
               });
             
               
              
                   $(document).on('click', '.check_details', function (e) {
                     // alert($('#selected-value').val());
                     if (!$(this).prop("checked")){
                       $("#flowcheckall").prop("checked",false);
                      }
                     let redirectUrl= $(this).data('redirect-url');
                     //  alert(redirectUrl);
                     
                     var url = "{!! route("pending-shipment") !!}";
                     var numberOfChecked = $('input:checkbox:checked').length;
                     // alert(numberOfChecked);
                     if($(this).prop("checked")){
                        selectedchekbox.push($(this).data('redirect-url'));
                     }else{
                        if ((index = selectedchekbox.indexOf($(this).data('redirect-url'))) !== -1){
                           selectedchekbox.splice(index, 1);
                        }
                     //  selectedchekbox.pop($(this).data('redirect-url'));
                     }
                     // alert(JSON.stringify(selectedchekbox));
                     $('#selected-value').val(JSON.stringify(selectedchekbox));
                     // alert(numberOfChecked);
                     
                    

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
                    let text = "Are you sure to delete this shipments";
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
                  $(document).on('click', '.importorders', function (e) {
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
                    let text = "Would you like to import these shipment ?";
                    if (confirm(text) == true) {
                        var url = "{!! route("importordersshipment") !!}";
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
                              window.setTimeout(function(){
                                window.location.href = '{!! route("pending-shipment") !!}';
                                }, 4000);
                              
                           }
                             
                             
                                       
                                    
                           }
                        });
                     }
                    
                  });
                  $(document).on('click', '.cancelorders', function (e) {
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
                    let text = "Would you like to cancel and restart these shipment ?";
                    if (confirm(text) == true) {
                        var url = "{!! route("cancelordersshipment") !!}";
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
                              window.setTimeout(function(){
                                window.location.href = '{!! route("import-shipment") !!}';
                                }, 4000);
                              
                           }
                             
                             
                                       
                                    
                           }
                        });
                     }
                    
                  });
                
                   </script>
            
              
           

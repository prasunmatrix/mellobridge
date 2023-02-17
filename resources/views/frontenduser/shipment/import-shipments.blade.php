@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
      <!-- header end -->
      <section class="main-container">
         <!-- left menu start -->
         @include('frontenduser.elements.leftmenu')
         <!-- left menu end -->
         <!-- Import Shipments content start -->
<style>
.alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
}
.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}
#cover-spinn {
    position: fixed;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.7);
    z-index: 9999;
    display: none;
  }

  @-webkit-keyframes spin {
    from {
      -webkit-transform: rotate(0deg);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  #cover-spinn::after {
    content: '';
    display: block;
    position: absolute;
    left: 48%;
    top: 40%;
    width: 40px;
    height: 40px;
    border-style: solid;
    border-color: black;
    border-top-color: transparent;
    border-width: 4px;
    border-radius: 50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
  }
  .shipments-box a{
    color:#000;
  }

</style>
         
         
         <div class="import-shipments">
            <div class="shipments-box">
               <div class="icon"><img src="{{asset('frontenduser/assets/images/icon-store.png')}}" alt=""></div>
               <div class="txt">
                  <h5>Connect a Store</h5>
                  <p>Import orders by connecting your online store</p>
                  
               </div>
            </div>
            <div class="shipments-box">
            <a href="javascript:void(0)" onclick="load_modal();"><div class="icon"> <img src="{{asset('frontenduser/assets/images/icon-upload-file.png')}}" alt=""></div></a>
           {{-- <form id="country_import_form" action="{{ route('shipmentcsvImport') }}" method="POST" enctype="multipart/form-data">--}}
           
            <div class="txt">
            <a href="javascript:void(0)" onclick="load_modal();">
                  <h5>Upload a File</h5>
                 <p>Import orders by XLSX</p>
               </div>
               {{ csrf_field() }}
               <div id="cover-spinn"></div>
               
               {{--<input type="file" name="import_file" id="import_file">
           <div class="icon"></div>Upload</a>

              <button type="submit" id="btnSubmit">Upload</button>--}}
            </div>
           {{-- </form>--}}

         </div>
         <!-- Import Shipments content end -->
         <!-- side-bar-right start -->
         
         <!-- side-bar-right end -->
         
      </section>
      
     
     
@include('frontenduser.dashboard.create_shipment_ajax')  

@endsection
@push('custom-styles')
  <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')

@endpush
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


          
            <script>
               $(document).on('click', '#btnSumbit', function (e) { 
                    e.preventDefault();
                    var formData = new FormData();
                    var size = $("#import_file").val();
                     formData.append('import_file', $('input[type=file]')[0].files[0]);
                   
                    if(size ==''){
                      alert('Please select any . xlsx , xls file');
                      return false;
                    }
                    // var id = $("#import_file").val();
                        e.preventDefault();
                        $("#import_file").closest(".form-group").removeClass("has-error");
                        $("#import_file").closest(".form-group").find(".help-block").html('');
                    // alert(formData);
                    $('#cover-spinn').show(0);
                    
                    $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                   
                    $.ajax({
                        url: '{!! route("shipmentcsvImport") !!}',
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        processData: false,  // tell jQuery not to set contentType
                        contentType: false, // tell jQuery not to set contentType
                        success: function (data) {
                          $('#cover-spinn').hide(0); 
                          // window.location.href = '{!! route("pending-shipment") !!}';
                            if (data.type == 'error') {
                                $("#import_file").closest(".form-group").find(".help-block").html(data.errors.import_file);
                                $("#import_file").closest(".form-group").addClass("has-error");
                            } else {
                                $("#success_block").html('').hide();
                                $("#error_block").html('').hide();
                                if (typeof (data.excel_error_msg) != "undefined") {
                                    let err_html = '';
                                    let msgs = data.excel_error_msg;
                                    for (var key of Object.keys(msgs)) {
                                    //    console.log(key + " -> " + msgs[key])
                                        // err_html += "<p>" + msgs[key] + "</p>"
                                        err_html += "<p>" + msgs[key] + "</p>"
                                    }
                                    // $("#error_block").html(err_html).show();
                                    toastr.error('Some rows are not  imported');
                                    window.setTimeout(function(){
                                   window.location.href = '{!! route("all-import") !!}';
                                }, 4000);
                                }
                                if (typeof (data.excel_success_msg) != "undefined") {
                                    let success_html = '';
                                    let msgs = data.excel_success_msg;
                                    for (var key of Object.keys(msgs)) {
                                        // console.log(key + " -> " + msgs[key])
                                        success_html += "<p>" + msgs[key] + "</p>"
                                    }
                                    // $("#success_block").html(success_html).show();
                                    toastr.success(success_html);
                                    window.setTimeout(function(){
                                   window.location.href = '{!! route("all-import") !!}';
                                }, 4000);
                                }
                            }
                        
                        }
                    });
                });
           </script>

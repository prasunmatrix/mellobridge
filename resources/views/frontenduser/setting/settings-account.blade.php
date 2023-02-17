@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
      <!-- header end -->
      <section class="main-container">
         <!-- left menu start -->
         @include('frontenduser.elements.leftmenu')
         <!-- left menu end -->
         <!-- account content start -->
         <div class="setting-area account">
            <div class="row">
               <div class="col col-30">
                  <h2>Account Owner</h2>
                  <h2 class="font-weight500">Client ID:  10{{$userData->id}}</h2>
                  <p class="small-txt">
                     View your signed <a href="#"> Shipment Compliance Declaration.</a><br/>
                     View our <a href="#">Terms</a>, and <a href="#">Privacy Policy</a>.
                  </p>
               </div>
               <div class="col col-50">
               @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissable __web-inspector-hide-shortcut__">
                                           
                      <span style="color:green;">{{ Session::get('success') }}</span>
                  </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissable">
                    <span style="color:red;">{{ Session::get('error') }}</span>
                </div>
                @endif
                  <h2 class="margin40">Profile Information &nbsp; <a href="{{url('/profiledit')}}">Edit</a></h2>
                  <div class="row">
                     <div class="col col-50">
                        <h2>Name</h2>
                        <p>{{$userData->name}}</p>
                     </div>
                     <div class="col col-50">
                        <h2>Email</h2>
                        <p>{{$userData->email}}</p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col col-50">
                        <h2>Phone</h2>
                        <p>{{$userData->phone}}</p>
                     </div>
                     {{--<div class="col col-50">
                        <h2>Alternate Phone</h2>
                        <p>1234567890</p>
                     </div>--}}
                  </div>

                  {{--<div class="row">
                     <div class="col">
                        <h2>Address</h2>
                        <p>
                           123 Street<br/>
                           City<br/>
                           State<br/>
                           Postal Code<br/>
                           Country
                        </p>
                     </div>
                  </div>--}}

                  <div class="row">
                     <div class="col">
                        <h2>Password &nbsp; <a href="{{url('/change-password')}}">Change</a> </h2>
                        <p>
                           Change the password you use to sign in to your account.
                        </p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col">
                        <h2>Business Information &nbsp; <a href="{{url('/businessedit')}}">Edit</a> </h2>
                        <h2>Business Name</h2>
                        <p>
                        {{$userData->company_name}}
                        </p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col">
                        <h2>Delete Account </h2>
                        <p>View instructions to request a refund if you still have available credits before deleting your account. Next page will ask you to confirm the deletion of your account.</p>
                        <p>
                          <a href="javascript:void(0)"class="btn-sm btn-purple deleteaccount">Continue to Delete Account</a>
                        </p>
                     </div>
                  </div>

               </div>
            </div>
            
         </div>
         <!-- Notifications content end -->
      </section>

      @endsection
      @push('custom-styles')
        <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
      @endpush
      @push('custom-scripts')
        <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
      @endpush
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.deleteaccount', function (e) {
                    e.preventDefault();
                    let text = "Are you sure you want to delete your account?";
                    if (confirm(text) == true) {
                        
                        var url = "{!! route("userdelete") !!}";
                        $.ajax({
                           type: "GET",
                           url: url,
                           cache: false,
                           success: function(data)
                           {  
                              window.location.href = "login";
                                       
                                    
                           }
                        });
                     }
                    
                  });
                  </script>
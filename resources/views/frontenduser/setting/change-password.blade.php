@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
<style>
  .sipinput{
    padding-top:15px;
  }
  .sipinput input[type="text"]{
    width: 100%;
    padding: 1rem;
    background: #e4e7eb;
    border: none;
    box-shadow: none;
    margin-bottom: 15px;
  }
  .sipinput input[type="password"]{
    width: 100%;
    padding: 1rem;
    background: #e4e7eb;
    border: none;
    box-shadow: none;
    margin-bottom: 15px;
  }
  .profilinput .customer-btn {
    width: 135px;
    height: 45px;
    padding: 0;
    background: #e4e7eb;
    line-height: 45px;
    border: none;
    cursor: pointer;
  }
</style>
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
               @if(count($errors) > 0)
               <div class="alert alert-success alert-dismissable __web-inspector-hide-shortcut__">    
                                              
                                                @foreach ($errors->all() as $error)
                                                    <span>{{ $error }}</span><br/>
                                                @endforeach
                                            </div>
                                        @endif
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
               <form method="post" action="{{ route('changepasswordsubmit') }}" id="password" name="password">
                {{ csrf_field() }}
                  <div class="row">
                     <div class="col col-50">
                        <h2>New Password</h2>
                        <div class="sipinput">
                        <input type="password" name="new_password"  required id="new_password"/>
                        <span>Password must be 8 characters</span>
                     </div>
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
                     <div class="profilinput">
                           
                    <input type="submit" class="btn-sm btn-purple block"/>
                    {{--<a href="{{url('/account')}}"  class="btn-sm btn-purple block">Back</a>--}}
                            </div>
                     </div>
                  </div>

                  </form>

                  
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

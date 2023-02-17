@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<div class="inner-wrapper extra-padding">
  <!-- How it section -->
  <div class="contact-area">
        <div class="row">
            <div class="col contact-txt">
              <div class="contact-txt-wrapper">
                <h2>Contact Us</h2>
                <p>
                  <strong>Call MelloBridge</strong><br/>
                  {{$adminData->phone}}
                </p>
                  <p>
                    <strong>Email MelloBridge</strong><br/>
                    {{$adminData->admin_email}}
                </p>
              </div>
              

              <div class="contact-txt-wrapper">
                <h2>Our Locations</h2>
                {{ strip_tags($location->description) }} 
              </div>
                
            </div>

            <div class="col">
                <h2>Send us a message</h2>
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
                <div class="contact-form login-box">
                  <form method="post" action="{{ route('contactus.post') }}" id="contact_us" name="contact_us">
                    <input type="hidden" value="<?=csrf_token()?>" name="_token">
                      <div class="row">
                        <div class="col col-50">
                            <input type="text" name="full_name" id="full_name" value="{{old('full_name')}}" required placeholder="Your name"/>
                            <span style="color:red;">{{ $errors->first('full_name') }}</span>

                        </div>
                      </div>
                    <div class="row">
                      <div class="col col-50">
                          <input type="email" name="emailId" id="emailId" value="{{old('emailId')}}" required placeholder="Email"/>
                          <span style="color:red;">{{ $errors->first('emailId') }}</span>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col">
                        <input type="text" name="subject" id="subject" value="{{old('subject')}}" required placeholder="Subject"/>
                        <span style="color:red;">{{ $errors->first('subject') }}</span>
                    </div>
                </div>
                <div class="row">
                  <div class="col">
                      <textarea placeholder="Message" name="message" id="message" required></textarea>
                      <span style="color:red;">{{ $errors->first('message') }}</span>
                  </div>
              </div>

              <div class="row">
                <div class="col col-50">
                    <input type="submit" value="Send"/>
                </div>
            </div>

          </form>

                </div>
            </div>

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

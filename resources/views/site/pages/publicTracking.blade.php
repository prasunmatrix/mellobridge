@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')


<div class="inner-wrapper">
  <div class="banner-area inner-top-area trackarea">
    <h1>Track Your Package</h1>
    <h2>Enter your MelloBridge tracking number</h2>

    <div class="login-box track-form">
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
                <form method="get" action="{{ route('tracking') }}" id="tracking" name="tracking">
                {{ csrf_field() }}
          <div class="row">
              <div class="col">
                  <input type="text" name="tracking_id" required id="tracking_id" placeholder="MelloBridge Tracking Number">
              </div>
          </div>

          <div class="row">
              <div class="col">
                  <input type="submit" value="Track Package" class="small-btn">
              </div>
          </div>
          
      </form>
  </div>
  </div>

  <div class="bottom-img">
    <img src="{{ asset('site/assets/images/tracks.png') }}" alt=""/>
  </div>

</div>
@endsection
@push('custom-styles')
    <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
    <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush
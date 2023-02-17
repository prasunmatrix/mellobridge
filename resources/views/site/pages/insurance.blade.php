@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<div class="inner-wrapper extra-padding">
  <h1 class="align-center padding40">Insurance</h1>
  <h2 class="align-center padding40">Coming Soon </h2>
  <!-- How it section -->
  <div class="locate-area">
        <div class="row">

         {{-- <div class="col">
            <div class="img-area">
              <img src="{{ asset('site/assets/images/globe.png') }}" alt=""/>
            </div>
          </div>--}}


            <div class="col col-40">
             
              
              
             {{-- <p>Lorem ipsum dolor sit amet, 
                consectetur adipiscing elit. 
                Purus, aenean sapien pharetra 
                1234567890</p>
                
              <p> <strong>in interdum quis proin cras</strong> <br/>
                Nisl convallis amet, amet a, 
                euismod pulvinar integer adipiscing. 
                Urna tincidunt consectetur 
                1234567890</p>

                <p><strong>Lorem ipsum dolor sit amet, </strong><br/>
                  consectetur adipiscing elit. 
                  Purus, aenean sapien pharetra 
                  1234567890
                  </p>
                  
                <p> Mi in interdum quis proin cras
                  Nisl convallis amet, amet a, 
                  euismod pulvinar integer adipiscing. 
                  Urna tincidunt consectetur 
                  1234567890</p>--}}
                 
                
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
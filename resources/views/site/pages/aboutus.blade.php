@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<div class="inner-wrapper extra-padding">
  <!-- <h1 class="align-center padding40">Locations</h1>
  <h2 class="align-center padding40">Where can you find us?</h2> -->
  <!-- How it section -->
  <div class="locate-area">
        <div class="row">

          <div class="col">
            <div class="img-area">
              <img src="{{ asset('site/assets/images/about-img.png') }}" alt=""/>
            </div>
          </div>


            <div class="col col-40">
            <h1 class="align-left padding40">About Us</h1>
            {{ strip_tags($about->description) }} 
             {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Malesuada eget quis malesuada varius. Dictumst justo, a massa quis lacus nisl, felis pharetra. Volutpat ultricies imperdiet magna penatibus neque, id. Non iaculis imperdiet lorem tincidunt est vel. Sollicitudin sollicitudin purus eu pellentesque. Ut posuere netus vitae nisl aliquam ridiculus eget vitae. Turpis odio tincidunt placerat ultrices. Justo ornare vulputate vel aenean viverra pellentesque ante. Lorem scelerisque amet semper lectus sit feugiat purus. At egestas ut tincidunt elit. Gravida tempus, ornare nunc non eget curabitur auctor nibh. Tempor eu massa convallis tincidunt justo, egestas eget sed. Integer tortor tincidunt vitae a bibendum scelerisque. Ac purus, nisl eleifend adipiscing nullam donec facilisis pellentesque turpis. Vel tincidunt eu, fermentum, pretium sed cursus at.</p>  --}}
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
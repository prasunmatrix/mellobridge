@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<div class="inner-wrapper">
  <div class="banner-area inner-top-area howit-top">
    <h1>How it Works</h1>
    <p>Learn how Mellobridge can be your shipping alternative to the United States and Canada. Let us help you save money while you grow your business.</p>
  </div>


  <div class="howit-section">
    <div class="row">
      <div class="col">
        <img src="{{ asset('site/assets/images/Box with hands.png') }}" alt="">
      </div>
      <div class="col align-right">
        <p>
          Mellobridge is your shipping solution that provides access to low-cost postage through our easy-to-use platform
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <img src="{{ asset('site/assets/images/Plane.png') }}" alt="">
      </div>
      <div class="col">
        <p>
          We work closely with our partner carriers (Sia Cargo, USPS, etc.) who handle the delivery to your customers
        </p>
      </div>
    </div>
  </div>

  <!-- How it section -->

  <div class="how-it-totalwrapper">
    <div class="how-arrow arrow-1"><img src="{{ asset('site/assets/images/arrow-1.png') }}" alt=""/></div>
    <div class="how-arrow arrow-2"><img src="{{ asset('site/assets/images/arrow-2.png') }}" alt=""/></div>
    <div class="how-arrow arrow-3"><img src="{{ asset('site/assets/images/images/arrow-3.png') }}" alt=""/></div>
    <div class="how-arrow arrow-4"><img src="{{ asset('site/assets/images/arrow-4.png') }}" alt=""/></div>
    <div class="how-arrow arrow-5"><img src="{{ asset('site/assets/images/arrow-5.png') }}" alt=""/></div>

      <div class="how-it-wrapper">

      <div class="row">
        <div class="col">
            <div class="how-img"> <img src="{{ asset('site/assets/images/sell-products.png') }}" alt=""/> </div>
            <div class="how-txt"> 
                <p> Sell your<br/> products online </p>
            </div>
        </div>

        <div class="col">
            <div class="how-img"> <img src="{{ asset('site/assets/images/computer.png') }}" alt=""/> </div>
            <div class="how-txt"> 
                <p> Import your shipment by connecting your store to your Mellobridge account</p>
            </div>
        </div>

        <div class="col">
            <div class="how-img"> <img src="{{ asset('site/assets/images/postage.png') }}" alt=""/> </div>
            <div class="how-txt"> 
                <p> Buy and print postage from your Mellobridge account  </p>
            </div>
        </div>
    </div>
    </div>


      <div class="how-it-wrapper">
            <div class="row">
                <div class="col">
                    <div class="how-img"> <img src="{{ asset('site/assets/images/warehouse-img.png') }}" alt=""/> </div>
                    <div class="how-txt"> 
                        <p> Bring your parcel to a Mellobridge location</p>
                    </div>
                </div>

                <div class="col">
                    <div class="how-img"> <img src="{{ asset('site/assets/images/plane-img.png') }}" alt="" class="float-img"/> </div>
                    <div class="how-txt"> 
                        <p> Ship to the<br/> United States </p>
                    </div>
                </div>

                <div class="col">
                    <div class="how-img"> <img src="{{ asset('site/assets/images/usa-img.png') }}" alt=""/> </div>
                    <div class="how-txt"> 
                        <p> US shipping partners complete shipping </p>
                    </div>
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

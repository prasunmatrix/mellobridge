@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<div class="inner-wrapper">
  <div class="banner-area inner-top-area">
    <h1>Prohibited items & carrier restrictions</h1>
    <p>
      MelloBridge takes Customs compliance seriously. We want your packages to move smoothly and without delays, so please read, understand and comply with our rules and regulations.
    </p>
    
    <h2>U.S. Customs prohibited items</h2>
     <p>These rules apply to all U.S. and international shipments sent with MelloBridge</p> 
  </div>

  <!-- Shipments -->

  <div class="shipments extraship">
    <h2>Shipments cannot exceed <strong>USD $400</strong> </h2>
    <p>This means any package(s) being shipped to the same address on the same day cannot exceed a retail value of USD $400.</p>
  </div>

  <!-- Listing -->

  <ul class="listingarea">
    <li>
      <img src="{{ asset('site/assets/images/icon-im-1.png') }}" alt=""/>
      <span>Food and beverages</span>
      (including candy, tea, coffee)
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-2.png') }}" alt=""/>
      <span>Knockoffs </span> 
        (products that violate copyright laws)
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-3.png') }}" alt=""/>
      <span>Glasses/Eyewear </span>
      (prescription and non-prescription)
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-4.png') }}" alt=""/>
      <span>Plant matter </span>
      (including seeds)
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-5.png') }}" alt=""/>
      <span>Human remains </span>
      (including ashes and hair)
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-6.png') }}" alt=""/>
      <span>Animals</span>
    </li>

    <li>
      <img src="{{ asset('site/assets/images/icon-im-7.png') }}" alt=""/>
      <span>Medical </span>
      Devices
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-8.png') }}" alt=""/>
      <span>Medicine </span>
        (prescription and non-prescription)
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-9.png') }}" alt=""/>
      <span>Dietary</span>
      supplements
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-10.png') }}" alt=""/>
      <span>Cannabis,</span>
      narcotics or drugs of any kind
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-11.png') }}" alt=""/>
      <span>Firearms,</span>
      ammunition or weapons of any kind
    </li>
    <li>
      <img src="{{ asset('site/assets/images/icon-im-12.png') }}" alt=""/>
      <span>Chemicals,</span>
      hazardous materials or combustibles
    </li>
  </ul>

<!-- alert section -->

<div class="alert-section">
    <div class="alert-lft">
      <img src="{{ asset('site/assets/images/alert_icon.svg') }}" alt=""/>
      <p>
        Packages may be subject to random internal and external compliance checks. This process includes opening the packages to verify declared shipment information.
      </p>
    </div>
    <div class="alert-rgt">
      <h4>Items/products regulated by:</h4> 
      <ul>
        <li>U.S Food and Drug Administration (FDA)</li>
        <li>U.S. Department of Agriculture (USDA)</li>
        <li>U.S. Customs and Border Protection (US CBP)</li>
        <li>Consumer Product Safety Commission (CPSC)</li>
        <li>Transport Security Administration (TSA)</li>
      </ul>   
      
    </div>
</div>

<!-- botton text section -->
<div class="botton-txt-area">
  <p>The lists below are not exhaustive. For an overview of our policies on prohibited items please refer to Blue Bridge’ Shipment Compliance Declaration. Below are some common examples of the items belonging to the above categories:</p>

  <div class="txt-list">
    <ul>
      <li>Acne care products/treatments</li>
      <li>Alcohol</li>
      <li>Animal skeletons/carcasses</li>  
      <li>Animal supplements and </li> 
        <li>Anti-snoring jaw strap</li>
        <li>Ashes</li>
        <li>Cannabis</li>
        <li>Chemical aerosols</li>
        <li>Chemical paint lifters</li>
        <li>Chewing gum</li>
        <li>Dental devices/tools</li>
        <li>Dental floss</li>
        <li>Dental night guards</li>
        <li>Dermarollers</li>
        <li>Diabetes kits</li>
        <li>Dietary supplements (vitamins, minerals, herbs, amino acids etc)</li>
        <li>Drug paraphernalia</li>
        <li>Endangered animal furs/products</li>
        <li>Feminine hygiene products</li>
        <li>Firearms, ammunition and weapons/parts of any kind</li>
        <li>Food and beverages</li>
        <li>Food dye</li>
        <li>Flowers (fresh-cut, dried or preserved)</li>
        <li>Hair</li>
        <li>Hair dryers, curling irons and flat irons without gfci plug</li>
        <li>Hearing aids or hearing aid accessories</li>
        <li>Knockoffs/copyright violations</li>
        <li>Lead paint</li>
    </ul>

    <ul>
      <li>Lighters</li>
      <li>Lithium batteries</li>
      <li>Matches</li>
      <li>Medicine (prescription and non-prescription)</li>
      <li>Mouthwash</li>
      <li>Narcotics</li>
     <li> Nasal aspirators</li>
     <li> Pain relief/pain therapy items</li>
      <li>Pemf therapy devices</li>
      <li>Pregnancy tests</li>
      <li>Produce</li>
     <li> Products manufactured in restricted countries</li>
      <li>Products with safety issues/alerts</li>
      <li>Powered breast pump</li>
      <li>Seeds</li>
      <li>Sexual health products</li>
      <li>Spices and dried goods</li>
      <li>Sunlamp</li>
      <li>Sunscreen</li>
      <li>Taxidermy</li>
      <li>Teeth</li>
      <li>Tobacco</li>
      <li>Thermometers</li>
      <li>Toothbrushes</li>
      <li>Toothpaste</li>
     <li> UV sanitizer</li>
     <li> Vaporizers, e-cigarettes and other electronic nicotine delivery systems</li>
      <li>Whitestrips</li>
    </ul>
  </div>
  <p>Have questions or unsure if your product is compliant? Send us a message.</p>
</div>

</div>
@endsection
@push('custom-styles')
    <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
    <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush
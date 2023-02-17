@extends('site.layout.mellobridge')
@section('title', $page_title)
@section('content')
<div class="inner-wrapper extra-padding">
  <h1 class="align-center padding40">FAQ</h1>
  <h2 class="align-center padding40">These are the frequently asked questions for using our services</h2>
  <!-- How it section -->
  <div class="locate-area">
        <div class="row">
          <div class="col">
            <p><strong>Can ship with MelloBridge?</strong> </p>
            <p>Our mission is to help entrepreneurs live their dreams, any business owner can sign up and take advantage of our low postage rates. </p>


            <p><strong>What if I don't live near a MelloBridge location?</strong> </p>

            <p>If you are unable to visit a branch or drop spot to drop off your shipments, you have the option to mail in your shipments to any of our location.</p>


            <p><strong>Who are our partner carriers?</strong> </p>

<p>MelloBridge partners with different carriers to handle the delivery of your shipments to your customers in the United States. We work with multiple air cargo carriers to send your shipments to the US and then we clear the customs for you  and handle your parcels to USPS to complete the last part of the delivery. </p>


<p><strong>How do I print postage labels?</strong> </p>

<p>You can easily print postage labels from a regular desktop printer or set up a ZPL thermal printer. To print from a desktop printer simply select ‘Print Postage’ then 'Download' to generate a PDF file of the label which you can easily print off.</p>


<p><strong>Does MelloBridge offer insurance?</strong> </p>

<p>Yes, we offer a low-cost insurance for eligible shipments. Please select the insurance box while entering your shipment informations. </p>


<p><strong>Can I get a shipping quote?</strong> </p>

<p>Yes! To get a quick quote, use the shipping calculator found Home page Or you can also sign up for a free Mellobdridge account with no monthly fees to create test shipments and access live rates. All pricing is in USD and rates are subject to change.</p>


<p><strong>How do I pay for postage and other services?</strong> </p>

<p>Credits are used to pay for all postage and services from MelloBridge. You can add credits to your account easily and no additional service charges apply. We accept credit and debit cards from American Express, Mastercard or Visa and some prepaid credit cards.</p>


<p><strong>Do I need to submit a manifest or customs paperwork like a CN22?</strong> </p>

<p>No, all the details necessary for customs are automatically pulled from the descriptions you enter when creating shipments. For this reason, it’s important to be detailed and accurate when describing what you are shipping and entering the value. For example: "2 t-shirts" rather than “clothes".</p>


<p><strong>When is an invoice mandatory for my shipments?</strong> </p>

<p>An invoice must be provided for all shipments with a retail value of USD $300 or more, destined for Amazon FBA or containing any item with a market value that is difficult to verify such as a collectible or gift. Ensure you attach an invoice to the outside of your package in these cases.</p>


<p><strong>What can I ship with MelloBridge?</strong> </p>

<p>There are some items that we cannot ship based on their destination or value. For example, we cannot accept U.S. and international shipments greater than USD $800 in retail value. Additionally, some items that we cannot ship across the U.S. border are alcohol, chocolate and weapons. </p>


<p><strong>Will my shipments have tracking?</strong> </p>

<p>Most postage on MelloBridge includes full tracking with delivery confirmation however exceptions based on destination apply. If you need tracking for letters or flat envelopes under 1 lb, make sure to select Thick Envelope for your package type.</p>


<p><strong>Does MelloBridge provide a U.S. return address?</strong> </p>

<p>MelloBridge offers a U.S. address for the sole purpose of returns i.e. undeliverable shipments (returned to sender) or customer returns. </p>


<p><strong>Are there fees for returned shipments?</strong> </p>

<p>Yes, return fees apply for any return shipments we process.</p>


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
@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
<style>
  .error{ color:red; } 
</style>
<section class="main-container">
  <!-- left menu start -->
  @include('frontenduser.elements.leftmenu')
  <!-- left menu end -->
  <!-- right content start -->
  <div class="right-content">
    <div class="user-notification">
        <div class="notification">
          <a href="#">
          <img src="{{ asset('frontenduser/assets/images/icon-notification.png') }}" alt="">
          <span class="circle"></span>
          </a>  
        </div>
        <div class="user dropdown" data-id="client">
          <div class="icon-user"></div>
          <div class="user-name">
              <div class="title">Name_input</div>
              <div class="client-id">ClientID_input</div>
          </div>
          <div class="icon-arrow"></div>
          <div class="dropdown-menu" id="client">
              <a href="#" class="dropdown-item">
              <i class="fa fa-envelope"></i> 4 New Messages            
              </a>
              <a href="#" class="dropdown-item">
              <i class="fa fa-user"></i>  8 Friend Requests
              </a>
              <a href="#" class="dropdown-item">
              <i class="fa fa-power-off"></i>  Log Out
              </a>
          </div>
        </div>
    </div>
    <div class="shipment-summary">
        <h2>Shipment Summary</h2>
        <div class="row summary-box">
          <div class="col">
              <div class="box">
                <div class="title">In Transit</div>
                <div class="number">3</div>
                <a href="#" class="btn-view">View all</a>
              </div>
          </div>
          <div class="col">
              <div class="box">
                <div class="title">Pending</div>
                <div class="number">10</div>
                <a href="#" class="btn-view">View all</a>
              </div>
          </div>
          <div class="col">
              <div class="box">
                <div class="title">Returns</div>
                <div class="number">0</div>
                <a href="#" class="btn-view">View all</a>
              </div>
          </div>
        </div>
    </div>
    <div class="credits">
        <h2>Credits</h2>
        <div class="row credits-box">
          <div class="col">
              <div class="box">
                <div class="row">
                    <div class="col-50">
                      <div class="title">Available</div>
                      <div class="price">$0.00</div>
                    </div>
                    <div class="col-50">
                      <div class="title">Unpaid</div>
                      <div class="price unpaid">$0.00</div>
                    </div>
                </div>
                <a href="#" class="btn-xl btn-purple block">Add Credits</a>
              </div>
          </div>
        </div>
    </div>
  </div>
  <!-- right content end -->
</section>
<div id="popup1" class="mello-overlay">
  <div class="mello-popup">
    <div class="content">
      <!-- create shipment start -->
      <section class="create-shipment">
          <a class="close" onclick="popupClose('pop1')" href="javascript:void(0)">&times;</a>
          <div class="list-item">
            <ul>
                <li class="active"><a href="#">Recipient</a></li>
                <li><a href="#">Description</a></li>
                <li><a href="#">Package</a></li>
                <li><a href="#">Postage</a></li>
            </ul>
          </div>
          <h3>Recipient Details</h3>
          <form method="post" action="" id="recipient">
            <input type="hidden" value="<?=csrf_token()?>" name="_token">
            <div class="row">
                <div class="col">
                  <input type="text" name="recipient_name" id="recipient_name" placeholder="Recipient name*" value="{{old('recipient_name')}}">                  
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <input type="text" name="address_line_1" id="address_line_1" placeholder="Address line 1*">
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <input type="text" name="address_line_2" id="address_line_2" placeholder="Address line 2 (optional)">
                  <div class="sm-txt">(Apartment, suite, unit, building, floor, etc.)</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <input type="text" name="city" id="ciry" placeholder="City*" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <select name="country" id="country" onchange="selectState(this.value)">
                      <option value="">Country*</option>
                      @if(!empty($countryList))
                        @foreach ($countryList as $country)
                          <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                      @endif  
                  </select>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                  <select name="state" id="state">
                      <option value="">State*</option>
                  </select>
                </div>
                <div class="col-50">
                  <input type="text" name="postal_code" id="postal_code" placeholder="Postal Code*" />
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                  <input type="tel" name="mobile_number" id="mobile_number" value="{{ $userPhone }}" placeholder="Phone Number*" >
                </div>
                <!-- <div class="col-50">
                  <input type="email" name="" placeholder="Email*">
                </div> -->
            </div>
            <div class="btn-wrap">
                <!-- <input type="submit" name="" value="Save and Continue" class="btn-purple"> -->
                <button type="submit" id="send_form1" class="btn-purple">Save and Continue</button>
            </div>
          </form>
      </section>
      <!-- create shipment end -->
    </div>
  </div>
</div>
<div id="popup2" class="mello-overlay">
  <div class="mello-popup">
    <div class="content">
      <!-- create shipment start -->
      <section class="create-shipment">
          <a class="close" onclick="popupClose('pop2')" href="javascript:void(0)">&times;</a>
          <button class="close"></button> 
          <div class="list-item">
            <ul>
                <li><a href="#">Recipient</a></li>
                <li class="active"><a href="#">Description</a></li>
                <li><a href="#">Package</a></li>
                <li><a href="#">Postage</a></li>
            </ul>
          </div>
          <h3>What are you shipping?</h3>
          <form method="post" action="" id="description">
            <input type="hidden" value="<?=csrf_token()?>" name="_token">
            <div class="row">
                <div class="col">
                <select name="merchandise" id="merchandise">
                  <option value="">Merchandise*</option>
                  <option value="Book">Book</option>
                  <option value="Germents">Germents</option>
                  <option value="Medicine">Medicine</option>
                </select>                  
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <input type="text" name="description_of_contents" id="description_of_contents" placeholder="Description of Contents*">
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                  <input type="text" name="retail_value" id="retail_value" placeholder="Retails Value*">
                  <div class="sm-txt">(US$400 limit.need more)</div>
                </div>
                <div class="col-50">
                  <select name="currency" id="currency">
                    <option value="">Currency*</option>
                    <option value="USD">USD</option>
                    <option value="CAD">CAD</option>
                  </select>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                  <input type="tel" name="order_ID" id="order_ID"  placeholder="Order ID (optional)" >
                </div>
            </div>
            <div class="btn-wrap">
                <!-- <input type="submit" name="" value="Save and Continue" class="btn-purple"> -->
                <button type="submit" id="send_form2" class="btn-purple">Save and Continue</button>
            </div>
          </form>
      </section>
      <!-- create shipment end -->
    </div>
  </div>
</div>
<div id="popup3" class="mello-overlay">
  <div class="mello-popup">
    <div class="content">
      <!-- create shipment Package start -->
      <section class="create-shipment create-packeges">
        <a class="close" onclick="popupClose('pop3')" href="javascript:void(0)">&times;</a>
          <div class="list-item">
              <ul>
                <li><a href="#">Recipient</a></li>
                <li><a href="#">Description</a></li>
                <li class="active"><a href="#">Package</a></li>
                <li><a href="#">Postage</a></li>
              </ul>
          </div>
          <h3>Package type</h3>
          <form method="post" action="" id="package">
            <div class="packeges-area col-80">
              <div class="row">
                <div class="col col-20">
                    <img src="{{ asset('frontenduser/assets/images/icon-1.png') }}" alt="">
                </div>
                <div class="col col-80">
                    <label class="custom-checkbox"><span>Letter</span>  Small envelopes, greeting cards, postcards, bills, specialty stationery, legal documents.
                      <input type="radio" name="package_type" checked="checked" value="Flat" />
                      <span class="checkmark"></span>
                    </label>
                </div>
              </div>
              <div class="row">
                <div class="col col-20">
                    <img src="{{ asset('frontenduser/assets/images/icon-2.png') }}" alt="">
                </div>
                <div class="col col-80">
                    <label class="custom-checkbox"><span>Flat Envelope</span> Large, flexible/bendable, rectangular envelopes under 2 cm (3/4") thick and max 38 x 30 cm (15" x 12").<br/>
                      <label class="colortxt">Carriers typically only accept documents.</label>
                      <input type="radio" name="package_type" value="FlatRateEnvelope">
                      <span class="checkmark"></span>
                    </label>
                </div>
              </div>
              <div class="row">
                <div class="col col-20">
                    <img src="{{ asset('frontenduser/assets/images/icon-3.png') }}" alt="">
                </div>
                <div class="col col-80">
                    <label class="custom-checkbox"><span>Thick Envelope</span>  Bubble-mailers and other large, padded envelopes and sleeves.
                      <input type="radio" name="package_type" value="PaddedFlatRateEnvelope">
                      <span class="checkmark"></span>
                    </label>
                </div>
              </div>
              <div class="row">
                <div class="col col-20">
                    <img src="{{ asset('frontenduser/assets/images/icon-4.png') }}" alt="">
                </div>
                <div class="col col-80">
                    <label class="custom-checkbox"><span>Parcel</span>  Small packages, tube or roll.<br/>
                      <label class="colortxt">Carrier only accepts parcels under 2 kg</label><br/>
                      <label class="colortxt">Max size is L + W + H ≤ 60 cm (23 in)</label>
                      <input type="radio"  name="package_type" value="Parcel">
                      <span class="checkmark"></span>
                    </label>
                </div>
              </div>
            </div>
            <div class="total-form row">
              <div class="col col-30">
                <h6>Weight <span>*</span></h6>
                <div class="row">
                  <div class="col-50">
                      <input type="text" name="weight" id="weight" placeholder="Weight">
                  </div>
                  <div class="col-50">
                    <select name="unit" id="unit" required value="{{old('unit')}}">
                      <option value="">Unit</option>
                      <option value="oz">oz</option>
                      <option value="lb">lb</option>
                    </select>                      
                  </div>
                  <div class="col">
                      <label class="colortxt">*Maximum weight is 2kg</label>
                  </div>
                </div>
              </div>
              <div class="col col-70">
                <h6>Size <span>*</span></h6>
                <div class="row">
                    <div class="col col-25">
                      <input type="text" name="length" id="length" placeholder="Length">
                    </div>
                    <div class="col col-25">
                      <input type="text" name="width" id="width" placeholder="Width">
                    </div>
                    <div class="col col-25">
                      <input type="text" name="height" id="height" placeholder="Height">
                    </div>
                    <div class="col col-25">
                      <select name="dimension_unit" id="dimension_unit">
                        <option value="">Dimensions Unit</option>
                        <option value="cm">cm</option>
                        <option value="in">in</option>
                        <option value="ft">ft</option>
                        <option value="mm">mm</option>
                        <option value="m">m</option>
                      </select>
                    </div>
                    <div class="col">
                      <label class="colortxt">*Maximum size is L + W + H ≤ 60 cm (23 in)</label>
                    </div>
                </div>
              </div>
            </div>
            <div class="btn-wrap">
              <a href="" class="btn-purple btn-gray">Back</a>
              <!-- <input type="submit" name="send_form3" value="Save and Continue" class="btn-purple"> -->
              <button type="submit" id="send_form3" class="btn-purple">Save and Continue</button>
            </div>
          </form>           
      </section>
      <!-- create shipment end -->
    </div>
  </div>
</div>
<div id="popup4" class="mello-overlay">
  <div class="mello-popup">
    <div class="content">
      <!-- create shipment postage start -->
      <section class="create-shipment create-packeges">
        <a class="close" onclick="popupClose('pop4')" href="javascript:void(0)">&times;</a>
          <div class="list-item">
              <ul>
                <li><a href="#">Recipient</a></li>
                <li><a href="#">Description</a></li>
                <li><a href="#">Package</a></li>
                <li class="active"><a href="#">Postage</a></li>
              </ul>
          </div>
          <form method="post" action="" id="postage">
            <div class="postage-area">
              <h3>Do you require signature confirmation?</h3>
              <p>Selecting this may limit your postage options. Availability dependent on packaging, service level and destination. Additional costs may apply.
              </p>
              <label class="custom-checkbox custom-checkbox2">Yes, I want signature confirmation
                  <input type="checkbox"  name="signature" id="signature_price" value="1">
                  <span class="checkmark"></span>
              </label>
            </div>
            <div class="postage-area">
                <h3>Ship date</h3>
                <p>This is the date MelloBridge is going to receive your shipment. </p>
                <div class="row">
                    <div class="col">
                      <!-- <select>
                          <option>April 17, 2022</option>
                      </select> -->
                      <input type="text" name="ship_date" id="ship_date" placeholder="Ship Date" />
                    </div>
                </div>
            </div>
            <div class="postage-area">
                <h3>Postage Rates</h3>
                <div class="postage-box">
                    <div class="row">
                        <div class="col col-80">
                        <label class="custom-checkbox">
                          <span class="bold-txt"><img src="{{ asset('frontenduser/assets/images/flag.png') }}"/> U.S. Tracked</span>  Full tracking included, 5-15 estimated business days * 
                            <input type="radio"  name="radio">
                            <!-- <span class="checkmark"></span> -->
                            </label>
                        </div>
                        <div class="col col-20">
                            <span class="price bold-txt" id="ib_return_client_profit1"></span>
                        </div>
                    </div>
                </div>
                <p>* Delivery times are estimated. Due to COVID-19, expect delays.</p>
            </div>
            <div class="postage-area">
              <h3>MelloBridge Insurance</h3>
              <p>Discounted insurance covers your shipment from any loss or damage upon receipt by MelloBridge <a href="#">Is your item eligible?</a>
              </p>
              <label class="custom-checkbox custom-checkbox2">Yes, I want MelloBridge Insurance
                  <input type="checkbox"  name="insurance" id="insurance_checkbox" value="1" />
                  <span class="checkmark"></span>
              </label>
            </div>
            <div class="postage-area">
              <h3>Summary</h3>
              <div class="postage-box summery-area">
                  <div class="row">
                      <div class="col col-80">
                          <p>MelloBridge U.S. Tracked </p>
                      </div>
                      <div class="col col-20">
                          <span class="price" name="ib_return_client_profit2" id="ib_return_client_profit2"></span>
                      </div>
                      <div id="insurance_div" class="row" style="width: 100%;">
                        <div class="col col-80">
                            <p>MelloBridge Insurance </p>
                        </div>
                        <div class="col col-20">
                            <span class="price" name="insurancePrice" id="insurancePrice"></span>
                        </div>
                      </div>
                  </div>
                  <div class="row total-price">
                      <div class="col col-80">
                          <p>Total </p>
                      </div>
                      <div class="col col-20">
                          <span class="price" name="totla_price" id="totla_price"></span>
                      </div>
                  </div>
              </div>
            </div>
            <div class="btn-wrap full-width">
              <a href="" class="btn-purple btn-gray">Back</a>
              <!-- <input type="submit" name="" value="Save" class="btn-purple"> -->
              <button type="submit" id="send_form4" class="btn-purple">Save</button>
              <a href="" class="btn-purple btn-sky">Go to Add Credits</a>
            </div>
          </form>
      </section>
      <!-- create shipment postage end -->
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
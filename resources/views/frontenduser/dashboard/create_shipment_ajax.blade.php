<style>
  input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance:textfield;
}
#cover-spin {
    position: fixed;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.7);
    z-index: 9999;
    display: none;
  }
  #cover-spin-post {
    position: fixed;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.7);
    z-index: 9999;
    display: none;
  }

  @-webkit-keyframes spin {
    from {
      -webkit-transform: rotate(0deg);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(360deg);
    }
  }

  #cover-spin::after {
    content: '';
    display: block;
    position: absolute;
    left: 48%;
    top: 40%;
    width: 40px;
    height: 40px;
    border-style: solid;
    border-color: black;
    border-top-color: transparent;
    border-width: 4px;
    border-radius: 50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
  }
  #cover-spin-post::after {
    content: '';
    display: block;
    position: absolute;
    left: 48%;
    top: 40%;
    width: 40px;
    height: 40px;
    border-style: solid;
    border-color: black;
    border-top-color: transparent;
    border-width: 4px;
    border-radius: 50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
  }
}
.test{
    height:200px;
    width:200px;
}
.mello-popup-new h4{font-weight: 500; font-size: 20px; line-height: 24px; color: #000;}
.mello-popup-new h3{font-weight: 700; font-size: 20px; line-height: 24px; color: #000; padding-bottom: 20px;}
.mello-popup-new .table-responsive{border: solid 1px #ADADAD; border-radius: 10px; padding: 5px 20px;}
.mello-popup-new table{border-collapse: collapse; }
.mello-popup-new table tr td{border-bottom: 1px solid #ADADAD; padding: 15px 10px; font-weight: 400; font-size: 16px; line-height: 19px; color: #000;}
.mello-popup-new table tr:last-child td{border:none;}
.mello-popup-new table a{font-weight: 600;font-size: 16px;line-height: 12px;color: #5E47D2; display: block; text-align: right;}
.popup-btn-sec a{background: #5E47D2; padding: 10px 30px; border-radius: 10px; font-weight: 500; font-size: 14px; line-height: 17px; margin-left: 8px; display: inline-block; color: #fff;}
.popup-btn-sec{padding: 100px 0 0 0;  display: flex;  align-items: center;  justify-content: flex-end;}
.popup-btn-sec a:hover{background: #000;}
.mello-popup-new table td img{width: 22px; height: 12px; margin-right: 8px;}

@media screen and (max-width:600px) {
.popup-btn-sec{padding: 40px 0 0 0;}
.mello-popup-new table tr td{padding: 10px 5px; font-size: 14px;}
.mello-popup-new table a{font-size: 14px;}
.mello-popup-new table{width: 420px !important;}
}


</style>
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
            
          <meta name="csrf-token" content="{{csrf_token()}}" />
          <input type="hidden" name="shipid" id="shipid">
            <div class="row">
                <div class="col">
                  <input type="text" name="recipient_name" id="recipient_name" placeholder="Recipient name*" value="">                  
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
                  <input type="tel" name="mobile_number" id="mobile_number"  placeholder="Phone Number" >
                </div>
                <!-- <div class="col-50">
                  <input type="email" name="" placeholder="Email*">
                </div> -->
            </div>
            <div id="cover-spin"></div>
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
<div id="addresspopup1" class="mello-overlay">
  <div class="mello-popup">
    <div class="content">
      <!-- create shipment start -->
      <section class="create-shipment s-address">
          <a class="close" onclick="popupClose('pop1')" href="javascript:void(0)">&times;</a>
          <div class="list-item">
            <ul>
                <li class="active"><a href="#">Recipient</a></li>
                <li><a href="#">Description</a></li>
                <li><a href="#">Package</a></li>
                <li><a href="#">Postage</a></li>
            </ul>
          </div>
          <h3>Confirm Shipping Address</h3>
          <p class="addspace">We found a similar address in our database. Please ensure that your recipient’s address is correct.</p>

          <form method="post" action="" id="recipient">
         
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <div class="container edit-address">
          <div class="row">
          <div class="col col-50">
              <h4> You entered:</h4>
                 <p id="line1"></p>
                 <p id="city"></p>    
                 <a href="javascript:void(0)" onclick="poupCloseOpen('addresspop2')" class="btn-purple ">Edit</a>  
                 <a href="javascript:void(0)" onclick="poupCloseOpen('pop3')" class="btn-purple">Keep Address</a>  
</div>  
<div class="errorText" id= "errormsg"style="display:none;"></div>
<div class="col col-50" >
<h4  id ="suggestedAdress"style="display:none;"> Suggested Address:</h4>
                 <p id="suggestedline1"></p>
                 <p id="suggestedcity"></p>  
                 <p id =suggestbutton></p>
                 
</div>
</div> 
</div>
                  <p id="addressfound" style="display:none;">If you are sure you entered the correct address you can  <a href="javascript:void(0)" onclick="poupCloseOpen('pop3')" class="btn-purple ">Save & Continue </a> </p>
                  
                   
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
            
          <meta name="csrf-token" content="{{ csrf_token() }}" />
          <input type="hidden" name="shipid1" id="shipid1">
            <div class="row">
                <div class="col">
                <select name="merchandise" id="merchandise">
                  <option value="">Package content*</option>
                  <option value="Merchandise">Merchandise</option>
                  <option value="Documents">Documents</option>
                  <option value="Sample">Sample</option>
                  <option value="Gift and other">Gift and other</option>
                </select>                  
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <input type="text" name="description_of_contents" id="description_of_contents" placeholder="Description of Contents*">
                  <label>For example: 3 Cotton Shirts</label><br>
                  <a href="prohibited-items" target="_blank">Please check prohibited items</a>
                </div>
                
            </div>
            <div class="row">
                <div class="col-50">
                  <input type="text" name="retail_value" id="retail_value" placeholder="Retail Value*">
                  <div class="sm-txt">(US$400 limit.need more)</div>
                </div>
                <div class="col-50">
                  <select name="currency" id="currency">
                    <option value="">Currency*</option>
                    <option value="USD">USD</option>
                  </select>
                </div>
            </div>
            <div class="row">
                <div class="col-50">
                  <input type="tel" name="order_ID" id="order_ID"  placeholder="Order ID (optional)" >
                </div>
            </div>
            <div class="btn-wrap">
              <a href="javascript:void(0)" onclick="poupCloseOpen('pop2')" class="btn-purple btn-gray">Back</a>
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
          <input type="hidden" name="shipid2" id="shipid2">
          <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="packeges-area col-80">
              {{--<div class="row">
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
              </div>--}}
              <div class="row">
                <div class="col col-20">
                    <img src="{{ asset('frontenduser/assets/images/icon-3.png') }}" alt="">
                </div>
                <div class="col col-80">
                    <label class="custom-checkbox"><span>Thick Envelope</span>  Bubble-mailers and other large, padded envelopes and sleeves.
                      <input type="radio" name="package_type" id="shape" value="FlatRateEnvelope">
                      <span class="checkmark"></span>
                    </label>
                </div>
              </div>
              <div class="row">
                <div class="col col-20">
                    <img src="{{ asset('frontenduser/assets/images/icon-4.png') }}" alt="">
                </div>
                <div class="col col-80">
                    <label class="custom-checkbox"><span>Parcel</span>Flexible packaging recommended. Small packages or tubes.<br/>
                      <label class="colortxt">Carrier only accepts parcels under 2 kg(70.55 oz)</label><br/>
                      <label class="colortxt">Max size is L + W + H ≤ 80 cm (31.5 in)</label>
                      <input type="radio"  name="package_type" id="shape" value="Parcel">
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
                      <input type="text" name="weight" id="weight" min="1" onkeypress="return validateFloatKeyPress(this,event);" placeholder="Weight">
                  </div>
                  <div class="col-50">
                    <select name="unit" id="unit"  required value="{{old('unit')}}">
                      <option value="">Unit</option>
                      <option value="oz">Ounces</option>
                      <option value="g">Grams</option>
                    </select>                      
                  </div>
                 
                  <div class="col">
                      <label class="colortxt">*Maximum weight is 2kg (70.55oz)</label>
                  </div>
                </div>
              </div>
              <div class="col col-70">
                <h6>Size <span>*</span></h6>
                <div class="row">
                    <div class="col col-25">
                      <input type="text" name="length" id="length" onkeypress="return validateFloatKeyPress(this,event);" placeholder="Length">
                    </div>
                    <div class="col col-25">
                      <input type="text" name="width" id="width" onkeypress="return validateFloatKeyPress(this,event);" placeholder="Width">
                    </div>
                    <div class="col col-25">
                      <input type="text" name="height" id="height" onkeypress="return validateFloatKeyPress(this,event);"  placeholder="Height">
                    </div>
                    <div class="col col-25">
                      <select name="dimension_unit" id="dimension_unit">
                        <option value="">Unit</option>
                        <option value="cm">cm</option>
                        <option value="in">inch</option>
                      </select>
                    </div>
                    <div class="col">
                      <label class="colortxt">*Maximum size is L + W + H ≤ 80 cm (31.5 in)</label>
                    </div>
                </div>
              </div>
            </div>
            <span class="weighterr error" id ="weighterr"style="color: red;"></span>
            {{--<span class="dimensionterr error" id ="dimensionerr"style="color: red;"></span>--}}
            <div class="btn-wrap">
              <a href="javascript:void(0)" onclick="poupCloseOpen('pop3')" class="btn-purple btn-gray">Back</a>
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
          <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                      <input type="text" name="ship_date" id="ship_date" readonly placeholder="Ship Date" />
                    </div>
                </div>
            </div>
            <div class="postage-area">
                <h3>Postage Rates</h3>
                <div class="postage-box">
                    <div class="row">
                        <div class="col col-80">
                        <label class="custom-checkbox">
                          <span class="bold-txt"><img src="{{ asset('frontenduser/assets/images/flag.png') }}"/> U.S. Tracked</span>  Full tracking included, 4-10 estimated business days * {{--<p id="mailclass"></p> --}}
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
              <p>Discounted insurance covers your shipment from any loss or damage upon receipt by MelloBridge <a href="{{ url('/insurance') }}" target="_blank">Is your item eligible?</a>
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
            <div id="cover-spin-post"></div>
            <div class="btn-wrap full-width">
              <a href="javascript:void(0)" onclick="poupCloseOpen('pop4')" class="btn-purple btn-gray">Back</a>
              <!-- <input type="submit" name="" value="Save" class="btn-purple"> -->
              <button type="submit" id="send_form4" name="submit" value="save"class="btn-purple">Save</button>
              <button type="submit" id="send_form4" name="submit" value="pay" class="btn-purple">Pay for shipment</button>
              <a href="{{url('/add-credits')}}" class="btn-purple btn-sky">Go to Add Credits</a>
            </div>
           
          </form>
      </section>
      <!-- create shipment postage end -->
    </div>
  </div>
</div>
<!--import shipmet ajax -->
<div id="import_shipment" class="mello-overlay">
  <div class="mello-popup">
    <div class="content">
      <!-- create shipment start -->
      <section class="create-shipmentimport">
          <a class="close" onclick="popupClose('pop5')" href="javascript:void(0)">&times;</a>
          <form  id="shipment_import_form" enctype="multipart/form-data">
          
          <div class="list-item">
            <ul>
                <li><a href="#">Import Your Shipment</a></li>
                
            </ul>
          </div>
                  <div class="alert alert-danger" id="error_block" role="alert" style="display:none;">
                    </div>
                    <div class="alert alert-success" id="success_block" role="alert" style="display:none;">
                    </div>

                 <h3>Import File</h3>
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <div class="form-group row">
                <div class="col">
                  <input type="file" name="import_file" id="import_file" placeholder="Recipient name*" value="{{old('recipient_name')}}">                  
                </div>
                <div class="help-block"></div>
            </div>
                   
                   

               </br>
            <a href="{{asset('assets/files/import_shipment.xlsx')}}" download class="alert-link">Click here to download demo file!</a>

            
            <div class="btn-wrap">
                <!-- <input type="submit" name="" value="Save and Continue" class="btn-purple"> -->
                <button type="submit" id="btnSumbit" class="btn-purple">Upload</button>
            </div>
            <div id="cover-spin"></div>
          </form>
      </section>
    
    </div>
  </div>
</div>
      <!--add credit start -->
      <div id="credit-button" class="mello-overlay">
  <div class="mello-popup">
    <div class="content">
      <section class="create-shipmentimport">
          <a class="close" onclick="popupClose('pop5')" href="javascript:void(0)">&times;</a>
          <form  id="paymentForm" enctype="multipart/form-data">
          
          <div class="list-item">
            <ul>
                <li><a href="#">Add your wallet amount</a></li>
                
            </ul>
          </div>
                  <div class="alert alert-danger" id="error_block" role="alert" style="display:none;">
                    </div>
                    <div class="alert alert-success" id="success_block" role="alert" style="display:none;">
                    </div>

                 <h3>Amount</h3>
                  <meta name="csrf-token" content="{{ csrf_token() }}" />
                  <div class="form-group row">
                <div class="col">
                  <input type="text" placeholder="Amount*" name="amount" id="amount">                  
                </div>
               
              {{--  <div class="col-50">
                <input type="text" data-stripe="exp-month" placeholder="Expiry Month" />
                </div>
                <div class="col-50">
                  <input type="text"  data-stripe="exp-year" placeholder="Expiry Year" />
                
            </div>--}}
                <div class="help-block"></div>
            </div>
                   
                   

               </br>
            

            
            <div class="btn-wrap">
                <!-- <input type="submit" name="" value="Save and Continue" class="btn-purple"> -->
                <button type="submit" id="btnSumbit" class="btn-purple">Make Payment</button>
            </div>
            <div id="cover-spin"></div>
          </form>
      </section>
    
    </div>
  </div>
</div>

<!--<script src="https://js.stripe.com/v2/"></script>
<script src="//oss.maxcdn.com/bootbox/4.2.0/bootbox.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    Stripe.setPublishableKey('pk_test_51LAFvxLVtcUCLVBcdzDKzbf69k1DtKrt6zNMZuFD7bFJsITAyPpKHzPCAijrObpGufVPcRQFTLV50qBdNQhD6xqM00FSTw2ceI');
    $('#paymentForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                
                ccNumber: {
                    selector: '[data-stripe="number"]',
                    validators: {
                        notEmpty: {
                            message: 'The credit card number is required'
                        },
                        creditCard: {
                            message: 'The credit card number is not valid'
                        }
                    }
                },
                expMonth: {
                    selector: '[data-stripe="exp-month"]',
                    row: '.col-xs-3',
                    validators: {
                        notEmpty: {
                            message: 'The expiration month is required'
                        },
                        digits: {
                            message: 'The expiration month can contain digits only'
                        },
                        callback: {
                            message: 'Expired',
                            callback: function(value, validator) {
                                value = parseInt(value, 10);
                                var year         = validator.getFieldElements('expYear').val(),
                                    currentMonth = new Date().getMonth() + 1,
                                    currentYear  = new Date().getFullYear();
                                if (value < 0 || value > 12) {
                                    return false;
                                }
                                if (year == '') {
                                    return true;
                                }
                                year = parseInt(year, 10);
                                if (year > currentYear || (year == currentYear && value >= currentMonth)) {
                                    validator.updateStatus('expYear', 'VALID');
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                },
                expYear: {
                    selector: '[data-stripe="exp-year"]',
                    row: '.col-xs-3',
                    validators: {
                        notEmpty: {
                            message: 'The expiration year is required'
                        },
                        digits: {
                            message: 'The expiration year can contain digits only'
                        },
                        callback: {
                            message: 'Expired',
                            callback: function(value, validator) {
                                value = parseInt(value, 10);
                                var month        = validator.getFieldElements('expMonth').val(),
                                    currentMonth = new Date().getMonth() + 1,
                                    currentYear  = new Date().getFullYear();
                                if (value < currentYear || value > currentYear + 100) {
                                    return false;
                                }
                                if (month == '') {
                                    return false;
                                }
                                month = parseInt(month, 10);
                                if (value > currentYear || (value == currentYear && month >= currentMonth)) {
                                    validator.updateStatus('expMonth', 'VALID');
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                    }
                },
                cvvNumber: {
                    selector: '[data-stripe="cvc"]',
                    validators: {
                        notEmpty: {
                            message: 'The CVV number is required'
                        },
                        cvv: {
                            message: 'The value is not a valid CVV',
                            creditCardField: 'ccNumber'
                        }
                    }
                }
            }
        })
      
});

</script>-->
<script>
  function validateFloatKeyPress(el, evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    var number = el.value.split('.');
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    //just one dot
    if(number.length>1 && charCode == 46){
         return false;
    }
    //get the carat position
    var caratPos = getSelectionStart(el);
    var dotPos = el.value.indexOf(".");
    if( caratPos > dotPos && dotPos>-1 && (number[1].length > 1)){
        return false;
    }
    return true;
}

//thanks: http://javascript.nwbox.com/cursor_position/
function getSelectionStart(o) {
	if (o.createTextRange) {
		var r = document.selection.createRange().duplicate()
		r.moveEnd('character', o.value.length)
		if (r.text == '') return o.value.length
		return o.value.lastIndexOf(r.text)
	} else return o.selectionStart
}
</script>
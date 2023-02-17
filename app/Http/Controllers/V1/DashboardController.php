<?php
namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{MasterCountry,Masterstate,Mastershipment};
use Redirect;
use Validator;
use Response;
use Auth;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use Config;
use Session;
use DB;
use App\Models\Masternotification;
class DashboardController extends Controller
{
  public function index(){
    $page_title ='Dashboard';
    $countryList = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
    // $notificationList = Masternotification::where('is_deleted', 'N')->orderBy('id','desc')->get();
    $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
    $userId=Auth::guard('frontenduser')->user()->id;
    $TotalIntransitdata = DB::table('shipments')->where('is_deleted', 'N')->where('is_import', 'N')->whereIn('status_code', [81,82])->where('user_id',$userId)->orderBy('id','desc')->count();
    $TotalPendingdata = DB::table('shipments')->where('is_deleted', 'N')->where('is_import', 'N')->where('is_pending', 'Y')->where('user_id',$userId)->orderBy('id','desc')->count();
    $userPhone=Auth::guard('frontenduser')->user()->phone;
    return view('frontenduser.dashboard.dashboard')
    ->with('page_title',$page_title)
    ->with('countryList',$countryList)
    ->with('totalintransit',$TotalIntransitdata)
    ->with('totalpending',$TotalPendingdata)
    ->with('userPhone',$userPhone)
    ->with('notificationList',$notificationList);       
  }
  //add credit view pagw
  public function add_credit(){
    $page_title ='Credit & Billing';
    $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
    $userPhone=Auth::guard('frontenduser')->user()->phone;
    return view('frontenduser.setting.credit')
    ->with('page_title',$page_title)
    ->with('userPhone',$userPhone)   
    ->with('notificationList',$notificationList); 
  }
  public function getStates(Request $request){
    if($request->country) {
      $states = Masterstate::where('country_id','=',$request->country)->where('is_deleted','N')->orderBy('name')->pluck('name','id');
      return json_encode($states);
  } else {
      return json_encode([]);
  }
  }
  public function createShipment(Request $request){
    //dd($request->all());
    if(!empty($request->shipid)){
      Session::put('shipid', $request->shipid);
    }else{
      Session::put('shipid', '');
    }

    $recipient=Session::put('recipient', $request->all());
    //dd(Session::get('recipient')['mobile_number']);
    
    Session::save();
    $address_line_1=Session::get('recipient')['address_line_1'];
    $address_line_2=Session::get('recipient')['address_line_2'];
    $city=Session::get('recipient')['city'];
    $country=Session::get('recipient')['country'];
    $MasterCountry = MasterCountry::where('id','=',$country)->first();
    $countryname = $MasterCountry->country_name; 
    $countryCode = substr($MasterCountry->country_name, 0, 2);
    $postal_code=Session::get('recipient')['postal_code'];
    $state=Session::get('recipient')['state'];
    $Masterstate = Masterstate::where('id','=',$state)->first();
     $statename=$Masterstate->state_code;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api-sandbox.myibservices.com/v1/address/validate',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "company_name" : "RedBrick247", 
        "line1" :"'.$address_line_1.'",  
        "line2" : "", 
        "line3" : "",  
        "city" : "'.$city.'", 
        "state_province" : "'.$statename.'", 
        "postal_code" : "'.$postal_code.'",
        "country_code" : "'.$MasterCountry->country_code.'"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic cGFyZXNzZW5ld3NAZ21haWwuY29tOkNhbmFkYS02MDQ2MDQ='
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $AddressResponse = json_decode($response, true);
    if(array_key_exists("code",$AddressResponse)){
      $message = $AddressResponse["message"];
      header('Content-Type:application/json');
    die(json_encode(array("status"=>"1","address1"=>$address_line_1,"address_line_2"=>$address_line_2,"city"=>$city,"country_name"=>$countryname,"postal_code"=>$postal_code,"state"=>$statename,"message"=>$message,"suggestedaddressline1"=>'')));
    }else{
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-sandbox.myibservices.com/v1/address/possible_addresses?zip5='.urlencode($postal_code).'&primary='.urlencode($address_line_1).'&street_name=',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
        'Authorization: Basic cGFyZXNzZW5ld3NAZ21haWwuY29tOkNhbmFkYS02MDQ2MDQ='
        ),
      ));
      
      $suggestedresponse = curl_exec($curl);
      curl_close($curl);
      
      if(!empty($suggestedresponse)){
         $suggestedaddressline2[] = $suggestedresponse;
        $suggestedaddresslinetrim=trim($suggestedresponse, '[');
        $suggestedaddressline1 =trim($suggestedaddresslinetrim, ']');
      }else{
        $suggestedaddressline1='';
      }

      header('Content-Type:application/json');
      die(json_encode(array("status"=>"1","address1"=>$address_line_1,"address_line_2"=>$address_line_2,"city"=>$city,"country_name"=>$countryname,"postal_code"=>$postal_code,"state"=>$statename,"message"=>'',"suggestedaddressline1"=>$suggestedaddressline1)));
    }
    
  }
  public function suggested_address(Request $request){
    // echo $request->addressline;die;
    $recipient_name=Session::get('recipient')['recipient_name'];
    $address_line_1=Session::get('recipient')['address_line_1'];
    $address_line_2=Session::get('recipient')['address_line_2'];
    $city=Session::get('recipient')['city'];
    $country=Session::get('recipient')['country']; 
    $state=Session::get('recipient')['state'];
    $postal_code=Session::get('recipient')['postal_code'];
    $mobile_number=Session::get('recipient')['mobile_number'];
    Session::put('recipient', ['address_line_1' => $request->addressline,'recipient_name' => $recipient_name,'address_line_2' => $address_line_2,'city' => $city,'country' => $country,'state' => $state,'postal_code' => $postal_code,'mobile_number' => $mobile_number]);
    Session::save();
  // dd(Session::get('recipient'));
    header('Content-Type:application/json');
    die(json_encode(array("status"=>"1")));

  }
  public function descriptionDetails(Request $request){
    //dd($request->all());
    // echo $request->shipid1;die;
    if(Session::get('shipid')==''){
      if(!empty($request->shipid1)){
        Session::put('shipid', $request->shipid1);
      }else{
        Session::put('shipid', '');
      }
    }
    $recipient=Session::put('description', $request->all());
    //dd(Session::get('description')['merchandise']);
    Session::save();
    // print_r(session()->all());die;
    //dd(session()->all());
    header('Content-Type:application/json');
    die(json_encode(array("status"=>"1")));
  }
  public function packageDetails(Request $request){
    // echo Session::get('description')['description_of_contents'];die;
    //dd($request->all());
    if(Session::get('shipid')==''){
      if(!empty($request->shipid2)){
        Session::put('shipid', $request->shipid2);
      }else{
        Session::put('shipid', '');
      }
  }
    $package=Session::put('package', $request->all());
    //Session::save();
    //dd(session()->all());
    $company_name=Config::get('Constants.company_name');
    $purcel_address_line1=Config::get('Constants.purcel_address_line1');
    $purcel_from_city=Config::get('Constants.purcel_from_city');
    $purcel_from_state_province=Config::get('Constants.purcel_from_state_province');
    $purcel_from_postal_code=Config::get('Constants.purcel_from_postal_code');

    $recipient_name=Session::get('recipient')['recipient_name'];
    $address_line_1=Session::get('recipient')['address_line_1'];
    $address_line_2=Session::get('recipient')['address_line_2'];
    $city=Session::get('recipient')['city'];
    $country=Session::get('recipient')['country']; 
    $state=Session::get('recipient')['state'];
    $postal_code=Session::get('recipient')['postal_code'];
    $mobile_number=Session::get('recipient')['mobile_number'];

    $merchandise=Session::get('description')['merchandise'];
    $description_of_contents=Session::get('description')['description_of_contents'];
    $retail_value=Session::get('description')['retail_value'];
    $currency=Session::get('description')['currency'];
    $order_ID=Session::get('description')['order_ID'];

    $package_type=Session::get('package')['package_type'];
    $weight=Session::get('package')['weight'];
    $unit=Session::get('package')['unit'];
    $length=Session::get('package')['length'];
    $width=Session::get('package')['width'];
    $height=Session::get('package')['height'];
    $dimension_unit=Session::get('package')['dimension_unit'];
    // echo $shipid=Session::get('shipid');die;
    $total_dimension = ($length + $width + $height);
    //check weight is more than 2 kg or not
    if($weight >= 2000 && $unit == 'g' ){
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"0","data"=>"weight","message"=>'Maximum weight is 2kg(70.55oz)')));
    }

      if($weight >= 70.55 && $unit == 'oz' ){
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"0","data"=>"weight","message"=>'Maximum weight is 2kg(70.55oz)')));
      }
    //check dimension length more than 80cm or 31. 5 inch
    if($total_dimension >= 81 && $dimension_unit == 'cm' ){
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"0","data"=>"weight","message"=>'Maximum size is 80 cm (31.5 in)')));
    }
    if($total_dimension >= 31.6 && $dimension_unit == 'in' ){
      header('Content-Type:application/json');
      die(json_encode(array("status"=>"0","data"=>"weight","message"=>'Maximum size is 80 cm (31.5 in)')));
    }
    
    $MasterCountry = MasterCountry::where('id','=',$country)->first();
    $countryCode = substr($MasterCountry->country_name, 0, 2);
    $Masterstate = Masterstate::where('id','=',$state)->first();
    $settingsData = DB::table('settings')->where('is_deleted', 0)->orderBy('id','desc')->first(); 
    //dd($settingsData);
    //calling ib price api
    if($MasterCountry->country_code =='US'){
        if($request -> unit == 'g'){
          if($request -> weight <=450 ){ //check shipment weight lessthan equal 450 gm or not
            $mail_class='FirstClass';
          }else{
            $mail_class='Priority';
          }
        }
        if($request -> unit == 'oz'){
          if($request -> weight <=15.9 ){ //check shipment weight lessthan equal 15.9 oz or not
            $mail_class='FirstClass';
          }else{
            $mail_class='Priority';
          }
        }
      $image_size="4x6";

    }else{
      if($request -> unit == 'g'){
        if($request -> weight <=907 ){ //check shipment weight lessthan equal 907 gm or not
          $mail_class='PriorityInternational';
        }else{
          $mail_class='FirstClassInternational';
        }
      }
      if($request -> unit == 'oz'){
        if($request -> weight <=32.1){ //check shipment weight lessthan equal 32,1oz or not
          $mail_class='PriorityInternational';
        }else{
          $mail_class='FirstClassInternational';
        }
      }
    
      $image_size="6x4";

    }
    if($package_type=='FlatRateEnvelope'){
      $mail_class='Priority';
    }
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api-sandbox.myibservices.com/v1/price.json',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{ 
          "from_address" : { 
              "company_name" : "'.$company_name.'" , 
              "first_name" : "", 
              "last_name" : "", 
              "line1" : "'.$purcel_address_line1.'", 
              "city" : "'.$purcel_from_city.'" , 
              "state_province" : "'.$purcel_from_state_province.'", 
              "postal_code" : "'.$purcel_from_postal_code.'" , 
              "phone_number" : "" , 
              "sms" : "", 
              "email" : "", 
              "country_code" : "US"
          }, 
          "to_address" : { 
              "company_name" : "" , 
              "first_name" : "'.$recipient_name.'" , 
              "last_name" : "'.$recipient_name.'" , 
              "line1" : "", 
              "city" : "'.$city.'", 
              "state_province" : "'.$Masterstate->state_code.'" , 
              "postal_code" : "'.$postal_code.'", 
              "phone_number" : "'.$mobile_number.'", 
              "country_code" : "'.$MasterCountry->country_code.'"
          },
          "weight" : '.$weight.',
          "weight_unit" : "'.$unit.'",
          "value": 2.00,
          "image_format" : "png",
          "width" : '.$width.', 
          "height" : '.$height.', 
          "length" : '.$length.', 
          "dimensions_unit" : "'.$dimension_unit.'",
          "usps" : { 
              "shape" : "'.$package_type.'", 
              "mail_class" : "'.$mail_class.'", 
              "image_size" : "'.$image_size.'", 
              "services" : ["SignatureConfirmation"]
          },"customs_form": {

            "contents_type": "Merchandise",
    
            "customs_items": [
    
                {
    
                    "description": "'.$description_of_contents.'",
    
                    "quantity": 1,
    
                    "weight": '.$weight.',
    
                    "weight_unit": "'.$unit.'",
    
                    "value": 2.00,
    
                    "origin_country_code": "US"
    
                }
    
            ]
    
        }
      }',
      CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Basic cGFyZXNzZW5ld3NAZ21haWwuY29tOkNhbmFkYS02MDQ2MDQ='
      ),
    ));

      $response = curl_exec($curl);
      /*if (curl_errno($curl)) {
          $error_msg = curl_error($curl);
      }else{
          $error_msg = "ok";
          
      }*/
      curl_close($curl);
      $PriceResponse = json_decode($response, true);
      // print_r($PriceResponse);die;
      //dd($PriceResponse);
      if(array_key_exists("code",$PriceResponse)){
        //($PriceResponse);
        if($PriceResponse['code']=='AVS04' || $PriceResponse['code']=='AVS06')
        {  
          $total_price= 'Please provide a proper zip code according to state ';
        }
        else
        {
          $total_price= $PriceResponse["message"];
        }
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"0","data"=>"false","insurancePrice"=>"0.00","message"=>$total_price,'mail_class'=>'')));
      }
      else
      {
        $totalPrice = $PriceResponse["postage_amount"];
        $totalPriceSignature = $PriceResponse["total_amount"];
        if($unit =='g'){
          if($weight >= 1000){
            if($package_type=='Parcel'){
            $Profitlist=DB::table('profit_margin')->where('id','=',5)->first();
            }else{
              $Profitlist=DB::table('profit_margin')->where('id','=',15)->first();
            }
            $client_profit =$Profitlist->price;
          }else{
            // echo $weight;
            if($package_type=='Parcel'){
              $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$weight.' and `end_weight` >= '.$weight.' and `unit_type` = 1 and `packtype` = 1 limit 1');
            }else{
              $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$weight.' and `end_weight` >= '.$weight.' and `unit_type` = 1 and `packtype` = 2 limit 1');
            }
            // echo "<pre>";print_r($Profitlist);die;
             $client_profit =$Profitlist[0]->price;
          }
         
        }
        if($unit =='oz'){
          if($weight >= 35.28){
            if($package_type=='Parcel'){
            $Profitlist=DB::table('profit_margin')->where('id','=',10)->first();
            }else{
              $Profitlist=DB::table('profit_margin')->where('id','=',20)->first();
            }
            $client_profit =$Profitlist->price;
          }else{
            // $Profitlist=DB::table('profit_margin')->where('start_weight','<=',$weight)->where('end_weight','>=',$weight)->where('unit','=','gram')->first();
            if($package_type=='Parcel'){
              $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$weight.' and `end_weight` >= '.$weight.' and `unit_type` = 2 and `packtype` = 1 limit 1');
            }else{
              $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$weight.' and `end_weight` >= '.$weight.' and `unit_type` = 2 and `packtype` = 2 limit 1');
            }
            // echo "<pre>";print_r($Profitlist);die;
             $client_profit =$Profitlist[0]->price;
          }
        }
        //-------check user has any coupon or not ------//
        $userid=Auth::guard('frontenduser')->user()->id;
        $is_coupon_applied ='N';
        $coupon_data = DB::table('user_coupon')->where('user_id', $userid)->where('is_deleted', 'N')->first();
        
        if(!empty($coupon_data)){
          $CoupndiscountAmount =$coupon_data->discount_amount;
           $validUpto=$coupon_data->valid_upto;
           $currentDate= date('Y-m-d');
           $is_coupon_applied ='Y';
            if($currentDate >$validUpto){
             if($CoupndiscountAmount > $client_profit){
              $client_profit=0;
             }else{
              $client_profit =  ($client_profit -$CoupndiscountAmount);
             }
            }
        }
        
       // ---- end coupon code apply code ----//
        $insurancePercentage=$settingsData->insurance_price;
        //----------------------for signature price-----------------------------//
        $signaturePrice = $PriceResponse["fees_amount"];
        //dd($signaturePrice);
        //----------------------for signature price-----------------------------//
        //--------------total & insurance price without signature--------------// 
        $total_price=$totalPrice+$client_profit; 
        $total_price =  number_format((float)$total_price, 2, '.', '');
        // $insurancePrice = ($insurancePercentage / 100) * $total_price;
        $insurancePrice = ($insurancePercentage / 100) * $retail_value;
        $insurancePrice=number_format((float)$insurancePrice, 2, '.', '');
        //--------------total & insurance price without signature--------------//
        //($insurancePrice);
        //--------------total & insurance price with signature--------------//
        $total_price_signature=$totalPriceSignature+$client_profit;
        $total_price_signature =number_format((float)$total_price_signature, 2, '.', '');
        $insurancePriceSignature = ($insurancePercentage / 100) * $total_price_signature;
        $insurancePriceSignature=number_format((float)$insurancePriceSignature, 2, '.', '');
        //dd($insurancePriceSignature);
        //--------------total & insurance price with signature--------------//
        Session::put('postage', ['insurancePrice' => $insurancePrice,'insurancePriceSignature' => $insurancePriceSignature, 'total_price' => $total_price,'total_price_signature'=>$total_price_signature,'client_profit'=>$client_profit]);
        Session::save();

        header('Content-Type:application/json');
        die(json_encode(array("status"=>"1","data"=>"true","insurancePrice"=>$insurancePrice,"message"=>$total_price,"total_price_signature"=>$total_price_signature,"insurancePriceSignature"=>$insurancePriceSignature,'mail_class'=>$mail_class)));

      }    
  }
  public function postageDetails(Request $request)
  {
    // print_r(session()->all());die;
    //dd(session()->all());
    //dd($request->all());
    //------------------------config data------------------------// 
    // echo $request->ship_id;die;
    $company_name=Config::get('Constants.company_name');
    $purcel_address_line1=Config::get('Constants.purcel_address_line1');
    $purcel_from_city=Config::get('Constants.purcel_from_city');
    $purcel_from_state_province=Config::get('Constants.purcel_from_state_province');
    $purcel_from_postal_code=Config::get('Constants.purcel_from_postal_code');
    //------------------------config data------------------------//

    //------------------shipment received data------------------//
    $recipient_name=Session::get('recipient')['recipient_name'];
    $address_line_1=Session::get('recipient')['address_line_1'];
    $address_line_2=Session::get('recipient')['address_line_2'];
    $city=Session::get('recipient')['city'];
    $country=Session::get('recipient')['country']; 
    $state=Session::get('recipient')['state'];
    $postal_code=Session::get('recipient')['postal_code'];
    $mobile_number=Session::get('recipient')['mobile_number'];
    $merchandise=Session::get('description')['merchandise'];
    $description_of_contents=Session::get('description')['description_of_contents'];
    //------------------shipment received data------------------//
    //------------------shipment package data------------------// 
    $package_type=Session::get('package')['package_type'];
    $weight=Session::get('package')['weight'];
    $unit=Session::get('package')['unit'];
    $length=Session::get('package')['length'];
    $width=Session::get('package')['width'];
    $height=Session::get('package')['height'];
    $dimension_unit=Session::get('package')['dimension_unit'];
    //------------------shipment package data------------------//
    //------------------shipment postage data------------------//
    $insurancePrice=Session::get('postage')['insurancePrice'];
    $insurancePriceSignature=Session::get('postage')['insurancePriceSignature'];
    $total_price=Session::get('postage')['total_price'];
    $total_price_signature=Session::get('postage')['total_price_signature'];
    $client_profit=Session::get('postage')['client_profit'];
    //dd($total_price_signature);

    //----------------------post data--------------------------//
    $signature=$request->signature;
    $ship_date=$request->ship_date;
    $insurance=$request->insurance;
    //----------------------post data--------------------------// 
    //------------------shipment postage data------------------//
    //------------------master data-----------------------// 
    $MasterCountry = MasterCountry::where('id','=',$country)->first();
    $countryCode = substr($MasterCountry->country_name, 0, 2);
    $Masterstate = Masterstate::where('id','=',$state)->first();
    //------------------master data-----------------------//
    //------------------insurance price and total pay-----------------// 
    if($signature=="1" && $insurance=="")
    { 
      $totalPay=$total_price_signature;
      $insurance_price=0; 
    }
    else if($signature=="1" && $insurance=="1")
    {
      $totalPay=$total_price_signature+$insurancePriceSignature;
      $insurance_price=$insurancePriceSignature; 
    }
    else if($signature=="" && $insurance=="")
    {
      $totalPay=$total_price;
      $insurance_price=0;
    }
    else if($signature=="" && $insurance=="1")
    {
      $totalPay=$total_price+$insurancePrice;
      $insurance_price=$insurancePrice;
    }
    //die;
    //------------------insurance price and total pay-----------------//
    if($signature==1)
    {
      $SignatureConfirmation='"SignatureConfirmation"';
    }
    else
    {
      $SignatureConfirmation='';
    }
    if($MasterCountry->country_code =='US'){
      if(Session::get('package')['unit'] == 'g'){
        if(Session::get('package')['weight'] <=450 ){ //check shipment weight lessthan equal 450 gm or not
          $mail_class='FirstClass';
        }else{
          $mail_class='Priority';
        }
      }
      if(Session::get('package')['unit'] == 'oz'){
        if(Session::get('package')['weight'] <=15.9 ){ //check shipment weight lessthan equal 15.9 oz or not
          $mail_class='FirstClass';
        }else{
          $mail_class='Priority';
        }
      }
      $image_size="4x6";

    }else{
      if(Session::get('package')['unit'] == 'g'){
        if(Session::get('package')['weight'] >= 1817  ){ //check shipment weight lessthan equal 907 gm or not
          $mail_class='PriorityInternational';
        }else{
          $mail_class='FirstClassInternational';
        }
      }
      if(Session::get('package')['unit'] == 'oz'){
        if(Session::get('package')['weight']  > 64.1){ //check shipment weight lessthan equal 32,1oz or not
          $mail_class='PriorityInternational';
        }else{
          $mail_class='FirstClassInternational';
        }
      }
      $image_size="6x4";

    }
    if($package_type=='FlatRateEnvelope'){
      $mail_class='Priority';

    }
    
    $userid=Auth::guard('frontenduser')->user()->id;
    $user_data = DB::table('users')->where('id', $userid)->first();
    $walletAmount =$user_data->wallet_amount;
    if($request->submit=='pay'){
      if($walletAmount > $totalPay){
        $amountDeduct = ($walletAmount-$totalPay);
        DB::table('users')->where('id',$userid)->update(['wallet_amount' => $amountDeduct]);
      }else{
        header('Content-Type:application/json');
        $msg="Please top up your wallet, go to Add Credits page";
        die(json_encode(array("status"=>"0","message"=>$msg)));
      }
    }
   
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api-sandbox.myibservices.com/v1/labels',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{ 
          "from_address" : { 
              "company_name" : "'.$company_name.'" , 
              "first_name" : "", 
              "last_name" : "", 
              "line1" : "'.$purcel_address_line1.'", 
              "city" : "'.$purcel_from_city.'" , 
              "state_province" : "'.$purcel_from_state_province.'", 
              "postal_code" : "'.$purcel_from_postal_code.'" , 
              "phone_number" : "" , 
              "sms" : "", 
              "email" : "", 
              "country_code" : "US"
          }, 
          "to_address" : { 
              "company_name" : "" , 
              "first_name" : "'.$recipient_name.'" , 
              "last_name" : "'.$recipient_name.'" , 
              "line1" : "'.$address_line_1.'", 
              "line2" : "'.$address_line_2.'", 
              "city" : "'.$city.'", 
              "state_province" : "'.$Masterstate->state_code.'" , 
              "postal_code" : "'.$postal_code.'", 
              "phone_number" : "'.$mobile_number.'", 
              "country_code" : "'.$MasterCountry->country_code.'"
          },
          "weight" : '.$weight.',
          "weight_unit" : "'.$unit.'",
          "value": 2.00,
          "image_format" : "png",
          "width" : '.$width.', 
          "height" : '.$height.', 
          "length" : '.$length.', 
          "dimensions_unit" : "'.$dimension_unit.'",
          "usps" : { 
              "shape" : "'.$package_type.'", 
              "mail_class" : "'.$mail_class.'", 
              "image_size" : "'.$image_size.'", 
              "services" : ['.$SignatureConfirmation.']
          },
          "customs_form": {

            "contents_type": "Merchandise",
    
            "customs_items": [
    
                {
    
                    "description": "'.$description_of_contents.'",
    
                    "quantity": 1,
    
                    "weight": '.$weight.',
    
                    "weight_unit": "'.$unit.'",
    
                    "value": 2.00,
    
                    "origin_country_code": "US"
    
                }
    
            ]
    
        }
      }',
      CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization: Basic cGFyZXNzZW5ld3NAZ21haWwuY29tOkNhbmFkYS02MDQ2MDQ='
      ),
    ));

    $response = curl_exec($curl); 
    curl_close($curl);
    $json = json_decode($response,true);
    //  echo "<pre>";
    //  print_r($json);
    if($request->submit =='pay'){
      $is_paid =1;
    }else{
      $is_paid =0;
    }
    
    $from_address=json_encode($json["from_address"]);
    $to_address=json_encode($json["to_address"]);
    $user_id=Auth::guard('frontenduser')->user()->id;
    $weightReturn=$json['weight'];
    $weight_unit=$json['weight_unit'];
    $reference=$json['reference'];
    $postmark_date=$json['postmark_date'];
    $postmarkDate = date('y-m-d', strtotime($postmark_date));
    $status=$json['status'];
    $postage_amount=$json['postage_amount'];
    $discounted_amount=$json['discounted_amount'];
    $total_amount=$json['total_amount'];
    $estimated_delivery_days=$json['estimated_delivery_days'];
    $tracking_numbers=$json["usps"]['tracking_numbers']['0'];
    $pricing=$json["usps"]['pricing'];
    $mail_class=$json["usps"]['mail_class'];
    $fees_amount=$json['fees_amount'];
    $refund_detail=$json['refund_detail'];
    $shipping_status=$json['shipping_status'];

    if($signature==1)
    {
      $is_signature_confirm='Yes';
    }
    else
    {
      $is_signature_confirm='No';
    }
    if($insurance==1)
    {
      $is_insurance='Yes';
    }
    else
    {
      $is_insurance='No';
    }
    if ($recipient_name == trim($recipient_name) && strpos($recipient_name, ' ')) {
      $name=explode(" ",$recipient_name);
      $first_name =$name[0];
      $last_name =$name[1];
    }else{
      $first_name =$recipient_name;
      $last_name =$recipient_name;
    }
    $MasterCountry = MasterCountry::where('id','=',$country)->first();
    $countryname = $MasterCountry->country_name; 
    $state_id=Session::get('recipient')['state'];
    $MasterState = Masterstate::where('id','=',$state_id)->first();
    $statename = $MasterState->name; 
    $shipid=Session::get('shipid');
    $order_ID=Session::get('description')['order_ID'];
    $mobile_number=Session::get('recipient')['mobile_number'];
    $createShipment=null;

    if(!empty($shipid)){
      $shipment = Mastershipment::findOrFail($shipid);
                    $shipment->is_signature_confirm = $is_signature_confirm;
                    $shipment->user_id = $user_id;
                    $shipment->first_name = $first_name;
                    $shipment->country_name = $countryname;
                    $shipment->state_id = $state_id;
                    $shipment->last_name = $last_name;
                    $shipment->from_address = $from_address;
                    $shipment->to_address = $to_address;
                    $shipment->weight = $weightReturn;
                    $shipment->weight_unit = $weight_unit;
                    $shipment->reference = $reference;
                    $shipment->postmark_date = $postmarkDate;
                    $shipment->status = $status;
                    $shipment->postage_amount = $postage_amount;
                    $shipment->discounted_amount = $discounted_amount;
                    $shipment->total_amount = $total_amount;
                    $shipment->estimated_delivery_days = $estimated_delivery_days;
                    $shipment->tracking_numbers = $tracking_numbers;
                    $shipment->pricing = $pricing;
                    $shipment->mail_class = $mail_class;
                    $shipment->shape = $package_type;
                    $shipment->width = $width;
                    $shipment->height = $height;
                    $shipment->length = $length;
                    $shipment->is_paid = $is_paid;
                    $shipment->shape_unit = $dimension_unit;
                    $shipment->package_content = $merchandise;
                    $shipment->parcel_description = $description_of_contents;
                    $shipment->reatil_value = Session::get('description')['retail_value'];
                    $shipment->fees_amount = $fees_amount;
                    $shipment->is_insurance = $is_insurance;
                    $shipment->client_profit_price = $client_profit;
                    $shipment->insurance_price = $insurance_price;
                    $shipment->totalpay = $totalPay;
                    $shipment->shiping_date = $ship_date;
                    $shipment->refund_detail = $refund_detail;
                    $shipment->shipping_status = $shipping_status;
                    $shipment->order_id = $order_ID;
                    $shipment->phone_number = $mobile_number;
                    
                    $saveResposne = $shipment->save();

    }else{
    
    $createShipment = Mastershipment::create([
      'is_signature_confirm'=>$is_signature_confirm,
      'user_id'=>$user_id,
      'first_name'=>$first_name,
      'country_name'=>$countryname,
      'state_id'=>$state_id,
      'state_name'=>$statename,
      'last_name'=>$last_name,
      'from_address'=>$from_address,
      'order_id'=>$order_ID,
      'to_address'=>$to_address,
      'weight'=>$weightReturn,
      'weight_unit'=>$weight_unit,
      'reference'=>$reference,
      'postmark_date'=>$postmarkDate,
      'status'=>$status,
      'postage_amount'=>$postage_amount,
      'discounted_amount'=>$discounted_amount,
      'total_amount'=>$total_amount,
      'estimated_delivery_days'=>$estimated_delivery_days,
      'tracking_numbers'=>$tracking_numbers,
      'pricing'=>$pricing,
      'mail_class'=>$mail_class,
      'shape'=>$package_type,
      'phone_number'=>$mobile_number,
      'width'=>$width,
      'height'=>$height,
      'length'=>$length,
      'is_paid'=>$is_paid ,
      'shape_unit'=>$dimension_unit,
      'package_content'=>$merchandise,
      'parcel_description'=>$description_of_contents,
      'reatil_value'=>Session::get('description')['retail_value'],
      'fees_amount'=>$fees_amount,
      'is_insurance'=>$is_insurance,
      'client_profit_price'=>$client_profit,
      'insurance_price'=>$insurance_price,
      'totalpay'=>$totalPay,
      'shiping_date'=>$ship_date,
      'refund_detail'=>$refund_detail,
      'shipping_status'=>$shipping_status
    ]);
  }
    //echo $createShipment;
    
    if($createShipment!=null)
    {
      header('Content-Type:application/json');
      $msg="Shipment created successfully";
      die(json_encode(array("status"=>"1","message"=>$msg)));
    }
    else
    {
      header('Content-Type:application/json');
      $msg="Shipment updated successfully";
      die(json_encode(array("status"=>"1","message"=>$msg)));
    }
  }
}

<?php
namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,MasterCountry,Masterstate};
use Redirect;
use Validator;
use Auth;
use Illuminate\Support\Str;
use App\Models\Mastershipment;
use Mail;
use Carbon\Carbon;
use Config;
use DB;
use App\Models\Mastersupport;

//use App\Mail\FrontEndUserWelcomeMail;

class HomeController extends Controller
{
  /*****************************************************/
    # HomeController
    # Function name : index
    # Author        :
    # Created Date  : 20-05-2022
    # Purpose       : show home page
    #
    #
    # Params        : Request $request
  /*****************************************************/
  public function index(Request $request){
    $this->data['page_title'] ='Mello Bridge | Front Page';
    $this->data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
    $this->data['stateList']=Masterstate::where('status','A')->where('is_deleted', 'N')->orderBy('name')->get();
      // echo $method = $request->method();die;
    $scroll=false;
    $this->data['scroll']=$scroll;
    if ($request->isMethod('POST'))
    {
      // echo "aaaa";die;
      
      //dd($request->all());
      //  echo  $FromCountry =$request->from_first_name;die;
      $company_name=Config::get('Constants.company_name');
      $purcel_address_line1=Config::get('Constants.purcel_address_line1');
      $purcel_from_city=Config::get('Constants.purcel_from_city');
      $purcel_from_state_province=Config::get('Constants.purcel_from_state_province');
      $purcel_from_postal_code=Config::get('Constants.purcel_from_postal_code');
      $country =$request ->country;
      $MasterCountry = MasterCountry::where('id','=',$country)->first();
      $countryCode = substr($MasterCountry->country_name, 0, 2);
      $Masterstate = Masterstate::where('id','=',$request ->state_code)->first();
      $statename=$Masterstate->state_code;  
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
  
      }else{
        if($request -> unit == 'g'){
          if($request -> weight >= 1817 ){ //check shipment weight lessthan equal 907 gm or not
            $mail_class='PriorityInternational';
          }else{
            $mail_class='FirstClassInternational';
          }
        }
        if($request -> unit == 'oz'){
          if($request -> weight > 64.1 ){ //check shipment weight lessthan equal 32,1oz or not
            $mail_class='PriorityInternational';
          }else{
            $mail_class='FirstClassInternational';
          }
        }
        
  
      }
      
      $curl = curl_init();
      //$username=env('IB_USERNAME');
      //$password=env('IB_PASSWORD');
      //curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
      //curl_setopt($curl, CURLOPT_USERPWD, 'paressenews@gmail.com' . ":" . 'Canada-604604');  
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
              "company_name" : "'.$company_name.'" , 
              "first_name" : "" , 
              "last_name" : "" , 
              "line1" : "", 
              "city" : "Palo Alto",  
              "state_province" : "'.$statename.'",
              "postal_code" : "'.$request ->to_postal_code.'", 
              "phone_number" : "", 
              "country_code" : "'.$MasterCountry->country_code.'"
          },
          "weight" : '.$request -> weight.',
          "weight_unit" : "'.$request -> unit.'",
          "value": 2.00,
          "image_format" : "png",
          "width" : "'.$request -> width.'", 
          "height" : "'.$request -> height.'", 
          "length" : "'.$request -> length.'", 
          "dimensions_unit" : "'.$request -> dimensions_unit.'",
          "usps" : { 
              "shape" : "'.$request -> shape.'", 
              "mail_class" : "'.$mail_class.'", 
              "image_size" : "4x6"
          },
          "customs_form": {

            "contents_type": "Merchandise",
    
            "customs_items": [
    
                {
    
                    "description": "TEST",
    
                    "quantity": 1,
    
                    "weight": '.$request -> weight.',
    
                    "weight_unit": "'.$request -> unit.'",
    
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
      if(array_key_exists("code",$PriceResponse)){
        //($PriceResponse);
        if($PriceResponse['code']=='AVS04' || $PriceResponse['code']=='AVS06')
        {  
          //$this->data['total_price']= 'Please provide a proper zip code according to state';
          //$this->data['error']= 'error';
          return response()->json(array('total_price'=> 'Please provide a proper zip code according to state','responsecode'=> 500));

        }
        else
        {
          $this->data['total_price']= $PriceResponse["message"];
          return response()->json(array('total_price'=> $PriceResponse["message"],'responsecode'=>500));

        }
      }
      else
      {
        $settingsData = DB::table('settings')->where('is_deleted', 0)->orderBy('id','desc')->first(); 
        // $totalPrice = "$".$PriceResponse["total_amount"].'('.$mail_class.')';
        // $client_profit=$settingsData->lable_price;
        $weight =$request->weight;
        // echo $request->weight;die;
        if($request -> unit =='g'){
          if($weight >= 1000){
            $Profitlist=DB::table('profit_margin')->where('id','=',5)->first();
            $client_profit =$Profitlist->price;
          }else{
            $Profitlist=DB::table('profit_margin')->where('start_weight','<=',$weight)->where('end_weight','>=',$weight)->where('unit','=','gram')->first();
            $client_profit =$Profitlist->price;
          }
         
        }
        if($request -> unit =='oz'){
          if($weight >= 35.28){
            $Profitlist=DB::table('profit_margin')->where('id','=',10)->first();
            $client_profit =$Profitlist->price;
          }else{
            $Profitlist=DB::table('profit_margin')->where('start_weight','<=',$weight)->where('end_weight','>=',$weight)->where('unit','=','gram')->first();
            $client_profit =$Profitlist->price;
          }
        }
       
        
        $total_profit = $PriceResponse["total_amount"] +$client_profit ;
        $totalPrice = "$". $total_profit;
        // $this->data['total_price']="$".$totalPrice;
        // $this->data['success']= 'success';
        return response()->json(array('total_price'=> $totalPrice,'responsecode'=>200));


      }
      $scroll=true;
      $this->data['scroll']=$scroll;    
    }    
    return view('site.pages.index',$this->data);
    // ->with('page_title',$page_title)
    // ->with('stateList',$stateList)
    // ->with('data',$this->data);
  }
  public function trackingDetail(Request $request){
        
    $this->data['page_title']='Tracking Info';
    $this->data['panel_title']='Tracking Info
    ';
    $this->data['lastStatus'] ='';
    // $this->data['timestamp'] ='';
    $trackingId = $request->tracking_id; // get user-id After Decrypt with salt key.
    if($trackingId){
        $pageDetails = new Mastershipment;    
        $pageDetails = $pageDetails->where('tracking_numbers', $trackingId)->first();
        if(!empty($pageDetails )) {

            // International bridge tracking api call
            $curl = curl_init();
            $username =env('IB_USERNAME');
            $password =env('IB_PASSWORD');
            curl_setopt($curl, CURLOPT_USERPWD,  "$username". ":" ."$password" );  
            curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://api.myibservices.com/v1/track/9200190221582743041477',
            CURLOPT_URL => 'https://api.myibservices.com/v1/track/'.$trackingId.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
           
            curl_close($curl);
            if(empty($response)){
              return Redirect::back()
              ->withSuccess('Tracking not yet started');
            }
            $TrackingResponse=[];
            $TrackingResponse = json_decode($response, true);
            // echo "<pre>";print_r($TrackingResponse);die;
            $lastTrackingKey=array_key_last($TrackingResponse);
            $this->data['lastStatus']=($TrackingResponse[$lastTrackingKey]['status']);
            $this->data['timeStamp']=($TrackingResponse[$lastTrackingKey]['timestamp']);
            $this->data['shipmentid']=$pageDetails->id;
            $this->data['TRackingnum']=$trackingId;
              $this->data['trackingStatus']=$TrackingResponse;
            //  echo "<pre>";print_r($TrackingResponse);die;
            
            
        } else {
          return Redirect::back()
          ->withSuccess('No record found');
        }
    } else {
        return redirect()->back()
        ->with('error','An error occurred while view  the details.');
    }
    return view('site.pages.tracking',$this->data);


}
  /*****************************************************/
    # HomeController
    # Function name : signup
    # Author        :
    # Created Date  : 20-05-2022
    # Purpose       : show signup form
    #
    #
    # Params        : Request $request
  /*****************************************************/
  
  
  public function signup(){
    $page_title ='Mello Bridge | Sign Up';
    return view('site.pages.signup')
    ->with('page_title',$page_title);
  }
  public function postSignup(Request $request){
    //dd($request->all());  
    $validator = Validator::make($request->all(), 
    [
      'first_name'             => 'required',
      'last_name'              => 'required',
      'business_name'          => 'required',
      'email'                => 'required|email|unique:users',
      'phone'           => 'required|min:10|max:10|unique:users',
      //'password'              => 'required|confirmed|min:8',
      'password'              => 'required|min:8',
      'confirm_password'       => 'same:password',
    ],
    [      
      'required' => 'The :attribute field is required',
      'email.unique'   => 'This email has already been registered',
      'email'    => 'This is not a valid email format',
      'phone.unique'   => 'This phone number has already been taken',
      'phone.min' => 'Phone Number has to be :min chars long',
      'phone.max' => 'Phone Number can be maximum :max chars long',
      'password1.min' => 'Password must be at least :min characters',
      //'password.confirmed' => 'Password & Confirm Password must be same',
      'confirm_password.same' => 'Password & Confirm Password must be same', 
    ]);

    if ($validator->fails()) {
      /*echo 'Failed';
      exit();*/
      return Redirect::back()
                  ->withErrors($validator)
                  ->withInput();
    } else {
      $first_name = trim($request->get('first_name'));
      $last_name = trim($request->get('last_name'));
      $business_name = trim($request->get('business_name'));
      $email = trim($request->get('email'));
      $phone = trim($request->get('phone'));
      $password = trim($request->get('password'));
      $fullname=$first_name." ".$last_name;

      $frontendUser = User::create([
        'name'=>$fullname,
        'company_name'=>$business_name,
        'email'=>$email,
        'phone'=>$phone,
        'role_id'=>'4',
        'usertype'=>'FU',
        'password'=>$password,
        'status'=>'I' 
      ]);
      //dd($frontendUser);
      if ($frontendUser != null) {
          $token = Str::random(60);
          $frontendUser->userkey = $token;
          $frontendUser->save();
          
          $data['token'] = $token;
          $data['email'] = $frontendUser->email;
          //dd($data);
          //Mail::to($email)->send(new FrontEndUserWelcomeMail($data));
          Mail::send('email.frontenduser-email-register', $data, function($message) use ($data)
            {
                $message->from('no-reply@mellobridge.com', "Mello Bridge");
                $message->subject("Welcome to Mello Bridge");
                $message->to($data['email']);
            });
          $successMsg = 'Thank you '.$frontendUser->name.'. PLEASE CHECK YOUR EMAIL to confirm your email address';
          //$successMsg = 'Thank you '.$frontendUser->name.' for your registration,please login with your credential.';
          return Redirect::back()
                  ->withSuccess($successMsg);
          
      } else {
          $errMsg = array();
          $errMsg['registrationerror'] = 'Something went wrong, please try again';
          return Redirect::back()
                  ->withErrors($errMsg)
                  ->withInput();
      }
    }
  }
  public function verifyEmail($token) {
    if($user = User::where('userkey', $token)->first()) {
        
        $userName = $user->name;
        $currentDateTime = Carbon::now(); 
        $user->update([
            'status' => 'A',
            'email_verified_at'=>$currentDateTime,
            'userkey' => null,
        ]);
        $msg = 'Thank you '.$userName.', your email is confirmed. You can login now';        
        return Redirect::to('login')->withSuccess($msg); 
        
    } else {
        // $msg = 'Error! Invalid token';
        $msg = 'Your account has been activated.';
        return Redirect::to('message')->withErrors($msg); 
    }
  }
  public function login(){
    $page_title ='Mello Bridge | Log In';
    if (Auth::guard('frontenduser')->check()) {
        // If frontenduser is logged in, redirect him to dashboard page //
      return \Redirect::route('dashboard');
    } 
    else 
    {
      $email = isset($_COOKIE['user_mail']) && $_COOKIE['user_mail'] ? $_COOKIE['user_mail'] : '';
        $password = isset($_COOKIE['user_pwd']) && $_COOKIE['user_pwd'] ? $_COOKIE['user_pwd'] : '';
        if($email && $password)
        {
            $log_data = array('email' => $email, 'password' => $password);
        }
        else
        {
          $log_data  = array('email' => '', 'password' => '');
        }
      return view('site.pages.login')
      ->with('log_data',$log_data)
      ->with('page_title',$page_title);
    }
  }
  public function verifyLogin(Request $request){
      //dd($request->all());
    if (Auth::guard('frontenduser')->check()) {
      // If frontend user is logged in, redirect him/her to dashboard page //
      return Redirect::Route('dashboard');
      } else {
        try {
          if ($request->isMethod('post')) {
              // Checking validation
              $validationCondition = array(
                  'email' => 'required',
                  'password' => 'required',
              );
              $Validator = Validator::make($request->all(), $validationCondition);

              if ($Validator->fails()) {
                  // If validation error occurs, load the error listing
                  return Redirect::route('login')->withErrors($Validator);
              } else {
                /*  $rememberMe = 'false'; // set default boolean value for remember me
                   
                  if ($request->input('remember_me')=='on') {// if user checked remember me
                      $rememberMe = 'true'; // set user value
                  }*/
                  $rememberMe =$request->has('remember_me') ? true : false; 

                  $email = $request->input('email');
                  $password = $request->input('password');
                  $userdelete = User::where('is_deleted', 'Y')->where('email', $email)->first();
                   if(!empty($userdelete)){
                    $request->session()->flash('error', 'Your profile has been deleted');
                          return Redirect::Route('login');
                   }
                  /* Check if user with same email exists, who is:-
                  1. Blocked or Not
                   */

                  $userExists = User::where(
                      array(
                          'email' => $email,
                          'status' => 'A',
                      ))->where(function ($query) {
                      $query->where('usertype', 'FU');
                  })->count();


                  if ($userExists > 0) {
                      // if user exists, check the password
                      //  echo $rememberMe;die;
                     
                      
                      $auth = Auth()->guard('frontenduser')->attempt([
                          'email' => $email,
                          'password' => $password,
                      ], $rememberMe);
                      if($rememberMe){
                        //Set email
                        setcookie('user_mail', $request->email, time() + (86400 * 90), "/"); 
                        //Set Passsword
                        $cookie_password_data = "user_pwd";
                        $cookie_password_value = $request->password;
                        setcookie($cookie_password_data, $cookie_password_value, time() + (86400 * 90), "/");
                    }
                    else{
                        //unset email
                        setcookie('user_mail', '', time() + (86400 * 90), "/"); 
                        //unset Passsword
                        setcookie('user_pwd', '', time() + (86400 * 90), "/");
                    }
                       
                      if ($auth) {
                          return Redirect::Route('dashboard');
                      } else {
                          $request->session()->flash('error', 'Invalid Password');
                          return Redirect::Route('login');
                      }
                  } else {
                    if($rememberMe){
                      //Set email
                      setcookie('user_mail', $request->email, time() + (86400 * 90), "/"); 
                      //Set Passsword
                      $cookie_password_data = "user_pwd";
                      $cookie_password_value = $request->password;
                      setcookie($cookie_password_data, $cookie_password_value, time() + (86400 * 90), "/");
                  }
                  else{
                      //unset email
                      setcookie('user_mail', '', time() + (86400 * 90), "/"); 
                      //unset Passsword
                      setcookie('user_pwd', '', time() + (86400 * 90), "/");
                  }
                        $userStatus = User::where(
                          array(
                              'email' => $email,
                              'status' => 'I',
                          ))->where(function ($query) {
                          $query->where('usertype', 'FU');
                        })->count();
                      if($userStatus>0)
                      {
                        $request->session()->flash('error', 'Your account is not activated');
                        return Redirect::Route('login');
                      }
                      else
                      {  
                        $request->session()->flash('error', 'You are not an authorized user');
                        return Redirect::Route('login');
                      }
                    }
              }
          }
      } catch (Exception $e) {
          return Redirect::Route('login')->with('error', $e->getMessage());
      }
    }
  }
  public function signout()
  {
    // echo "aaa";die;
    if (Auth::guard('frontenduser')->logout()) {
        return Redirect::Route('login');
    } else {
        return Redirect::Route('dashboard');
    }
  }
  public function howitswork(){
    $page_title ='Mello Bridge | How Its Work';
    return view('site.pages.howitswork')
    ->with('page_title',$page_title);
  }
  public function contactUs(){
    $page_title ='Mello Bridge | Contact Us';
    $locationData = DB::table('cms')->where('id', 2)->first();
    $adminData =DB::table('settings')->where('is_deleted', 0)->first();
    return view('site.pages.contactus')
    ->with('location',$locationData)
    ->with('adminData',$adminData)
    ->with('page_title',$page_title);
  }
  public function postContactUs(Request $request){
    $validator = Validator::make($request->all(), 
    [
      'full_name'             => 'required',
      'emailId'              => 'required',
      'subject'             => 'required',
      'message'                => 'required',
    ],
    [      
      'required' => 'The :attribute field is required', 
    ]);
    if ($validator->fails()) {
      return Redirect::back()
                  ->withErrors($validator)
                  ->withInput();
    } 
    else 
    {
      $full_name = trim($request->get('full_name'));
      $emailId = trim($request->get('emailId'));
      $subject = trim($request->get('subject'));
      $userMessage = trim($request->get('message'));
      
      $data['full_name']=$full_name;
      $data['emailId']=$emailId;
      $data['subject']=$subject;
      $data['userMessage']=$userMessage;
      $adminData =DB::table('users')->where('usertype', 'S')->first();
      $adminEmail=$adminData->email;

      Mail::send('email.contactus-email', $data, function($message) use ($data)
      {
          $message->from('no-reply@mellobridge.com', "Mello Bridge");
          $message->subject("Hello,".$data['full_name']."  trying to connect with Mello Bridge");
          $message->to('sumitdas@matrixnmedia.com');
      });
      $new = new Mastersupport;
      $new->name =$full_name;
      $new->email  = $emailId;
      $new->query = $userMessage;
      $new->created_at  = Carbon::now();
      $saveFunction = $new->save();
      $successMsg = 'Thank you '.$full_name.' for showing interest to Mello Bridge';
          //$successMsg = 'Thank you '.$frontendUser->name.' for your registration,please login with your credential.';
          return Redirect::back()
                  ->withSuccess($successMsg);
      
    }  
  }
  public function prohibitedItems(){
    $page_title ='Mello Bridge | Prohibited Items';
    return view('site.pages.prohibiteditems')
    ->with('page_title',$page_title);
  }
  public function publicTracking(){
    $page_title ='Mello Bridge | Public Tracking';
    return view('site.pages.publicTracking')
    ->with('page_title',$page_title);
  }
  public function location(){
    $page_title ='Mello Bridge | Location';
    $locationData = DB::table('cms')->where('id', 2)->first();
    return view('site.pages.location')
    ->with('page_title',$page_title)
    ->with('location',$locationData);
  }
  public function insurance(){
    $page_title ='Mello Bridge | Insurance';
    return view('site.pages.insurance')
    ->with('page_title',$page_title);
  }
  public function faq(){
    $page_title ='Mello Bridge | Faq';
    return view('site.pages.faq')
    ->with('page_title',$page_title);
  }
  public function aboutUs(){
    $page_title ='Mello Bridge | About Us';
    $aboutData = DB::table('cms')->where('id', 17)->first();
    return view('site.pages.aboutus')
    ->with('about',$aboutData)
    ->with('page_title',$page_title);
  }
  public function forgotpassword(){
    $page_title ='Forgot Password';
    return view('site.pages.forgot-password')
    ->with('page_title',$page_title);
  }
  public function forgotPasswordsubmit(Request $request)
  {
         
              if ($request->isMethod('post')) {
                  // Checking validation
                  $validationCondition = array(
                      'email' => 'required|email',
                  );
                  $validationMessages = array(
                      'email.required' => 'Please provide email id',
                      'email.email' => 'Please provide a valid email id',
                  );
                  $Validator = Validator::make($request->all(), $validationCondition, $validationMessages);

                  if ($Validator->fails()) {
                      // If validation error occurs, load the error listing
                      return Redirect::route('forgot-password')->withErrors($Validator);
                  } else {
                      $email = $request->email;
                      $emailExists = User::where('email', $email)->count();
                      if ($emailExists > 0) // if this is a valid email
                      {
                       
                          $user = User::where('email', $email)->first(); //Fetching Specific user Data
                          if($user->status =='I'){
                            return Redirect::Route('login')->withErrors('You account is inactive mode.');
                          }
                          if($user->is_deleted =='Y'){
                            return Redirect::Route('login')->withErrors('Your account has been deleted.');
                          }
                          $encryptUserId = encrypt($user->id, Config::get('Constants.ENC_KEY')); // Encrypted user id using helper
                          $recoveryLink = route('reset-password' ,['encryptCode'=>$encryptUserId ]); //making recovery link

                          // setting mail configuration
                          $toUser = $email;
                          $fromUser = env('MAIL_FROM_ADDRESS'); // getting data form .env file
                          $subject = 'Password Recovery : Mello Bridge activation link ';
                          $mailData = array('recoverLink' => $recoveryLink);

                          // Send mail
                          Mail::send('email.forgot-password', $mailData, function ($sent) use ($toUser, $fromUser, $subject) {
                              $sent->from($fromUser)->subject($subject);
                              $sent->to($toUser);
                          });
                          if (Mail::failures()) // if mail sending failed
                          {
                            return Redirect::route('forgot-password')->withErrors('An error occurs while sending mail');

                          } else // if password could not be saved successfully
                          {
                            $user = User::findOrFail($user->id);
                            $user->is_reset = 'N';
                            $user->save();
                              return Redirect::Route('forgot-password')->withSuccess('Password Recovery Link has been sent to your email.');
                          }
                      } else // if this email is not registered
                      {
                        return Redirect::route('forgot-password')->withErrors('This email is not registered');
                      }
                  }
              }
         
      
     
  }
  public function resetPassword(Request $request, $encryptString)
  {
      $this->data['page_title'] = 'Reset Password';
      $this->data['panel_title'] = 'Reset password';
          
              if ($request->isMethod('post')) {
                  // Checking validation
                  $validationCondition = array(
                      'new_password' => 'required|min:8', // validation for new password
                      'confirm_password' => 'required|same:new_password',
                  );
                  $validationMessages = array(
                      'new_password.required' => 'New Password is required.',
                      'confirm_password.required' => 'Confirm Password is required.',
                      'confirm_password.same' => 'Confirm Password should be same as new password.',
                  );
                  $Validator = Validator::make($request->all(), $validationCondition, $validationMessages);

                  if ($Validator->fails()) {
                      // If validation error occurs, load the error listing
                      return Redirect::Route('reset-password', ['encryptCode' => $encryptString])->withErrors($Validator);
                  } else {

                      $userId = decrypt($encryptString, Config::get('Constants.ENC_KEY')); // get user-id After Decrypt with salt key.

                      $user = User::findOrFail($userId);
                      if($user->is_reset =='Y'){
                        return Redirect::Route('login')->withErrors('You have already reset your password with this link.');
                      }
                     

                      if (!empty($user)) {
                          $user->password = $request->new_password;
                          $user->is_reset = 'Y';
                          $user->save();

                          return Redirect::Route('login')->withSuccess('Your new password has been updated successfully.');
                      } else // if user not found
                      {
                        return Redirect::Route('login')->withErrors('Something went wrong.');
                      }
                  }
              }
        
          $this->data['encryptCode'] = $encryptString;
          // return view('admin.forgot-password.reset-password', $this->data);
           return view('site.pages.reset-password', $this->data);
      
  }

}

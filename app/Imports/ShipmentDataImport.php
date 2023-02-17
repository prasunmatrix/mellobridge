<?php

namespace App\Imports;

use App\Models\Mastershipment;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\InsurancePrice;

use Auth;
use Config;
use DB;

//import csv of shipment
class ShipmentDataImport implements ToCollection {

    public $data;

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection) {
        
        $row_count = 0;
        $data = [];
//        $data['errors'] = [];
//        $data['success'] = [];
        $format_ok = false;
        $header_arr = [
            'First Name',
            'Last Name',
        ];

            $format_ok = true;
        
        if ($format_ok) {
            foreach ($collection as $key => $row) {
                if ($key > 0 && $row[1] != '') {
                        $is_ok = true;
                        $validate = true;
                        $validate_msg = '';
                       
                        if ($validate) {
                            \DB::beginTransaction();
                            try {
                                // echo "aaa";die;
                               /* if($row[10] >1 && $row[11] == 'lb'){ //check shipment weight gretaer than 1 lb or not
                                    $mail_class='Priority';
                                }else{
                                    $mail_class='FirstClass';
                
                                }  */
                                
                                    if($row[11] == 'g'){
                                    if($row[10] <=450 ){ //check shipment weight lessthan equal 450 gm or not
                              
                                      $mail_class='FirstClass';
                                    }else{
                                      $mail_class='Priority';
                                    }
                                  }
                                   if($row[11] == 'oz'){
                                    if($row[10] <=15.9 ){ //check shipment weight lessthan equal 15.9 oz or not
                                      $mail_class='FirstClass';
                                    }else{
                                      $mail_class='Priority';
                                    }
                                  }
                                  $client_profit=0.00;
                                  if($row[11] =='g'){
                                    if($row[10] >= 1000){
                                      if($row[9]=='Parcel'){
                                        $Profitlist=DB::table('profit_margin')->where('id','=',5)->first();
                                        }else{
                                          $Profitlist=DB::table('profit_margin')->where('id','=',15)->first();
                                        }
                                      $client_profit =$Profitlist->price;
                                    }else{
                                      if($row[9]=='Parcel'){
                                        $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$row[10].' and `end_weight` >= '.$row[10].' and `unit_type` = 1 and `packtype` = 1 limit 1');
                                      }else{
                                        $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$row[10].' and `end_weight` >= '.$row[10].' and `unit_type` = 1 and `packtype` = 2 limit 1');
                                      }
                                      
                                      $client_profit =$Profitlist[0]->price;
                                    }
                                   
                                  }
                                  if($row[11] =='oz'){
                                    if($row[10] >= 35.28){
                                      if($row[9]=='Parcel'){
                                      $Profitlist=DB::table('profit_margin')->where('id','=',10)->first();
                                      }else{
                                        $Profitlist=DB::table('profit_margin')->where('id','=',20)->first();
                                      }
                                      $client_profit =$Profitlist->price;
                                    }else{
                                      if($row[9]=='Parcel'){
                                        $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$row[10].' and `end_weight` >= '.$row[10].' and `unit_type` = 2 and `packtype` = 1 limit 1');
                                      }else{
                                        $Profitlist=DB::select('select * from `mb_profit_margin` where `start_weight` <= '.$row[10].' and `end_weight` >= '.$row[10].' and `unit_type` = 2 and `packtype` = 2 limit 1');
                                      }
                                      // echo "<pre>";print_r($Profitlist);die;
                                       $client_profit =$Profitlist[0]->price;
                                    }
                                  }
                              
                                
                                  
                                //Client address detail fetched from constant.
                                $from_company_name = Config::get('Constants.company_name');              
                                $from_address = Config::get('Constants.purcel_from_address_line1');              
                                $from_city = Config::get('Constants.purcel_from_city');              
                                $from_state = Config::get('Constants.purcel_from_state_province');              
                                $from_postal_code = Config::get('Constants.purcel_from_postal_code');              
                                //internation bridge api call for label genartion.
                                 $curl = curl_init();
                                $username=env('IB_USERNAME');
                                $password=env('IB_PASSWORD');
                                curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://api-sandbox.myibservices.com/v1/price.json',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS =>'{
                                    "request_id": "",
                                    "from_address": {
                                        "company_name": "'.$from_company_name.'",
                                        "first_name": "",
                                        "last_name": "",
                                        "line1": "'.$from_address.'",
                                        "city": "'.$from_city.'",
                                        "state_province": "'.$from_state.'",
                                        "postal_code": "'.$from_postal_code.'",
                                        "phone_number": "",
                                        "sms": "",
                                        "email": "",
                                        "country_code": "US"
                                    },
                                    "to_address": {
                                        "company_name": "RedBrick247",
                                        "first_name" : "'.$row[0].'" ,
                                        "last_name": "'.$row[1].'" ,
                                        "line1": "'.$row[2].'" ,
                                        "city": "'.$row[4].'" ,
                                        "state_province": "'.$row[6].'" ,
                                        "postal_code": "'.$row[8].'" ,
                                        "phone_number": "'.$row[7].'" ,
                                        "country_code": "US"
                                    },
                                    "weight": '.$row[10].',
                                    "weight_unit": "'.$row[11].'",
                                    "image_format": "png",
                                    "image_resolution": 300,
                                     "width" : "'.$row[13].'", 
                                    "height" : "'.$row[14].'", 
                                    "length" : "'.$row[12].'", 
                                    "dimensions_unit" : "'.$row[15].'",
                                    "usps" : { 
                                        "shape" : "'.$row[9].'", 
                                        "mail_class" : "'.$mail_class.'", 
                                        "image_size" : "4x6"
                                    }
                                }',
                                CURLOPT_HTTPHEADER => array(
                                    'Content-Type: application/json'
                                ),
                                ));

                                $response = curl_exec($curl);
                                curl_close($curl);
                                $lebelResponse = json_decode($response, true);
                                //  echo "<pre>";print_r($lebelResponse);die;
                                // print_r($PriceResponse);die;
                            if(array_key_exists("code",$lebelResponse)){
                                //  print_r($lebelResponse["message"]);die;
                                if($lebelResponse['code']=='AVS04' || $lebelResponse['code']=='AVS06')
                                {  
                                  //$this->data['total_price']= 'Please provide a proper zip code according to state';
                                  //$this->data['error']= 'error';
                                  $validate_msg = 'Please provide proper zipcode';
                                  $data['errors'][$key] = 'Row no ' . ($key + 1) .  ' '. $validate_msg;
                        
                                }else{
                                $validate_msg = $lebelResponse["message"];
                                $data['errors'][$key] = 'Row no ' . ($key + 1) .  ' '. $validate_msg;
                                }
                              }else{
                                //fetching insurance price and lebel margin price from setting table
                                 $Settingdata = DB::table('settings')->where('is_deleted', 0)->first();
                                 $labelPrice = $Settingdata->lable_price;
                                 $insurancePercentage = $Settingdata->insurance_price;
                                //check user selecting mello insurance or not.
                                //if not then only add label marigin price with total price.
                                 $totalPrice =0;
                                //  echo $row[16];die;
                                if($row[16] =='Y'){
                                      $totalAmount = ($lebelResponse['total_amount'] + $labelPrice);
                                      $insurancePrice = ($totalAmount * ($insurancePercentage/100)) ;
                                      $totalPrice= ($insurancePrice + $lebelResponse['total_amount'] + $labelPrice);
                                }else{
                                      $totalPrice= ( $lebelResponse['total_amount'] + $labelPrice);
                                }
                                $totalpay=$totalPrice+$client_profit;
                               
                                $userId=Auth::guard('frontenduser')->user()->id;
                                $insert_shipment = new Mastershipment;   
                                $insert_shipment->first_name = $row[0];
                                $insert_shipment->last_name = $row[1];
                                $insert_shipment->country_name = $row[5];
                                $insert_shipment->user_id = $userId;
                                $insert_shipment->weight = $row[10];
                                $insert_shipment->weight_unit = $row[11];
                                $insert_shipment->width = $row[13];
                                $insert_shipment->height = $row[14];
                                $insert_shipment->length = $row[12];
                                $insert_shipment->shape_unit = $row[15];
                                $insert_shipment->shape = $row[9];
                                $insert_shipment->parcel_description = $row[17];
                                $insert_shipment->is_paid = 0;
                                $insert_shipment->is_import = 'Y';
                                // $insert_shipment->reference = $lebelResponse['reference'];
                                $insert_shipment->postage_amount = $lebelResponse['postage_amount'];
                                // $insert_shipment->postmark_date = $lebelResponse['postmark_date'];
                                // $insert_shipment->total_amount = $lebelResponse['total_amount'];
                                $insert_shipment->total_amount = $totalPrice;
                                $insert_shipment->totalpay = $totalpay;
                                $insert_shipment->mail_class = $lebelResponse['usps']['mail_class'];
                                // $insert_shipment->tracking_numbers = $lebelResponse['usps']['tracking_numbers'][0];
                                $insert_shipment->from_address =  json_encode($lebelResponse['from_address']);
                                $insert_shipment->to_address =  json_encode($lebelResponse['to_address']);
                                $insert_shipment->save();
                                $data['success'][$key] = 'Row no ' . ($key + 1) . " inserted successfully.";
                             }
                            } catch (\Exception $e) {
                                $data['type'] = 'error';
                                $data['errors'][$key] = $e->getMessage();
                                $is_ok = false;
                            }
                        
                            if ($is_ok) {
                                \DB::commit();
                                $data['type'] = 'success';
                                $data['msg'] = 'ok';
                            } else {
                                \DB::rollback();
                            }
                        } else {
                            $data['errors'][$key] = 'Row no ' . ($key + 1) . $validate_msg;
                        }
                        
                    
                } else {
                    if ($key > 0) {
                        $data['errors'][$key] = 'Row no ' . ($key + 1) . " not inserted (valid email and company name must be required).";
                    }
                }
            }
            $data['type'] = 'success';
            $data['msg'] = 'ok';
        } else {
            $data['type'] = 'error';
            $data['msg'] = 'Invalid csv formatt.';
        }
        $this->data = $data;
    }



   
    

}

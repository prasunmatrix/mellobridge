<?php

namespace App\Http\Controllers\V1\admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper, AdminHelper, Image, Auth, Hash, Redirect, Validator, View;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\User;
use App\Models\MasterCountry;
use Yajra\Datatables\Datatables;
use Config;
use App\Imports\CountryDataImport;
use Excel;
use DB;
use Carbon\Carbon;

class CountryController extends Controller
{
    public $data = array();             // set global class object

     
    public function countryList(Request $request){
        $this->data['page_title']="Country List";
        $this->data['panel_title']="Country List";
        
        return view('admin.country.list',$this->data);
    }

    public function countryListTable(Request $request){

        $data = DB::table('country')->where('is_deleted', 0)->orderBy('id','desc')->get();
        
        $finalResponse= Datatables::of($data)
           ->addColumn('action', function ($model) {
                $deletelink= route('admin.delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                //$viewlink= route('admin.'.\App::getLocale().'.cms-management.view',  encrypt($model->id, Config::get('Constant.ENC_KEY')));

                $actions='<div class="btn-group btn-group-sm ">';
                $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                $actions .='</div>';
                return $actions;

            })
            ->rawColumns(['action'])
            ->make(true);
            
            return $finalResponse;

    }
    function checkExcelFile($file_ext) {
        $valid = array(
            'xls', 'xlsx' // add your extensions here.
        );
        return in_array($file_ext, $valid) ? true : false;
    }
    public function countryImport(Request $request) {
        $data = [];
        $customMessages = [
            'mimes' => 'The :attribute field must be type of xls.'
        ];
        $validator = Validator::make($request->all(), [
                    'import_file' => 'required',
                        ], $customMessages);
                        $validator->after(function ($validator) use ($request) {
                            if ($request->import_file && $this->checkExcelFile($request->import_file->getClientOriginalExtension()) == false) {
                                //return validator with error by file input name
                                $validator->errors()->add('import_file', 'The file must be a file of type: xlsx, xls');
                            }
                        });
        if ($validator->passes()) {
            $import = new CountryDataImport;
            $res = Excel::import($import, $request->file('import_file'));
            if ($import->data['type'] == 'success') {
                if (isset($import->data['errors']) && !empty($import->data['errors'])) {
                    $data['excel_error_msg'] = $import->data['errors'];
                }
                if (isset($import->data['success']) && !empty($import->data['success'])) {
                    $data['excel_success_msg'] = $import->data['success'];
                }
                $data['type'] = 'success';
            } else {
                $data['type'] = 'error';
                $data['errors']['import_file'] = $import->data['msg'];
            }
        } else {
            $messages = $validator->getMessageBag()->toArray();
            $errors = [];
            foreach ($messages as $key => $value) {
                $errors[$key] = $value[0];
            }
            $data['type'] = 'error';
            $data['errors'] = $errors;
        }
        return json_encode($data);
    }




   

    public function categoryDelete(Request $request,$encryptString)
    {
       
        $categoryId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = MasterCategory::findOrFail($categoryId);

        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.'.\App::getLocale().'.category.list')->with('success','Category has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }
    public function priceAdd(Request $request)

    {
        $this->data['page_title']='Price Calculate ';
        $this->data['panel_title']='Price Calculate';
        $this->data['total_price']='';

        if ($request->isMethod('POST'))
        	{
                //  echo  $FromCountry =$request->from_first_name;die;
                //calling ib price api
                if($request -> weight >1 && $request -> unit == 'lb'){ //check shipment weight gretaer than 1 lb or not
                    $mail_class='Priority';
                }else{
                    $mail_class='FirstClass';

                }
                $curl = curl_init();
                $username=env('IB_USERNAME');
                $password=env('IB_PASSWORD');
                curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
                // curl_setopt($curl, CURLOPT_USERPWD, 'paressenews@gmail.com' . ":" . 'Canada-604604');  
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
                        "company_name" : "'.$request -> from_company_name.'" , 
                        "first_name" : "'.$request -> from_first_name.'", 
                        "last_name" : "'.$request -> from_last_name.'", 
                        "line1" : "", 
                        "city" : "'.$request -> from_city.'" , 
                        "state_province" : "", 
                        "postal_code" : "'.$request -> from_postal_code.'" , 
                        "phone_number" : "'.$request -> phone.'" , 
                        "sms" : "", 
                        "email" : "", 
                        "country_code" : "US"
                    }, 
                    "to_address" : { 
                        "company_name" : "'.$request -> to_company_name.'" , 
                        "first_name" : "'.$request -> to_first_name.'" , 
                        "last_name" : "'.$request -> to_last_name.'" , 
                        "line1" : "", 
                        "city" : "'.$request -> to_city.'", 
                        "state_province" : "'.$request -> to_state.'" , 
                        "postal_code" : "'.$request -> to_postal_code.'", 
                        "phone_number" : "", 
                        "country_code" : "US"
                    },
                    "weight" : '.$request -> weight.',
                    "weight_unit" : "'.$request -> unit.'",
                    "image_format" : "png",
                    "width" : "'.$request -> width.'", 
                    "height" : "'.$request -> height.'", 
                    "length" : "'.$request -> length.'", 
                    "dimensions_unit" : "'.$request -> dimension_unit.'",
                    "usps" : { 
                        "shape" : "'.$request -> shape.'", 
                        "mail_class" : "'.$mail_class.'", 
                        "image_size" : "4x6"
                    }
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
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
                    //   print_r($PriceResponse);die;
               if(array_key_exists("code",$PriceResponse)){
                $this->data['total_price']= 'Error message'.'--'.$PriceResponse["message"];
               }else{
                $totalPrice = $PriceResponse["total_amount"];
                $this->data['total_price']='Total Price'.'-$'.$totalPrice;

               }
               

            }
      
			return view('admin.country.add',$this->data);
    
    }


   

    

}

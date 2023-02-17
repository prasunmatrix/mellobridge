<?php

namespace App\Http\Controllers\V1\admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper, AdminHelper, Image, Auth, Hash, Redirect, Validator, View;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\User;
use App\Models\InsurancePrice;
use App\Models\Mastershipment;
use App\Models\Mastershipmenttracking;
use Yajra\Datatables\Datatables;
use Config;
use DB;
use Carbon\Carbon;

class ShipmentController extends Controller
{
    public $data = array();             // set global class object

     
    public function priceList(Request $request){
        $this->data['page_title']="Setting List";
        $this->data['panel_title']="Setting List";
        
        return view('admin.shipment.price_list',$this->data);
    }

    public function priceListTable(Request $request){

        $data = DB::table('settings')->where('is_deleted', 0)->orderBy('id','desc')->get();
        
        $finalResponse= Datatables::of($data)
           ->addColumn('action', function ($model) {
                $editlink = route('admin.price.edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                if(checkFunctionPermission("price.edit")){
                $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                }
                $actions .='</div>';
                return $actions;

            })
            ->rawColumns(['action'])
            ->make(true);
            
            return $finalResponse;

    }

    public function priceEdit(Request $request, $encryptString){
        $this->data['page_title']='Setting Edit';
        $this->data['panel_title']='Setting Edit';
        $priceId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = InsurancePrice::findOrFail($priceId);
        try
        {
            if ($request->isMethod('POST')) {
                if ($priceId == null) {
                    return redirect()->route('admin.insurance-price.list');
                }
                $validationCondition = array(
                    'price'               => 'required|numeric',
                    'lable_price'         => 'required|numeric',
                    'compnay_name'        => 'required',
                    'admin_email'         => 'required|email',
                    'phone'               => 'required|numeric',
                );
            
                $validationMessages = array(
                    'price.required'                 =>  'Please enter Insurance Price' , 
                    'price.numeric'                 =>  'Please enter numeric value' ,
                    'lable_price.required'                 =>  'Please enter Lable Price' , 
                    'lable_price.numeric'                 =>  'Please enter numeric value' ,  
                   
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.price.edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    $details->insurance_price    = $request->price;
                    $details->lable_price    = $request->lable_price;
                    $details->admin_email    = $request->admin_email;
                    $details->company_name    = $request->compnay_name;
                    $details->phone    = $request->phone;
                    $file_name = time();    
                    $file = $request->file('logo');
                    if(!empty($file)) {
                        $extension = $file->getClientOriginalExtension();  
                        $fullFileName = $file_name.'.'.$extension; 
                        $destinationPath = 'assets/uploads';
                        $uploadResponse = $file->move($destinationPath,$fullFileName);
                        $details->logo=$fullFileName;
                    }  
                    // $details->updated_by  = Auth::guard('admin')->user()->id;
                    $details->updated_at = Carbon::now();
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                        
                    return redirect()->route('admin.insurance-price.list')
                                        ->with('success','Price has been updated successfully');
                       
                    } else {  
                         return redirect()->back()
                                        ->with('error','An error occurred while updating the Price.');
                    }
                }
            }
        } catch (Exception $e) {
            return Redirect::back()
                           ->with('error', $e->getMessage());
        }

        $this->data['details']=$details;
        $this->data['encryptCode'] = $encryptString;
        return view('admin.shipment.price_edit',$this->data);
    }

    //shipment listing
    public function shipmentList(Request $request){
        $this->data['page_title']="Shipment List";
        $this->data['panel_title']="Shipment List";
        
        return view('admin.shipment.shipment_list',$this->data);
    }

    public function shipmentListTable(Request $request){
        $status = $request->status;
        if($status !=''){
            $data = DB::table('shipments')->where('is_deleted', 'N')->where('is_paid', 1)->where('status','=', $status)->orderBy('id','desc')->get();
        }else{
            $data = DB::table('shipments')->where('is_deleted', 'N')->where('is_paid', 1)->orderBy('id','desc')->get();
        }
        
        $finalResponse= Datatables::of($data)
        
           ->addColumn('action', function ($model) {
                $deletelink= route('admin.shipment.delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $editlink = route('admin.shipment.edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $detaillink= route('admin.shipment.detail',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                if(checkFunctionPermission("shipment.edit")){
                $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                }
                if(checkFunctionPermission("shipment.detail")){
                $actions .='<a href="' . $detaillink . '" class="btn btn-info" id=""><i class="fas fa-eye"></i></a>';
                }
                if(checkFunctionPermission("shipment.delete")){
                    $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                }
                $actions .='</div>';
                return $actions;

            })
            ->addColumn('track', function ($model) {
                $tracklink= route('admin.shipment.tracking-detail',  encrypt($model->tracking_numbers, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                if(checkFunctionPermission("shipment.tracking-detail")){
                $actions .='<a href="' . $tracklink . '" class="btn btn-info" id=""><i class="fas fa-shipping-fast"></i></a>';
                }
               
                $actions .='</div>';
                return $actions;
            })
            ->rawColumns(['action','track'])
            ->make(true);
            
            return $finalResponse;

    }

    public function shipmentDelete(Request $request,$encryptString)
    {
       
        $ShipmentId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Mastershipment::findOrFail($ShipmentId);

        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.shipment.list')->with('success','This detail has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }

    public function shipmentEdit(Request $request, $encryptString){
        $this->data['page_title']='Shipment Edit';
        $this->data['panel_title']='Shipment Edit';
        $shipmentId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Mastershipment::findOrFail($shipmentId);
        $from_address = json_decode($details->from_address, true);
        $this->data['from_address']= $from_address;
        $to_address = json_decode($details->to_address, true);
        $this->data['to_address']= $to_address;
        try
        {
            if ($request->isMethod('POST')) {
                if ($shipmentId == null) {
                    return redirect()->route('admin.shipment.list');
                }
                $validationCondition = array(
                    'weight'                 => 'required', 
                    'weight_unit'           => 'required', 
                );
               
                $validationMessages = array(
                    'weight.required'             => 'Please enter weight',
                    'weight_unit.required'             => 'Please enter weight unit',
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.shipment.edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    //from address json data update
                    $from_address['first_name'] = $request->from_first_name;
                    $from_address['last_name'] = $request->from_last_name;
                    $from_address['company_name'] = $request->from_company_name;
                    $from_address['city'] = $request->from_city;
                    $details->from_address = json_encode($from_address);
                    //to address json data update
                    $to_address['first_name'] = $request->to_first_name;
                    $to_address['last_name'] = $request->to_last_name;
                    $to_address['company_name'] = $request->to_company_name;
                    $to_address['city'] = $request->to_city;
                    $to_address['phone_number'] = $request->to_phone;
                    $details->from_address = json_encode($from_address);
                    $details->to_address = json_encode($to_address);
                    $details->updated_by  = Auth::guard('admin')->user()->id;
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                            return redirect()->route('admin.shipment.list')
                                        ->with('success','Shipment has been updated successfully');

                    } else {  
                         return redirect()->back()
                                        ->with('error','An error occurred while updating the Shipment.');
                    }
                }
            }
        } catch (Exception $e) {
            return Redirect::back()
                           ->with('error', $e->getMessage());
        }

        $this->data['details']=$details;
        $this->data['encryptCode'] = $encryptString;
        return view('admin.shipment.shipment-edit',$this->data);
    }

    public function shipmentDetail(Request $request, $encryptString){
        
          
                       
        $this->data['page_title']='Package Info';
        $this->data['panel_title']='Package Info
        ';
        $shipmentId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        if($shipmentId){
            $pageDetails = new Mastershipment;    
            $pageDetails = $pageDetails->where('id', $shipmentId)->first(); 
            if($pageDetails != NULL) {
                
            } else {
                return Redirect::back()->with('alert-danger', 'No records found');
            }
        } else {
            return redirect()->back()
            ->with('error','An error occurred while view  the details.');
        }
        return view('admin.shipment.shipment-detail',['pageDetails'=> $pageDetails],$this->data);
    

    }
    public function trackingDetail(Request $request, $encryptString){
        
        $this->data['page_title']='Tracking Info';
        $this->data['panel_title']='Tracking Info
        ';
        $this->data['lastStatus'] ='';
        // $this->data['timestamp'] ='';
        $trackingId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        if($trackingId){
            $pageDetails = new Mastershipment;    
            $pageDetails = $pageDetails->where('tracking_numbers', $trackingId)->first(); 
            if($pageDetails != NULL) {

                // International bridge tracking api call
                \Log::channel('command')->info("Tracking Api call start");
                // $apiUrl=\config('constants.ib_production_url');
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
                //  echo "<pre>";print_r($response);die;

                curl_close($curl);
                $TrackingResponse=[];
                $TrackingResponse = json_decode($response, true);
                //  echo "<pre>";print_r($TrackingResponse);die;
                try {
                if(!empty($TrackingResponse)){
                  $trackingDelete =DB::table('shipment_tracking')->where('tracking_number', $trackingId)->delete();
                    $new = new Mastershipmenttracking;
                    $new->tracking_number = $trackingId;
                    $new->tracking_details = $response;
                    $new->tracking_by  = Auth::guard('admin')->user()->id;
                    $saveTracking = $new->save();
                  $lastTrackingKey=array_key_last($TrackingResponse);
                  $this->data['lastStatus']=($TrackingResponse[$lastTrackingKey]['status']);
                }
                $this->data['trackingStatus']=$TrackingResponse;
                \Log::channel('command')->info("Tracking Api call end");
                 }catch (Exception $e) {
                    $response = $e->getMessage();
                    \Log::channel('command')->info("Api Issue: " . $TrackingResponse);
                    \Log::channel('command')->info("Api Issue: " . $response);
                }
                
            } else {
                return Redirect::back()->with('alert-danger', 'No records found');
            }
        } else {
            return redirect()->back()
            ->with('error','An error occurred while view  the details.');
        }
        return view('admin.shipment.track-detail',['pageDetails'=> $pageDetails],$this->data);
    

    }
        //shipment  tracking listing
        public function shipmenttrackList(Request $request){
            $this->data['page_title']="Shipment  Tracking List";
            $this->data['panel_title']="Shipment Tracking List";
            return view('admin.shipment.shipment_tracking_list',$this->data);
        }

        public function shipmentTrackListTable(Request $request){
            $status = $request->status;
            $data = DB::table('shipments')->where('is_deleted', 'N')->where('is_pending', 'Y')->orderBy('id','desc')->get();
            $finalResponse= Datatables::of($data)
               ->addColumn('action', function ($model) {
                    $statuslink= route('admin.shipment.tracking-update',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                    $actions='<div class="btn-group btn-group-sm ">';
                    if(checkFunctionPermission("shipment.track-list")){
                        if($model->status_code == ''){
                            $actions.= '<button type="button" class="btn btn-block btn-success btn-xs changeStatus" data-redirect-url='.$statuslink.' id="status'.$model->id.'">Reached Facility</button></br>';
                            $actions.= '<button type="button" class="btn btn-block btn-warning btn-xs changeStatus" data-redirect-url='.$statuslink.' id="status'.$model->id.'">Left Facility</button>';
                        }
                       /* if($model->status_code == 81){
                            $actions.= '<button type="button" class="btn btn-block btn-warning btn-xs changeStatus" data-redirect-url='.$statuslink.' id="status'.$model->id.'">Left Facility</button>';
                        }*/
                    }
                   
                    $actions .='</div>';
                    return $actions;
    
                })
                ->rawColumns(['action','track'])
                ->make(true);
                
                return $finalResponse;
    
        }
        public function shipmentTrackStatus(Request $request){
    
            $response['has_error']=1;
            $response['msg']="Something went wrong.Please try again later.";
    
            $shipmentId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
    
            $shipObj = Mastershipment::findOrFail($shipmentId);
            $tracking_number = $shipObj->tracking_numbers;
            $current_date=date("Y-m-d H:i");
            if($shipObj->status_code ==''){
                $eventCode = 81;
            }else if($shipObj->status_code ==81){
                $eventCode = 82;
            }
            if($shipObj){
                $curl = curl_init();
                $username=env('IB_USERNAME');
                $password=env('IB_PASSWORD');
                curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api-sandbox.myibservices.com/v1/track',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{    "usps": { "event_code" : "'.$eventCode.'", "tracking_numbers" : ["'.$tracking_number.'"], "event_zip5" : "98230", "event_date_time" : "'.$current_date.'" }}',
                ));
                 curl_exec($curl);
                curl_close($curl);
                // echo $response;
            }
            $shipObj->status_code   = $eventCode;
            $shipObj->status   = 'In Transit';
            $shipObj->is_pending   = 'N';
            $saveResponse=$shipObj->save();       
            if($saveResponse){
                $response['has_error']=0;
                $response['msg']="Successfuuly changed status.";
            }
            return $response;
        }
  
  
   
    

}

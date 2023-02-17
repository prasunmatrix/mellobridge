<?php
namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{MasterCountry,Masterstate};
use Redirect;
use Validator;
use Response;
use Auth;
use Illuminate\Support\Str;
use Mail;
use App\Imports\ShipmentDataImport;
use Excel;
use App\Models\User;

use App\Models\Mastershipment;
use App\Models\Mastertransaction;
use Carbon\Carbon;
use Config;
use Session;
use DB;
use PDF;
use Yajra\Datatables\Datatables;


class ShipmentController extends Controller
{
    //csv import view file
    public function importshipment(){
        $page_title ='Import Shipment';
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['userPhone']=$userPhone;
        $data['page_title']=$page_title;
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        return view('frontenduser.shipment.import-shipments',$data);
    }
    //Function used for check csv file validation
    function checkExcelFile($file_ext) {
        $valid = array(
            'xls', 'xlsx' // add your extensions here.
        );
        return in_array($file_ext, $valid) ? true : false;
    }
    public function shipmentcsvImport(Request $request) {
        $data = [];
        // echo "aaa";die;
        // echo $request->file('import_file');die;
       
        $customMessages = [
            'mimes' => 'The :attribute field must be type of xls.'
        ];
        $validator = Validator::make($request->all(), [
                    'import_file' => 'required',
                        ], $customMessages);
                        $validator->after(function ($validator) use ($request) {
                            if ($request->import_file && $this->checkExcelFile($request->import_file->getClientOriginalExtension()) == false) {
                                //return validator with error by file input name
                                $validator->errors()->add('import_file', 'Only .xls or .xlxs files are accepted');
                            }
                        });
        if ($validator->passes()) {
            $import = new ShipmentDataImport;
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
        // return redirect()->route('import-shipment')->with($data);
        // return redirect()->route('import-shipment')->with('success','This detail has been deleted successfully!');

		

    }
     
    //Function used for: see all pending shipment after create shipment through csv or form.
    public function pendingshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->where('is_pending', 'Y')->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
       // $trackingnumber = route('tracking-detail', ['tracking_number' => $Shimentdata->tracking_numbers]);
       $trackingnumber = route('tracking-detail');
      //  $trackingLink = ' <a href="' . $trackingnumber . '"><i class="fa fa-angle-right"></i>View Shipment</a>';
      $shipmentIds = $request->get('selectedvalue');
      $trimdata =substr($shipmentIds, 1, -1);
      $ArrayIds=explode(',', $trimdata);
    //   print_r($shipmentIds);die;
      $status =1;
      $printstatus=1;
      
      $shipdata=DB::table('shipments')->whereIn('id', $ArrayIds)->get()->pluck('is_paid')->toArray();
       //Button enable for delete shipment if the shipment not paid.
    //    print_r($shipdata);die;
        if(in_array(0,$shipdata)) {
            $printstatus=1;
        }else{
            $printstatus=2;
        }
       
        if(in_array(1,$shipdata)) {
          $status =1;
        }else{
            $status =2;
        }
        if(empty($shipdata)){
            $status =1;
            $printstatus=1;
        }
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'country_name'=> $Shimentdata->country_name,
                     'state'=> $Shimentdata->state_id,
                     'state_name'=> $Shimentdata->state_name,
                     'id'=> $Shimentdata->id,
                     'phone'=> $Shimentdata->phone_number,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=>$Shimentdata->package_content, 
                     'package_description'=>$Shimentdata->parcel_description ,
                     'reatil_value'=> $Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'viewship'=>'<a href="' . $trackingnumber . '">View Shipment </a>',
                     'order_id'=> $Shimentdata->order_id ,
                     'status'=> $status ,
                     'printstatus'=> $printstatus 

         ));
         
        }else{
            $data['pendingdetails']='';
            $data['tracking_number'] ='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='Pending Shipments';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.pending-shipment',$data);
    }
    public function pendingshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->where('credit_amount', '=','0.00')->where('is_pending', 'Y')->where('is_import', 'N')->where('user_id',$userId)->orderBy('id','desc')->get();
        
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('is_paid', function ($model) {
        if($model->is_paid==0){
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name"><i class="fa fa-exclamation-circle"></i>Unpaid</a>';
        }else{
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name"><i class="fa fa-check-circle"></i>Paid</a>';
        }
        
        return $actions;

     })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->created_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
        ->rawColumns(['check_box','order_id','is_paid','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    //Function used for:listing of all intransit shipment.
    public function intransitshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [81,82,60,86,87,63,07])->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
        // print_r($to_address);die;
        $trackingnumber = route('tracking-detail');
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'id'=> $Shimentdata->id,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'country_name'=> $Shimentdata->country_name,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=> $Shimentdata->package_content, 
                     'package_description'=> $Shimentdata->parcel_description ,
                     'reatil_value'=> '$'.$Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'viewship'=>'<a href="' . $trackingnumber . '">View Shipment </a>',
                     'order_id'=> $Shimentdata->order_id 
         ));
         
        }else{
            $data['pendingdetails']='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='In Transit Shipments';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.intransit-shipment',$data);
    }

    public function intransitshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [81,82,60,86,87,63,07])->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox" name="shipmentdata"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" value="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('is_paid', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">Received</a>';
        return $actions;

   })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->created_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
       ->rawColumns(['check_box','order_id','is_paid','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    public function deliveredshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [01,43])->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
        // print_r($to_address);die;
        $trackingnumber = route('tracking-detail');
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'id'=> $Shimentdata->id,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=> $Shimentdata->package_content, 
                     'package_description'=> $Shimentdata->parcel_description ,
                     'reatil_value'=> '$'.$Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'viewship'=>'<a href="' . $trackingnumber . '">View Shipment </a>',
                     'order_id'=> $Shimentdata->order_id 
         ));
         
        }else{
            $data['pendingdetails']='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='Delivered Shipments';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.delivered-shipment',$data);
    }
    public function deliveredshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [01,43])->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox" name="shipmentdata"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" value="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('is_paid', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">Delivered</a>';
        return $actions;

   })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->cretaed_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
       ->rawColumns(['check_box','order_id','is_paid','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    public function archivedshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [72,64,57])->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
        // print_r($to_address);die;
        $trackingnumber = route('tracking-detail');
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'id'=> $Shimentdata->id,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=> $Shimentdata->package_content, 
                     'package_description'=> $Shimentdata->parcel_description ,
                     'reatil_value'=> '$'.$Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'viewship'=>'<a href="' . $trackingnumber . '">View Shipment </a>',
                     'order_id'=> $Shimentdata->order_id 
         ));
         
        }else{
            $data['pendingdetails']='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='Archived Shipments';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.archived-shipment',$data);
    }
    public function archivedshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [72,64,57])->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox" name="shipmentdata"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" value="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->created_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
       ->rawColumns(['check_box','order_id','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    public function exceptionshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [72,64,57])->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
        // print_r($to_address);die;
        $trackingnumber = route('tracking-detail');
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'id'=> $Shimentdata->id,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=> $Shimentdata->package_content, 
                     'package_description'=> $Shimentdata->parcel_description ,
                     'reatil_value'=> '$'.$Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'viewship'=>'<a href="' . $trackingnumber . '">View Shipment </a>',
                     'order_id'=> $Shimentdata->order_id 
         ));
         
        }else{
            $data['pendingdetails']='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='Exception Shipments';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.exception-shipment',$data);
    }
    public function exceptionshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [72,64,57])->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox" name="shipmentdata"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" value="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('is_paid', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">Exception</a>';
        return $actions;

   })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->created_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
       ->rawColumns(['check_box','order_id','is_paid','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    public function returnshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [51,55,56])->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
        // print_r($to_address);die;
        $trackingnumber = route('tracking-detail');
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'id'=> $Shimentdata->id,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=> $Shimentdata->package_content, 
                     'package_description'=> $Shimentdata->parcel_description ,
                     'reatil_value'=> '$'.$Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'viewship'=>'<a href="' . $trackingnumber . '">View Shipment </a>',
                     'order_id'=> $Shimentdata->order_id 
         ));
         
        }else{
            $data['pendingdetails']='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='Return Shipments';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.return-shipment',$data);
    }
    public function returnshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->whereIn('status_code', [51,55,56])->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox" name="shipmentdata"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" value="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->created_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
       ->rawColumns(['check_box','order_id','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    public function voidshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->where('is_refund_request', 'Y')->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
        // print_r($to_address);die;
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'id'=> $Shimentdata->id,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=> $Shimentdata->package_content, 
                     'package_description'=> $Shimentdata->parcel_description ,
                     'reatil_value'=> '$'.$Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'order_id'=> $Shimentdata->order_id 
         ));
         
        }else{
            $data['pendingdetails']='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='Void Shipments';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.void-shipment',$data);
    }
    public function voidshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->where('is_refund_request', 'Y')->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox" name="shipmentdata"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" value="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->created_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
       ->rawColumns(['check_box','order_id','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    public function allshipment(Request $request){
        if($request->redirectUrl !=''){
        $Shimentdata = DB::table('shipments')->where('is_deleted', 'N')->where('id',$request->redirectUrl)->first();
        $to_address=json_decode($Shimentdata->to_address, true);
        // print_r($to_address);die;
        return response()
        ->json(array('tracking_number'=> $Shimentdata->tracking_numbers,
                     'postage_amount'=> '$'.$Shimentdata->postage_amount,
                     'total_amount'=> '$'.$Shimentdata->totalpay,
                     'pending_detail'=> $Shimentdata,
                     'shape'=> $Shimentdata->shape,
                     'id'=> $Shimentdata->id,
                     'is_paid'=> $Shimentdata->is_paid,
                     'dimension'=> $Shimentdata->height .'×'.$Shimentdata->length .'×'.$Shimentdata->width . ' '.$Shimentdata->shape_unit,
                     'weight'=> $Shimentdata->weight .' '.$Shimentdata->weight_unit,
                     'name'=> $Shimentdata->first_name .' '.$Shimentdata->last_name,
                     'addressline1'=> $to_address['line1'] ,
                     'addressline2'=> $to_address['line2'] ,
                     'city'=> $to_address['city'] ,
                     'postal_code'=> $to_address['postal_code'] ,
                     'Lastname'=> $Shimentdata->last_name ,
                     'package_content'=>$Shimentdata->package_content, 
                     'package_description'=>$Shimentdata->parcel_description ,
                     'reatil_value'=> '$'.$Shimentdata->reatil_value ,
                     'length'=> $Shimentdata->length ,
                     'height'=> $Shimentdata->height ,
                     'width'=> $Shimentdata->width ,
                     'dimensionUnit'=> $Shimentdata->shape_unit ,
                     'ship_weight'=> $Shimentdata->weight, 
                     'weight_unit'=> $Shimentdata->weight_unit ,
                     'order_id'=> $Shimentdata->order_id 
         ));
         
        }else{
            $data['pendingdetails']='';
        }
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='All Shipment';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.shipment.all-shipment',$data);
    }
    public function allshipmentListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $data = DB::table('shipments')->where('is_deleted', 'N')->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox" name="shipmentdata"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" value="'.$model->id.'" class="check_details" >';
            return $actions;

        })
        ->addColumn('order_id', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->order_id.'</a>';
            return $actions;

         })
        ->addColumn('first_name', function ($model) {
                $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->first_name.' '.$model->last_name.'</a>';
                return $actions;

        })
        ->addColumn('country_name', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->country_name.'</a>';
            return $actions;

         })
        ->addColumn('parcel_description', function ($model) {
            $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'.$model->parcel_description.'</a>';
            return $actions;

       })
       ->addColumn('created_at', function ($model) {
        $actions =date("Y-m-d",strtotime($model->created_at));
        return $actions;

       })
       ->addColumn('total_amount', function ($model) {
        $actions ='<a href="javascript:void(0)" data-redirect-url="'.$model->id.'" class="recep-name">'."$".' '.$model->total_amount.'</a>';
        return $actions;

       })
       ->rawColumns(['check_box','order_id','first_name','country_name','parcel_description','created_at','total_amount'])
            ->make(true);
            return $finalResponse;

    }
    
    // Function used for:Stripe payment for add amount in wallet.
    public function add_credit(Request $request){
        $page_title ='Credit & Billing';
        $countryList = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $userid=Auth::guard('frontenduser')->user()->id;
        $user_data = DB::table('users')->where('id', $userid)->first();
        if($request->amount !=''){
            \Stripe\Stripe::setApiKey('sk_test_51LAFvxLVtcUCLVBcyN2KTrfvMfA6u6gU8B3piH3a0FcjjPLHuQ5qjeDtJE1gcEI1PULyfmuxBUE31hSUWPXUGJCy00EaP1uhut');
            $stripe_public_key = 'pk_test_51LAFvxLVtcUCLVBcdzDKzbf69k1DtKrt6zNMZuFD7bFJsITAyPpKHzPCAijrObpGufVPcRQFTLV50qBdNQhD6xqM00FSTw2ceI'; 
            if (isset($_REQUEST['stripeToken']) && !empty($_REQUEST['stripeToken'])) {
                //CH::_p($_REQUEST); 
                try {
                    $token = $_REQUEST['stripeToken'];
                    /* User payment data */
                   
                    $walletAmount = $user_data->wallet_amount;
                    $card_id = '';
                    $customer_id = '';
                    if (is_null($user_data) ||  (!is_null($user_data) && empty($user_data->customer_id))) { // Create new customer
                        $customer_email = $user_data->email;
                        $customer_name = $user_data->name;
                        $new_customer = \Stripe\Customer::create([
                            'source' => $token,
                            'email' => $customer_email,
                            'name' => $customer_name
                        ]);
                        $customer_data = $new_customer->toArray(true);
                        $customer_id = $customer_data['id'];
                        $card_id = $customer_data['default_source'];
                    } else {
                        //$card_id = $user_data->card_id;
                        $customer = \Stripe\Customer::retrieve($user_data->customer_id);
                        $new_card = $customer->sources->create(array("source" => $token));
                        $card_id = $new_card->id;
                        $customer_id = $user_data->customer_id;
                    }
                    /* User payment data */
    
                    $charge = \Stripe\Charge::create(array(
    
                        "amount" => $request->amount * 100,
                        "currency" => 'usd',
                        "source" => $card_id,
                        "customer" => $customer_id
                    ));
    
                    $final_charge = $charge->toArray(true);
                    // print_r($final_charge);die;
                    // CH::_p($final_charge);
                    /* Payment Update Code */
                    if (!empty($final_charge) && $final_charge['status'] == 'succeeded') {
                        $new = new Mastertransaction;
                        $new->user_id = $userid;
                        $new->transaction_id  = !empty($final_charge['balance_transaction']) ? $final_charge['balance_transaction'] : '';
                        $new->card_id  = !empty($final_charge['source']['id']) ? $final_charge['source']['id'] : '';
                        $new->amount = $request->amount;
                        $new->created_at  = Carbon::now();
                        $saveFunction = $new->save();
                        $newship = new Mastershipment;
                        $newship->user_id = $userid;
                        $newship->transaction_id  = !empty($final_charge['balance_transaction']) ? $final_charge['balance_transaction'] : '';
                    
                        $newship->credit_amount = $request->amount;
                        $newship->created_at  = Carbon::now();
                        $newship->is_paid  = 1;
                        $saveFunction = $newship->save();
                        //Update wallet amount
                        $walletUpdate=($request->amount+$walletAmount);
                        DB::table('users')->where('id',$userid)->update(['wallet_amount' => $walletUpdate]);
                                                            
                        return redirect(url('add-credits'));
                    }
                    /* Payment Update Code */
                } catch (Exception $e) {
                    CH::_p($e);
                }
            } 
            else{
                    echo '<form action="" method="POST" style="display:none;">
                    '.csrf_field().'
                    <input name="payment_amount" id="payment_amount" value="' . $request->amount . '" />
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_51LAFvxLVtcUCLVBcdzDKzbf69k1DtKrt6zNMZuFD7bFJsITAyPpKHzPCAijrObpGufVPcRQFTLV50qBdNQhD6xqM00FSTw2ceI"
                            data-amount="' . ($request->amount * 100) . '"
                            data-name="Mello Bridge"
                            data-description="Mello Bridge"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto" 
                            data-currency="USD" 
                            data-allow-remember-me="true"
                            data-email="' . $user_data->email . '">
                        </script>
                    </form>
                        <script
                            src="https://code.jquery.com/jquery-1.12.4.min.js"
                            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
                            crossorigin="anonymous"></script>
                        <script>
                            $( document ).ready(function() {
                                $(".stripe-button-el").click();
                            });     
                        </script>';
             }
        }
            return view('frontenduser.setting.credit')
            ->with('page_title',$page_title)
            ->with('countryList',$countryList)
            ->with('userPhone',$userPhone);  
        
      }
      public function stripePayment(Request $request){
        // echo "aaaaa";die;
        $page_title ='Credit & Billing';
         $amount=$request->amount;
         header('Content-Type:application/json');
         die(json_encode(array("status"=>"1","amount"=>$amount)));
          
      }
        public function shipmentdelete(Request $request){   
            $shipmentIds = $request->get('selectedvalue');
            $trimdata =substr($shipmentIds, 1, -1);
            $ArrayIds=explode(',', $trimdata);
            DB::table('shipments')->whereIn('id', $ArrayIds) ->update(['is_deleted' => 'Y']);
            $msg='Shipment has been  Deleted Successfully';
            header('Content-Type:application/json');
            die(json_encode(array("status"=>"1","message"=>$msg)));
          
        }
        public function shipmentrefund(Request $request){   
            $shipmentIds = $request->get('selectedvalue');
            $trimdata =substr($shipmentIds, 1, -1);
            $ArrayIds=explode(',', $trimdata);
            $shipdata=DB::table('shipments')->whereIn('id', $ArrayIds)->get()->pluck('is_paid')->toArray();
            if(in_array("0",$shipdata)) {
                $msg='Please select only paid shipment for refund request';
                header('Content-Type:application/json');
                die(json_encode(array("status"=>"0","message"=>$msg)));
            }
            DB::table('shipments')->whereIn('id', $ArrayIds) ->update(['is_refund_request' => 'Y']);
            $msg='You have successfully requested for refund';
            header('Content-Type:application/json');
            die(json_encode(array("status"=>"1","message"=>$msg)));
          
        }
          //setting function
    public function settings(){
        $page_title ='Settings';
        $data['page_title']=$page_title;
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone ']=$userPhone;
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        
        return view('frontenduser.setting.settings',$data);
    }
    public function account(){
        $page_title ='Account';
        $data['page_title']=$page_title;
        $userId=Auth::guard('frontenduser')->user()->id;
        $userdata = DB::table('users')->where('id',$userId)->first();
        $data['userData']=$userdata;
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone ']=$userPhone;
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        return view('frontenduser.setting.settings-account',$data);
    }
    public function profiledit(){
        $page_title ='Profile Edit';
        $data['page_title']=$page_title;
        $userId=Auth::guard('frontenduser')->user()->id;
        $userdata = DB::table('users')->where('id',$userId)->first();
        $data['userData']=$userdata;
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone ']=$userPhone;
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        return view('frontenduser.setting.profile-edit',$data);
    }
    public function profilesubmit(Request $request)
    {

       

                $validationCondition = [
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required|max:11',
                ];

                $validationMessages = array(
                    'name.required' => 'Please enter name.',
                    'email.required' => 'Please enter email.',
                );

                $Validator = Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    // If validation error occurs, load the error listing
                    return redirect()->back()->withErrors($Validator);
                } else {
                    $user = User::findOrFail(Auth::guard('frontenduser')->user()->id);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->phone = $request->phone;
                    $saveResposne = $user->save();
                    if ($saveResposne == true) {
                        $successMsg = 'Your profile has been updated';
                        //$successMsg = 'Thank you '.$frontendUser->name.' for your registration,please login with your credential.';
                        return Redirect::Route('account')->withSuccess($successMsg);
                        // return Redirect::back()->withSuccess($successMsg);
                                
                    } 
                }

           

        
    }
    public function businessedit(){
        $page_title ='Business Edit';
        $data['page_title']=$page_title;
        $userId=Auth::guard('frontenduser')->user()->id;
        $userdata = DB::table('users')->where('id',$userId)->first();
        $data['userData']=$userdata;
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone ']=$userPhone;
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        return view('frontenduser.setting.business-edit',$data);
    }
    public function businessesubmit(Request $request)
                {$validationCondition = [
                    'compnay_name' => 'required',
                ];

                $validationMessages = array(
                    'compnay_name.required' => 'Please enter company name.',
                );

                $Validator = Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    // If validation error occurs, load the error listing
                    return redirect()->back()->withErrors($Validator);
                } else {

                    $user = User::findOrFail(Auth::guard('frontenduser')->user()->id);
                    $user->company_name = $request->compnay_name;
                    $saveResposne = $user->save();
                    if ($saveResposne == true) {
                        $successMsg = 'Your business name has been updated';
                        return Redirect::Route('account')->withSuccess($successMsg);
                    } 
                }
    }
    public function changepassword(){
        $page_title ='Change Passowrd';
        $data['page_title']=$page_title;
        $userId=Auth::guard('frontenduser')->user()->id;
        $userdata = DB::table('users')->where('id',$userId)->first();
        $data['userData']=$userdata;
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone ']=$userPhone;
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        return view('frontenduser.setting.change-password',$data);
    }
    public function changepasswordsubmit(Request $request)
    {

           

                $validationCondition = [
                    'new_password' => 'required|min:8',
                ];

                $validationMessages = array(
                    'new_password.required' => 'New Password is required.',
                );

                $Validator = Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    // If validation error occurs, load the error listing
                    return redirect()->back()->withErrors($Validator);
                } else {
                    $user = User::findOrFail(Auth::guard('frontenduser')->user()->id);
                    $user->password = $request->new_password;
                    $saveResposne = $user->save();
                    if ($saveResposne == true) {
                        $successMsg = 'Your password has been updated';
                        // return Redirect::back()->withSuccess($successMsg);
                        
                        return Redirect::Route('account')->withSuccess($successMsg);
                }
            }

           
        
    }
    public function userdelete(Request $request){   
        $userid=Auth::guard('frontenduser')->user()->id;
        DB::table('users')->where('id', $userid) ->update(['is_deleted' => 'Y']);
        if (Auth::guard('frontenduser')->logout()) {
        $msg='You have successfully requested for refund';
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"1","message"=>$msg)));
        }
      
    }
    public function trackingdetail(){
        $page_title ='Tracking Details';
        $data['page_title']=$page_title;
        $userId=Auth::guard('frontenduser')->user()->id;
        $userdata = DB::table('users')->where('id',$userId)->first();
        $data['userData']=$userdata;
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        return view('frontenduser.shipment.tracking-detail',$data);
    }
    public function alltransaction(Request $request){
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='All Transaction';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.setting.all-transaction',$data);
    }
    public function transactionListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $Shipmentdata = DB::table('shipments')->where('is_paid', 1)->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($Shipmentdata)
        ->addColumn('wallet', function ($model) {
            $actions =Auth::guard('frontenduser')->user()->wallet_amount;
            return $actions;
    
           })
           ->addColumn('created_at', function ($model) {
            $actions =date("Y-m-d",strtotime($model->created_at));
            return $actions;
    
           })
           
           ->addColumn('type', function ($model) {
            if($model->credit_amount==0.00){
                $actions ='Postage Fee';
            }else{
                $actions ='Add Credits';
            }
           
            return $actions;
    
           })
           ->rawColumns(['created_at','type','wallet'])
            ->make(true);
            return $finalResponse;

    }
    public function payshipment(Request $request){   
        $shipmentIds = $request->get('selectedvalue');
        $trimdata =substr($shipmentIds, 1, -1);
        $ArrayIds=explode(',', $trimdata);
        // print_r($ArrayIds);die;
        $shipamountdata=DB::table('shipments')->whereIn('id', $ArrayIds)->where('is_paid', 0)->sum('totalpay');
        $userId=Auth::guard('frontenduser')->user()->id;
        $userdata = DB::table('users')->where('id',$userId)->first();
        $walletAmount =$userdata->wallet_amount;
        if($shipamountdata > $walletAmount){
            $msg='Plesae top up your wallet, go to Add Credits page';
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"0","message"=>$msg)));
        }
        $shipdata=DB::table('shipments')->whereIn('id', $ArrayIds)->get()->pluck('is_paid')->toArray();
       
        if(in_array("1",$shipdata)) {
            // do something
        $msg='Please select unpaid shipments';
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"0","message"=>$msg)));
       }else{
        $userdata= DB::table('users')->where('id', $userId)->first();
        $walletUpdate =$userdata->wallet_amount -$shipamountdata;
        DB::table('users')->where('id',$userId)->update(['wallet_amount' => $walletUpdate]);
        DB::table('shipments')->whereIn('id', $ArrayIds) ->update(['is_paid' => 1]);
        $shipmentdata=DB::table('shipments')->whereIn('id', $ArrayIds)->get();
        $msg='Shipments have been paid successfully';
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"1","message"=>$msg,"shipmentdata"=>$shipmentdata)));
       }
       
        
      
    }
    public function generatepdf(Request $request,$id)
    {
        ob_end_clean();
        $shipmentdata=DB::table('shipments')->where('id', $id)->first();
        $to_address=json_decode($shipmentdata->to_address, true);
       
        
        $pdf = PDF::loadView('pdf.postage', compact('to_address')) ->setPaper('a4');
        return $pdf->stream('result.pdf', array('Attachment'=>0));       
        // Finally, you can download the file using download function
        
        //  return $pdf->download('postage' . '.pdf');

    }

    public function allimport(Request $request){
        $userPhone=Auth::guard('frontenduser')->user()->phone;
        $data['userPhone']=$userPhone;
        $notificationList =DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->first();
        $data['notificationList']=$notificationList;
        $data['page_title']='Import List';
        $data['countryList'] = MasterCountry::where('is_deleted', 'N')->orderBy('id','desc')->get();
        // $page_title ='Mello Bridge | Pending Shipment';
        return view('frontenduser.setting.all-import',$data);
    }
    public function importListTable(Request $request){
        $userId=Auth::guard('frontenduser')->user()->id;
        $Shipmentdata = DB::table('shipments')->where('is_import', 'Y')->where('is_deleted', 'N')->where('user_id',$userId)->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($Shipmentdata)
        ->addColumn('check_box', function ($model) {
            $actions ='<input type="checkbox"  id="shipment_'.$model->id.'" data-redirect-url="'.$model->id.'" class="check_details" >';
            return $actions;

        })    
        ->addColumn('first_name', function ($model) {
            $actions =$model->first_name.' '.$model->last_name;
            return $actions;

        })   
        ->addColumn('created_at', function ($model) {
            $actions =date("Y-m-d",strtotime($model->created_at));
            return $actions;
    
           })
           ->addColumn('totalpay', function ($model) {
            $actions ='$'.$model->totalpay;
            return $actions;
    
           })
           ->rawColumns(['check_box','totalpay','first_name','created_at'])
            ->make(true);
            return $finalResponse;

    }
    public function importordersshipment(Request $request){   
        $shipmentIds = $request->get('selectedvalue');
        $trimdata =substr($shipmentIds, 1, -1);
        $ArrayIds=explode(',', $trimdata);
        // print_r($ArrayIds);die;
        DB::table('shipments')->whereIn('id', $ArrayIds) ->update(['is_import' => 'N']);
        $msg='Shipments has been imported successfully';
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"1","message"=>$msg)));
       
    }
    public function allimportselect(Request $request){   
        $userId=Auth::guard('frontenduser')->user()->id; 
        $shipdata=DB::table('shipments')->where('is_import', 'Y')->where('is_deleted', 'N')->where('user_id',$userId)->get()->pluck('id')->toArray();
        $shipjsondata=json_encode(array_values($shipdata));
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"1","allid"=>$shipjsondata)));
       
    }
    public function cancelordersshipment(Request $request){   
        $shipmentIds = $request->get('selectedvalue');
        $trimdata =substr($shipmentIds, 1, -1);
        $ArrayIds=explode(',', $trimdata);
        // print_r($ArrayIds);die;
        DB::table('shipments')->whereIn('id', $ArrayIds) ->update(['is_deleted' => 'Y']);
        $msg='Shipments has been cancelled successfully';
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"1","message"=>$msg)));
       
    }
    public function allpendingselect(Request $request){ 
        $userId=Auth::guard('frontenduser')->user()->id;  
        $shipdata=DB::table('shipments')->where('is_deleted', 'N')->where('credit_amount', '=','0.00')->where('is_pending', 'Y')->where('is_import', 'N')->where('user_id',$userId)->get()->pluck('id')->toArray();
        $shipjsondata=json_encode(array_values($shipdata));
        $trimdata =substr($shipjsondata, 1, -1);
      $ArrayIds=explode(',', $trimdata);
      $status =1;
      $printstatus=1;
      $shipdata=DB::table('shipments')->whereIn('id', $ArrayIds)->get()->pluck('is_paid')->toArray();
       //Button enable for delete shipment if the shipment not paid.
    //    print_r($shipdata);die;
    if(in_array(0,$shipdata)) {
        $printstatus=1;
    }else{
        $printstatus=2;
    }
       
        if(in_array(1,$shipdata)) {
          $status =1;
        }else{
            $status =2;
        }
        if(empty($shipdata)){
            $status =1;
            $printstatus=1;
        }
        header('Content-Type:application/json');
        die(json_encode(array("printstatus"=>$printstatus,"status"=>$status,"allid"=>$shipjsondata)));
       
    }
    public function printshipment(Request $request){   
        $shipmentIds = $request->get('selectedvalue');
        $trimdata =substr($shipmentIds, 1, -1);
        $ArrayIds=explode(',', $trimdata);
        // print_r($ArrayIds);die;
        $shipdata=DB::table('shipments')->whereIn('id', $ArrayIds)->get()->pluck('is_paid')->toArray();
       
        if(in_array("0",$shipdata)) {
            // do something
        $msg='Please select paid shipments';
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"0","message"=>$msg)));
       }else{
        $shipmentdata=DB::table('shipments')->whereIn('id', $ArrayIds)->get();
        header('Content-Type:application/json');
        die(json_encode(array("status"=>"1","shipmentdata"=>$shipmentdata)));
       }
       
        
      
    }

  
}

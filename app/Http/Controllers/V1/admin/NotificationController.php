<?php

namespace App\Http\Controllers\V1\admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper, AdminHelper, Image, Auth, Hash, Redirect, Validator, View;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\Masternotification;
use App\Models\Masterprofit;
use Yajra\Datatables\Datatables;
use Config;
use DB;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public $data = array();             // set global class object

     
    public function notificationList(Request $request){
        $this->data['page_title']="Notification List";
        $this->data['panel_title']="Notification List";
        return view('admin.notification.list',$this->data);
    }

    public function notificationListTable(Request $request){

         $data = DB::table('notification')->where('is_deleted', 'N')->orderBy('id','desc')->get();
          
        $finalResponse= Datatables::of($data)
           ->addColumn('action', function ($model) {
                $deletelink= route('admin.notification-delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $editlink= route('admin.notification.edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                
                    $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                
                
                    $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                    
                $actions .='</div>';
                return $actions;

            })
            ->rawColumns(['action'])
            ->make(true);
            return $finalResponse;

    }

    public function notificationAdd(Request $request)
    {
        $this->data['page_title']='Notification Create ';
        $this->data['panel_title']='Notification Create ';

     try
        {
        	if ($request->isMethod('POST'))
        	{
				$validationCondition = array(
                    
                    'message'               => 'required',
				);
				$validationMessages = array(
					
                    
                    'message.required'         => 'Please enetr notification message',);

				$Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
				if ($Validator->fails()) {
					return redirect()->route('admin.notification-add')->withErrors($Validator)->withInput();
				} else {


                    $new = new Masternotification;
                    $new->message = $request->message;
                    $new->created_by  = Auth::guard('admin')->user()->id;
                    $new->created_at  = Carbon::now();
                    $saveFunction = $new->save();

					if ($saveFunction) {
                
						$request->session()->flash('alert-success', 'Notification has been added successfully');
						return redirect()->route('admin.notification.list');
					} else {
						$request->session()->flash('alert-danger', 'An error occurred while adding the User');
						return redirect()->back();
					}
				}
			}
			return view('admin.notification.add',$this->data);
		} catch (Exception $e) {
			return redirect()->route('notification.list')->with('error', $e->getMessage());
		}

    
    }

    public function notificationEdit(Request $request, $encryptString){
        $this->data['page_title']='Notification Edit';
        $this->data['panel_title']='Notification Edit';

         $notificationId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details =  Masternotification::findOrFail($notificationId);
        try
        {
            if ($request->isMethod('POST')) {
                if ($notificationId == null) {
                    return redirect()->route('admin.notification.edit');
                }
                $validationCondition = array(
                    'message'             => 'required',
                );
               
                $validationMessages = array(
                    'message.required'         => 'Please enter notification message',
                  
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.notification.edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                    $details->message   = $request->message;
                    // $details->status   = $request->status;
                    $details->updated_by  = Auth::guard('admin')->user()->id;
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                            return redirect()->route('admin.notification.list')
                                        ->with('success','Message has been updated successfully');
                       

                    } else {  
                         return redirect()->back()
                                        ->with('error','An error occurred while updating the message.');
                    }
                }
            }
        } catch (Exception $e) {
            return Redirect::back()
                           ->with('error', $e->getMessage());
        }

        $this->data['details']=$details;
        $this->data['encryptCode'] = $encryptString;
        return view('admin.notification.edit',$this->data);
    }
   

    public function notificationDelete(Request $request,$encryptString)
    {
       
        $NotificationId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Masternotification::findOrFail($NotificationId);
        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.notification.list')->with('success','This detail has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }

    public function profitList(Request $request){
        $this->data['page_title']="Profit Margin List";
        $this->data['panel_title']="Profit Margin List";
        return view('admin.profit.list',$this->data);
    }

    public function profitListTable(Request $request){

         $data = DB::table('profit_margin')->where('is_deleted', 'N')->orderBy('id','desc')->get();
          
        $finalResponse= Datatables::of($data)
           ->addColumn('action', function ($model) {
               
                $editlink= route('admin.profit.edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                
                    $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                
                
                   
                    
                $actions .='</div>';
                return $actions;

            })
            ->addColumn('package_type', function ($model) {
               
               
                $actions='<div class="btn-group btn-group-sm ">';
                if($model->package_type=='FlatRateEnvelope'){
                    $actions .='Thick Envelope';
                }else{
                    $actions .=$model->package_type;
                }
                
                   
                return $actions;

            })
            ->rawColumns(['action','package_type'])
            ->make(true);
            return $finalResponse;

    }
    public function profitEdit(Request $request, $encryptString){
        $this->data['page_title']='Profit Margin Edit';
        $this->data['panel_title']='Profit Margin Edit';

         $notificationId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details =  Masterprofit::findOrFail($notificationId);
        try
        {
            if ($request->isMethod('POST')) {
                if ($notificationId == null) {
                    return redirect()->route('admin.profit.edit');
                }
                $validationCondition = array(
                    'price'             => 'required',
                );
               
                $validationMessages = array(
                    'price.required'         => 'Please enter amount',
                  
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.profit.edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                    $details->price   = $request->price;
                    // $details->status   = $request->status;
                    $details->updated_by  = Auth::guard('admin')->user()->id;
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                            return redirect()->route('admin.profit.list')
                                        ->with('success','Profit Price has been updated successfully');
                       

                    } else {  
                         return redirect()->back()
                                        ->with('error','An error occurred while updating the message.');
                    }
                }
            }
        } catch (Exception $e) {
            return Redirect::back()
                           ->with('error', $e->getMessage());
        }

        $this->data['details']=$details;
        $this->data['encryptCode'] = $encryptString;
        return view('admin.profit.edit',$this->data);
    }
   

    

}

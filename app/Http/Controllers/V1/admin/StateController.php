<?php

namespace App\Http\Controllers\V1\admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper, AdminHelper, Image, Auth, Hash, Redirect, Validator, View;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\Masterstate;
use Yajra\Datatables\Datatables;
use Config;
use DB;
use Carbon\Carbon;

class   StateController extends Controller
{
    public $data = array();             // set global class object

     
    public function stateList(Request $request){
        $this->data['page_title']="State List";
        $this->data['panel_title']="State List";
        return view('admin.state.list',$this->data);
    }

    public function stateListTable(Request $request){

           $data =  Masterstate::
                    select([
                        'country.country_name',
                        'states.name',
                        'states.state_code',
                        'states.id',
                        'states.status',
                    ])
                    ->join('country', 'country.id', 'states.country_id')
                    ->where('states.is_deleted', 'N')
                    ->orderBy('states.id','desc')
                    ->get();
        $finalResponse= Datatables::of($data)
           ->addColumn('action', function ($model) {
                $deletelink= route('admin.state-delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $editlink= route('admin.state.edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                
                if(checkFunctionPermission("state.edit")){
                    $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                }
                if(checkFunctionPermission("state-delete")){
                    $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                    }
                $actions .='</div>';
                return $actions;

            })
            ->addColumn('status', function ($model) {
                $statuslink= route('admin.reset-state-status',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                if(checkFunctionPermission(".reset-state-status")){
                    if($model->status == 'A'){
                        $statusHtml= '<button type="button" class="btn btn-block btn-success btn-xs changeStatus" data-redirect-url='.$statuslink.' id="status'.$model->id.'">Active</button>';
                    } else{
                        $statusHtml= '<button type="button" class="btn btn-block btn-warning btn-xs changeStatus" data-redirect-url='.$statuslink.' id="status'.$model->id.'">Inactive</button>';
                    }
                }else{
                    if($model->status == 'A'){
                        $statusHtml= '<button type="button" class="btn btn-block btn-success btn-xs">Active</button>';
                    } else{
                        $statusHtml= '<button type="button" class="btn btn-block btn-warning btn-xs">Inactive</button>';
                    }

                }
                return  $statusHtml;
            })
            ->rawColumns(['action','status'])
            ->make(true);
            return $finalResponse;

    }

    public function stateAdd(Request $request)
    {
        $this->data['page_title']='State Create ';
        $this->data['panel_title']='State Create ';
        $this->data['countryList'] = DB::table('country')->where('is_deleted', 'N')->orderBy('id','desc')->get();

     try
        {
        	if ($request->isMethod('POST'))
        	{
				$validationCondition = array(
                    
                    'country_name'       => 'required',
                    'name'               => 'required',
                    'state_code'               => 'required',
				);
				$validationMessages = array(
					
                    'country_name.required'      =>  'Please select Country name' , 
					'name.required'              => 'Please enter state name ',
					'state_code.required'              => 'Please enter state code ',
                   				);

				$Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
				if ($Validator->fails()) {
					return redirect()->route('admin.state-add')->withErrors($Validator)->withInput();
				} else {


                    $new = new Masterstate;
                    $new->country_id = $request->country_name;
                    $new->name  = $request->name;
                    $new->state_code  = $request->state_code;
                    $new->created_by  = Auth::guard('admin')->user()->id;
                    $new->created_at  = Carbon::now();
                    $saveFunction = $new->save();

					if ($saveFunction) {
                
						$request->session()->flash('alert-success', 'State has been added successfully');
						return redirect()->route('admin.state.list');
					} else {
						$request->session()->flash('alert-danger', 'An error occurred while adding the User');
						return redirect()->back();
					}
				}
			}
			return view('admin.state.add',$this->data);
		} catch (Exception $e) {
			return redirect()->route('state.list')->with('error', $e->getMessage());
		}

    
    }

    public function stateEdit(Request $request, $encryptString){
        $this->data['page_title']='State Edit';
        $this->data['panel_title']='State Edit';
        $this->data['countryList'] = DB::table('country')->where('is_deleted', 'N')->orderBy('id','desc')->get();
        $stateId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Masterstate::
                    select([
                        'country.country_name',
                        'country.id as country_id',
                        'states.name',
                        'states.state_code',
                        'states.id',
                    ])
                    ->join('country', 'country.id', 'states.country_id')
                    ->where('states.is_deleted', 'N')
                    ->where('states.id', $stateId)
                    ->first();
                    // echo "<pre>";print_r($details);die;
        try
        {
            if ($request->isMethod('POST')) {
                if ($stateId == null) {
                    return redirect()->route('admin.state.edit');
                }
                $validationCondition = array(
                    'country_name'       => 'required',
                    'name'               => 'required',
                    'state_code'               => 'required',
                );
               
                $validationMessages = array(
                    'country_name.required'      =>  'Please select country name' , 
					'name.required'              => 'Please enter state mane',
					'state_code.required'              => 'Please enter state code',
                  
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.state.edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                    // echo $request->country_name;die;
                    $details->country_id = $request->country_name;
                    $details->name   = $request->name;
                    $details->state_code   = $request->state_code;
                    $details->updated_by  = Auth::guard('admin')->user()->id;
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                            return redirect()->route('admin.state.list')
                                        ->with('success','State has been updated successfully');
                       

                    } else {  
                         return redirect()->back()
                                        ->with('error','An error occurred while updating the User.');
                    }
                }
            }
        } catch (Exception $e) {
            return Redirect::back()
                           ->with('error', $e->getMessage());
        }

        $this->data['details']=$details;
        $this->data['encryptCode'] = $encryptString;
        return view('admin.state.edit',$this->data);
    }
   

    public function stateDelete(Request $request,$encryptString)
    {
       
        $StateId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Masterstate::findOrFail($StateId);
        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.state.list')->with('success','This detail has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }

    public function resetstateStatus(Request $request){
    
        $response['has_error']=1;
        $response['msg']="Something went wrong.Please try again later.";

        $stateId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.

        $userObj = Masterstate::findOrFail($stateId);
        $updateStatus = $userObj->status == 'A' ? 'I' : 'A'; 
        $userObj->status=$updateStatus;
        $userObj->updated_at=Carbon::now();
        $userObj->updated_by=Auth::guard('admin')->user()->id;
        $saveResponse=$userObj->save();       
        if($saveResponse){
            $response['has_error']=0;
            $response['msg']="Successfully changed status.";
        }
        return $response;
    }

    

}

<?php

namespace App\Http\Controllers\V1\admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cms;
use Helper, AdminHelper, Image, Validator,  View;
use Illuminate\Support\Facades\Hash;
use Auth;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Config;



class CmsManageController extends Controller
{
    public $data= array();


    public function cmsList(Request $request){
        $this->data['page_title']="Cms List";
        $this->data['panel_title']="Cms List";
        
        return view('admin.cmsmanagement.cms-list',$this->data);
    }

    public function cmsListTable(Request $request){

        //$data = Cms::where('status','=','A')->where('is_deleted','=','N')->get();
        $data = Cms::where('is_deleted','=','N')->get();
        $settingObj=$this->getCurrentUserSettingsData();
        $finalResponse= Datatables::of($data)
            ->addColumn('updated', function ($model) use ($settingObj) {
                // dd($settingObj);
                $date = \Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at, 'UTC');
                $formattedDate=$date->setTimezone($settingObj->timezone)->format($settingObj->date_format.' '.$settingObj->time_format);
                return $formattedDate;
            })
            ->addColumn('status', function ($model) {
                $statuslink= route('admin.cms-management.reset-cms-status',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                if(checkFunctionPermission("cms-management.reset-cms-status")){
                    if($model->status == 'A'){
                        $statusHtml= '<button type="button" class="btn btn-block btn-success btn-xs changeStatus" data-redirect-url='.$statuslink.' id="status'.$model->id.'">Active</button>';
                    } else{
                        $statusHtml= '<button type="button" class="btn btn-block btn-warning btn-xs changeStatus" data-redirect-url='.$statuslink.' id="status'.$model->id.'">Inactive</button>';
                    }
                }else{
                    if($model->status == 'A'){
                        $fstatusHtml= '<button type="button" class="btn btn-block btn-success btn-xs">Active</button>';
                   
                    } else{
                            $fstatusHtml= '<button type="button" class="btn btn-block btn-warning btn-xs">Inactive</button>';
                        }

                }
                   

            
                return  $statusHtml;
            })
           ->addColumn('action', function ($model) {
                $editlink = route('admin.cms-management.edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $deletelink= route('admin.cms-management.delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $viewlink= route('admin.cms-management.view',  encrypt($model->id, Config::get('Constant.ENC_KEY')));

                $actions='<div class="btn-group btn-group-sm ">';
                if(checkFunctionPermission("cms-management.edit")){
                    $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                }   
                    $actions .='<a href="' . $viewlink . '" class="btn btn-info" id=""><i class="fas fa-eye"></i></a>';
                    
                /*if(checkFunctionPermission("cms-management.delete")){
                    $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                }*/
                
                $actions .='</div>';
                return $actions;
            })
            ->rawColumns(['updated','action','status'])
            ->make(true);
            
            return $finalResponse;

    }


    public function cmsAdd(Request $request)
    {
        $this->data['page_title']='Cms Create ';
        $this->data['panel_title']='Cms Create ';
        


    try
        {
        	if ($request->isMethod('POST'))
        	{
				$validationCondition = array(
                    
                    'name'               => 'required|min:2|max:255',
                    'description'        => 'required',
                    //'slug'               =>'required|min:2|max:255',
                    'status'             => 'required' 

                    
				);
				$validationMessages = array(
					
                    'name.required'                 =>  'Please enter Name' , 
                    'name.min'                      => ' Name should be should be at least 2 characters',
                    'name.max'                      => ' Name should not be more than 255 characters', 
					'description.required'          => 'Please enter Description',
                   
				);

				$Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
				if ($Validator->fails()) {
					return redirect()->route('admin.cms-management.cms.add')->withErrors($Validator)->withInput();
				} else {

                   
                    //dd($newSlug);
                    $page_slug=$request->slug;
                    $count=Cms::select('slug')->where('slug','=',$page_slug)->count();
                    if($count>0)
                    {                  
                      $errMsg = array();
                        $errMsg['slugerror'] = 'Slug already exists!';
                        return Redirect::back()
                                    ->withErrors($errMsg)
                                    ->withInput();
                    }
                    if($page_slug!="")
                    {
                      $pageSlug=$page_slug;
                    }
                    else
                    {
                      $slug_name = Str::slug($request->name, '-');
                      $pageSlug=$slug_name;
                    }
                    $new = new Cms;
                    $new->name = trim($request->name, ' ');
                    $new->description  = $request->description;
                    
                    $new->status = $request->status;
                    $new->slug= $pageSlug;
                    $new->created_at = Carbon::now();
                    $new->updated_at = Carbon::now();
                    $new->created_by  = Auth::guard('admin')->user()->id;
                    $new->updated_by  = Auth::guard('admin')->user()->id;
                    $saveCms = $new->save();

					if ($saveCms) {
                
						$request->session()->flash('alert-success', 'Cms has been added successfully');
						return redirect()->route('admin.cms-management.list');
					} else {
						$request->session()->flash('alert-danger', 'An error occurred while adding the Cms');
						return redirect()->back();
					}
				}
			}
			return view('admin.cmsmanagement.cms-add',$this->data);
		} catch (Exception $e) {
			return redirect()->route('cms-management.list')->with('error', $e->getMessage());
		}

    
    }

    public function cmsEdit(Request $request, $encryptString){
        $this->data['page_title']='Cms Edit';
        $this->data['panel_title']='Cms Edit';
        $userId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Cms::findOrFail($userId);
        //dd($details);
        try
        {
            if ($request->isMethod('POST')) {
                if ($userId == null) {
                    return redirect()->route('admin.cms-management.list');
                }
                $validationCondition = array(
                    'name'                => 'required|min:2|max:255',
                    'description'         => 'required',
                    'status'              => 'required'
                    
                );
            
                $validationMessages = array(
                    'name.required'                 =>  'Please enter Name' , 
                    'name.min'                      => ' Name should be should be at least 2 characters',
                    'name.max'                      => ' Name should not be more than 255 characters', 
					'description.required'           => 'Please enter Description',
                   
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.cms-management.edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                    $page_slug=$request->slug;
                    $count=Cms::select('slug')->where('slug','=',$page_slug)->where('id','!=',$details->id)->count();
                    if($count>0)
                    {                  
                      $errMsg = array();
                        $errMsg['slugerror'] = 'Slug already exists!';
                        return Redirect::back()
                                    ->withErrors($errMsg)
                                    ->withInput();
                    }
                    if($page_slug!="")
                    {
                      $pageSlug=$page_slug;
                    }
                    else
                    {
                      $slug_name = Str::slug($request->name, '-');
                      $pageSlug=$slug_name;
                    }

                    $details->name        = trim($request->name, ' ');
                    $details->description   = $request->description;
                    $details->slug          = $pageSlug;
                    $details->status   = $request->status;
                    $details->created_by  = Auth::guard('admin')->user()->id;
                    $details->updated_at = Carbon::now();
                    
                    
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                        
                            return redirect()->route('admin.cms-management.list')
                                        ->with('success','Cms has been updated successfully');
                       
                    } else {  
                         return redirect()->back()
                                        ->with('error','An error occurred while updating the Cms.');
                    }
                }
            }
        } catch (Exception $e) {
            return Redirect::back()
                           ->with('error', $e->getMessage());
        }

        $this->data['details']=$details;
        $this->data['encryptCode'] = $encryptString;
        return view('admin.cmsmanagement.cms-edit',$this->data);
    }

    public function resetcmsStatus(Request $request){
    
        $response['has_error']=1;
        $response['msg']="Something went wrong.Please try again later.";

        $userId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.

        $userObj = Cms::findOrFail($userId);
        $updateStatus = $userObj->status == 'A' ? 'I' : 'A'; 
        $userObj->status=$updateStatus;
        $userObj->updated_at=Carbon::now();
        $userObj->updated_by=Auth::guard('admin')->user()->id;
        $saveResponse=$userObj->save();       
        if($saveResponse){
            $response['has_error']=0;
            $response['msg']="Succressfuuly changed status.";
        }
        return $response;
    }


    public function view(Request $request, $encryptString){
        
          
                       
            $this->data['page_title']='Cms View ';
            $this->data['panel_title']='Cms View ';
           
            $userId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
            if($userId){
                $pageDetails = new Cms;    
                $pageDetails = $pageDetails->where('id', $userId)->first(); 
                if($pageDetails != NULL) {
                    
                } else {
                    return Redirect::back()->with('alert-danger', 'No records found');
                }
            } else {
                return redirect()->back()
                ->with('error','An error occurred while updating the Cms.');
            }
            return view('admin.cmsmanagement.cms-view',['pageDetails'=> $pageDetails],$this->data);
        

    }
   
                         
        
        
    
    
    public function cmsDelete(Request $request,$encryptString)
    {

        $cmsId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Cms::findOrFail($cmsId);


        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.cms-management.list')->with('success','Cms has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the Cms list');
             return redirect()->back();
        }
    }


    


}
<?php

namespace App\Http\Controllers\V1\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\ContactUs;
use App\Models\Subscriber;
use App\Models\SubscriberCategory;
use App\Models\SubscriberType;
use Helper, AdminHelper, Image, Validator, View;
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Config;



class UserController extends Controller
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->middleware('check.permission');
    }
    /*****************************************************/
    # UserController
    # Function name : index
    # Author        :
    # Created Date  : 18-05-2022
    # Purpose       : Check whether a user is logged in and
    #                 then redirect the user to either Login
    #                 Panel or Dashboard
    # Params        : Request $request
    /*****************************************************/
    public function index()
    {
        return view('admin.login.admin_login');
    }

    public $data= array();

    /*****************************************************/
    # UserController
    # Function name : userList
    # Author        :
    # Created Date  : 18-05-2022
    # Purpose       : Display Staff  listing
    #                 
    #                 
    # Params        : Request $request
    /*****************************************************/

    public function userList(Request $request){
        $this->data['page_title']="User List";
        $this->data['panel_title']="User List";
        
        return view('admin.usermanagement.user-list',$this->data);
    }

    /*****************************************************/
    # UserController
    # Function name : userListTable
    # Author        :
    # Created Date  : 18-05-2022
    # Purpose       : Display Admin User listing
    #                 
    #                 
    # Params        : Request $request
    /*****************************************************/
    public function userListTable(Request $request){
        $data = User::where('id','!=','1')->where('is_deleted','=','N')->where('usertype','=','SA')->with(['roleData'])->get();
        $settingObj=$this->getCurrentUserSettingsData();
        $finalResponse= Datatables::of($data)
            ->addColumn('updated', function ($model) use ($settingObj) {
                // dd($settingObj);
                $date = \Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at, 'UTC');
                // $formattedDate=$date->setTimezone($settingObj->timezone)->format($settingObj->date_format.' '.$settingObj->time_format);
                return $date;
            })
            ->addColumn('status', function ($model) {
                $statuslink= route('admin.user-management.reset-user-status',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                if(checkFunctionPermission("user-management.reset-user-status")){
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
           ->addColumn('action', function ($model) {
                $editlink = route('admin.user-management.user-edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $deletelink= route('admin.user-management.user-delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $changepassword= route('admin.user-management.user-changepassword',  encrypt($model->id, Config::get('Constant.ENC_KEY')));

                $actions='<div class="btn-group btn-group-sm ">';
                if(checkFunctionPermission("user-management.user-edit")){
                    $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                }
                if(checkFunctionPermission("user-management.user-delete")){
                    $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                }
                $actions .='<a href="' . $changepassword . '" class="btn btn-info" id=""><i class="fa fa-key"></i></a>';
                $actions .='</div>';
                return $actions;

                // return '<div class="btn-group btn-group-sm ">
                //         <a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>
                //         <a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>
                //       </div>';
            })
            ->rawColumns(['updated','action','status'])
            ->make(true);
            
            return $finalResponse;

    }
    

   

    

   



    /*****************************************************/
    # UserController
    # Function name : userAdd
    # Author        :
    # Created Date  : 18-05-2022
    # Purpose       : Staff add
    #                 
    #                 
    # Params        : Request $request
    /*****************************************************/

    public function userAdd(Request $request)
    {
        $this->data['page_title']='Staff Create ';
        $this->data['panel_title']='Staff Create ';
        $allRole= Role::where('status','=','A')->where('is_deleted','=','N')->where('id','!=','1')->get();


     try
        {
        	if ($request->isMethod('POST'))
        	{
				$validationCondition = array(
                    
                    'name'               => 'required|min:2|max:255',
                    'email'                 => 'required|email',
                    'phone'                 => 'required',
                    'password'              => 'required',
                    'confirm_password' => 'required|same:password',
				);
				$validationMessages = array(
					
                    'name.required'                 =>  'Please enter Name' , 
                    'name.min'                      => ' Name should be should be at least 2 characters',
                    'name.max'                      => ' Name should not be more than 255 characters', 
					'email.required'                => 'Please provide email id',
                    'email.email'                   => 'Please provide a valid email id',
                    'phone.required'                => 'Please provide Phone Number',
                   
                    'password.required'              => 'Password is required.',
                    'confirm_password.required'       => 'Confirm Password is required.',
                    'confirm_password.same'             => 'Confirm Password should be same as password.',
				);

				$Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
				if ($Validator->fails()) {
					return redirect()->route('admin.user-management.user.add')->withErrors($Validator)->withInput();
				} else {


                    $new = new User;
                    $new->name = trim($request->name, ' ');
                    $new->email  = $request->email;
                    $new->phone  = $request->phone;
                    $new->password  = $request->confirm_password;
                    $new->role_id = $request->role_id;
                    $new->status = $request->status;
                    $new->usertype = 'SA';
                    $new->setting_json= '{"timezone":"Asia/Kolkata","date_format":"Y-m-d"}';
                  
                    $new->created_by  = Auth::guard('admin')->user()->id;
                    $new->updated_by  = Auth::guard('admin')->user()->id;
                    $saveFunction = $new->save();

					if ($saveFunction) {
                
						$request->session()->flash('alert-success', 'User has been added successfully');
						return redirect()->route('admin.user-management.user.list');
					} else {
						$request->session()->flash('alert-danger', 'An error occurred while adding the User');
						return redirect()->back();
					}
				}
			}
			return view('admin.usermanagement.user-add',$this->data, ['allRole'=>$allRole]);
		} catch (Exception $e) {
			return redirect()->route('user-management.user.list')->with('error', $e->getMessage());
		}

    
    }

    /*****************************************************/
    # UserController
    # Function name : userEdit
    # Author        :
    # Created Date  : 18-05-2022
    # Purpose       : User edit
    #                 
    #                 
    # Params        : Request $request $encryptString
    /*****************************************************/

    public function userEdit(Request $request, $encryptString){
        $this->data['page_title']='Staff Edit';
        $this->data['panel_title']='Staff Edit';
        $userId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = User::with(['roleData'])->findOrFail($userId);
        $this->data['allRole']= Role::where('status','=','A')->where('is_deleted','=','N')->where('id','!=','1')->get();
        try
        {
            if ($request->isMethod('POST')) {
                if ($userId == null) {
                    return redirect()->route('admin.user-management.user.list');
                }
                $validationCondition = array(
                    'name'               => 'required|min:2|max:255',
                    'email'                 => 'required|email',
                    'phone'                 => 'required', 
                );
                if(!empty($request->password)){
                    $validationCondition['confirm_password']='required|same:password';
                }
                if($details->usertype != 'FU'){
                    $validationCondition['role_id']='required';
                }
               
                $validationMessages = array(
                    'name.required'                 =>  'Please enter Name' , 
                    'name.min'                      => ' Name should be should be at least 2 characters',
                    'name.max'                      => ' Name should not be more than 255 characters', 
					'email.required'                => 'Please provide email id',
                    'email.email'                   => 'Please provide a valid email id',
                    'phone.required'                => 'Please provide Phone Number',
                    'role_id.required'              => 'Please Choose Role.',
                    'confirm_password.required'      => "Confirm Password value should be same as password.",
                    'confirm_password.same'         =>  "Confirm Password value should be same as password.",
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.user-management.user-edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                    
                    $details->name        = trim($request->name, ' ');
                    $details->email   = $request->email;
                    $details->phone   = $request->phone;
                    $details->status   = $request->status;
                    $details->created_by  = Auth::guard('admin')->user()->id;
                    $details->role_id = $request->role_id;
                    if(!empty($request->password))
                        $details->password   = $request->password;  // when password has value.
                        //dd($details);
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                        if($details->usertype !='FU')
                            return redirect()->route('admin.user-management.user.list')
                                        ->with('success','User has been updated successfully');
                        else
                            return redirect()->route('admin.user-management.site.user.list')
                                             ->with('success','User has been updated successfully');

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
        return view('admin.usermanagement.user-edit',$this->data);
    }

    public function userChangePassword(Request $request, $encryptString){


        
        $this->data['page_title']='User Change Password';
        $this->data['panel_title']='User Change Password';
        $userId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = User::findOrFail($userId);
        
       
       
            if ($request->isMethod('POST')) {
                if ($userId == null) {
                    return redirect()->route('admin.user-management.user.list');
                }
               
                if(!empty($request->password)){
                    $validationCondition['confirm_password']='required|same:password';
                }
               
               
                $validationMessages = array(
                   
                    'confirm_password.required'      => "Confirm Password value should be same as password.",
                    'confirm_password.same'         =>  "Confirm Password value should be same as password.",
                    
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.user-management.user-changepassword', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                  
                
                    
                    if(!empty($request->password))
                        $details->password   = $request->password;  // when password has value.
                        //dd($details);
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                            return redirect()->route('admin.user-management.user.list')
                                    ->with('success','User password has been changed successfully');
                    
                    } else {  
                         return redirect()->back()
                                        ->with('error','An error occurred while updating the User.');
                    }
                }
            }
      

        $this->data['details']=$details;
        $this->data['encryptCode'] = $encryptString;
        return view('admin.usermanagement.password-change',$this->data);
    }


    /*****************************************************/
    # UserController
    # Function name : userDelete
    # Author        :
    # Created Date  : 20-07-2020
    # Purpose       : User Delete
    #                 
    #                 
    # Params        : Request $request $encryptString
    /*****************************************************/


    public function userDelete(Request $request,$encryptString)
    {
       
        $userId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = User::findOrFail($userId);

        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.user-management.user.list')->with('success','User has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }

    /*****************************************************/
    # UserController
    # Function name : resetuserStatus
    # Author        :
    # Created Date  : 20-07-2020
    # Purpose       : User Status Change
    #                 
    #                 
    # Params        : Request $request $encryptString
    /*****************************************************/

    public function resetuserStatus(Request $request){
    
        $response['has_error']=1;
        $response['msg']="Something went wrong.Please try again later.";

        $userId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.

        $userObj = User::findOrFail($userId);
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

    
     /*****************************************************/
    # UserController
    # Function name : frontuserList
    # Author        :
    # Created Date  : 20-05-2022
    # Purpose       : Display Frontend user  listing
    #                 
    #                 
    # Params        : Request $request
    /*****************************************************/

    public function frontuserList(Request $request){
        $this->data['page_title']="User List";
        $this->data['panel_title']="User List";
        
        return view('admin.usermanagement.front-user-list',$this->data);
    }

    public function frontuserListTable(Request $request){
        $data = User::where('is_deleted','=','N')->where('usertype','=','FU')->with(['roleData'])->orderBy('id','desc')->get();
        $settingObj=$this->getCurrentUserSettingsData();
        $finalResponse= Datatables::of($data)
            ->addColumn('updated', function ($model) use ($settingObj) {
                // dd($settingObj);
                $date = \Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at, 'UTC');
                // $formattedDate=$date->setTimezone($settingObj->timezone)->format($settingObj->date_format.' '.$settingObj->time_format);
                return $date;
            })
            ->addColumn('status', function ($model) {
                $statuslink= route('admin.user-management.front-reset-user-status',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                if(checkFunctionPermission("user-management.front-reset-user-status")){
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
           ->addColumn('action', function ($model) {
                $editlink = route('admin.user-management.front-user-edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $deletelink= route('admin.user-management.front-user-delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $changepassword= route('admin.user-management.user-changepassword',  encrypt($model->id, Config::get('Constant.ENC_KEY')));

                $actions='<div class="btn-group btn-group-sm ">';
                if(checkFunctionPermission("user-management.front-user-edit")){
                    $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                }
                if(checkFunctionPermission("user-management.front-user-delete")){
                    $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                }
                //$actions .='<a href="' . $changepassword . '" class="btn btn-info" id=""><i class="fa fa-key"></i></a>';
                $actions .='</div>';
                return $actions;

                
            })
            ->rawColumns(['updated','action','status'])
            ->make(true);
            
            return $finalResponse;

    }
       /*****************************************************/
    # UserController
    # Function name : frontuserAdd
    # Author        :
    # Created Date  : 18-05-2022
    # Purpose       : User add
    #                 
    #                 
    # Params        : Request $request
    /*****************************************************/

    public function frontuserAdd(Request $request)
    {
        $this->data['page_title']='User Create ';
        $this->data['panel_title']='User Create ';
        $allRole= Role::where('status','=','A')->where('is_deleted','=','N')->where('id','!=','1')->get();


     try
        {
        	if ($request->isMethod('POST'))
        	{
				$validationCondition = array(
                    
                    'name'                  => 'required|min:2|max:255',
                    'email'                 => 'required|email|unique:users,email',
                    'phone'                 => 'required',
                    'company_name'           => 'required',
                    'password'              => 'required',
                    'confirm_password' => 'required|same:password',
				);
				$validationMessages = array(
					
                    'name.required'                 =>  'Please enter Name' , 
                    'name.min'                      => ' Name should be should be at least 2 characters',
                    'name.max'                      => ' Name should not be more than 255 characters', 
					'email.required'                => 'Please provide email id',
                    'email.email'                   => 'Please provide a valid email id',
                    'phone.required'                => 'Please provide Phone Number',
                    'company_name.required'                => 'Please enter company name',
                   
                    'password.required'              => 'Password is required.',
                    'confirm_password.required'       => 'Confirm Password is required.',
                    'confirm_password.same'             => 'Confirm Password should be same as password.',
				);

				$Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
				if ($Validator->fails()) {
					return redirect()->route('admin.user-management.front-user.add')->withErrors($Validator)->withInput();
				} else {


                    $new = new User;
                    $new->name = trim($request->name, ' ');
                    $new->email  = $request->email;
                    $new->phone  = $request->phone;
                    $new->company_name  = $request->company_name;
                    $new->password  = $request->confirm_password;
                    $new->role_id = 4;
                    $new->status = 'I';
                    $new->usertype = 'FU';
                    $new->setting_json= '{"timezone":"Asia/Kolkata","date_format":"Y-m-d"}';
                  
                    $new->created_by  = Auth::guard('admin')->user()->id;
                    $new->updated_by  = Auth::guard('admin')->user()->id;
                    $saveFunction = $new->save();
					if ($saveFunction) {
                        //Send activation link to registered mail id
                        $encryptUserId = encrypt( $new->id, Config::get('Constant.ENC_KEY')); // Encrypted user id using helper
                        $statusLink = route('admin.active.link' ,['encryptCode'=>$encryptUserId ]); //making activation link
                        $toUser =$request->email;
                     try{
                            $fromUser = env('MAIL_FROM_ADDRESS'); // getting data form .env file
                            $subject = 'User Activation Link';
                            $mailData = array('activationLink' => $statusLink);
                            // Send mail
                            Mail::send('email.activation-link', $mailData, function ($sent) use ($toUser, $fromUser, $subject) {
                                $sent->from($fromUser)->subject($subject);
                                $sent->to($toUser);
                            });
                            return redirect()->route('admin.user-management.front-user.list')
                            ->with('success','User has been added successfully');
                        }catch(Exception $e){
                           $response = $e->getMessage();
                           \Log::channel('command')->info("Mail issue log: " . $response);

                        }
                
					
					} else {
						$request->session()->flash('alert-danger', 'An error occurred while adding the User');
						return redirect()->back();
					}
				}
			}
			return view('admin.usermanagement.front-user-add',$this->data, ['allRole'=>$allRole]);
		} catch (Exception $e) {
			return redirect()->route('user-management.front-user.list')->with('error', $e->getMessage());
		}

    
    }

      /*****************************************************/
    # UserController
    # Function name : frontuserEdit
    # Author        :
    # Created Date  : 20-05-2022
    # Purpose       : front User edit
    #                 
    #                 
    # Params        : Request $request $encryptString
    /*****************************************************/

    public function frontuserEdit(Request $request, $encryptString){
        $this->data['page_title']='User Edit';
        $this->data['panel_title']='User Edit';
        $userId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = User::with(['roleData'])->findOrFail($userId);
        $this->data['allRole']= Role::where('status','=','A')->where('is_deleted','=','N')->where('id','!=','1')->get();
        try
        {
            if ($request->isMethod('POST')) {
                if ($userId == null) {
                    return redirect()->route('admin.user-management.front-user.list');
                }
                $validationCondition = array(
                    'name'               => 'required|min:2|max:255',
                    'email'                 => 'required|email',
                    'phone'                 => 'required', 
                );
                if(!empty($request->password)){
                    $validationCondition['confirm_password']='required|same:password';
                }
                if($details->usertype != 'FU'){
                    $validationCondition['role_id']='required';
                }
               
                $validationMessages = array(
                    'name.required'                 =>  'Please enter Name' , 
                    'name.min'                      => ' Name should be should be at least 2 characters',
                    'name.max'                      => ' Name should not be more than 255 characters', 
					'email.required'                => 'Please provide email id',
                    'email.email'                   => 'Please provide a valid email id',
                    'phone.required'                => 'Please provide Phone Number',
                    'company_name.required'         => 'Please provide Company name',
                    'role_id.required'              => 'Please Choose Role.',
                    'confirm_password.required'      => "Confirm Password value should be same as password.",
                    'confirm_password.same'         =>  "Confirm Password value should be same as password.",
                  
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.user-management.front-user-edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                    
                    $details->name        = trim($request->name, ' ');
                    $details->email   = $request->email;
                    $details->phone   = $request->phone;
                    $details->company_name   = $request->company_name;
                    // $details->status   = $request->status;
                    $details->created_by  = Auth::guard('admin')->user()->id;
                    if(!empty($request->password))
                        $details->password   = $request->password;  // when password has value.
                        //dd($details);
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                            return redirect()->route('admin.user-management.front-user.list')
                                        ->with('success','User has been updated successfully');
                       

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
        return view('admin.usermanagement.front-user-edit',$this->data);
    }

        /*****************************************************/
    # UserController
    # Function name : frontuserDelete
    # Author        :
    # Created Date  : 20-05-2022
    # Purpose       : Front User Delete
    #                 
    #                 
    # Params        : Request $request $encryptString
    /*****************************************************/


    public function frontuserDelete(Request $request,$encryptString)
    {
       
        $userId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = User::findOrFail($userId);

        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.user-management.front-user.list')->with('success','User has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }

       /*****************************************************/
    # UserController
    # Function name : frontresetuserStatus
    # Author        :
    # Created Date  : 20-07-2020
    # Purpose       : FRont User Status Change
    #                 
    #                 
    # Params        : Request $request $encryptString
    /*****************************************************/

    public function frontresetuserStatus(Request $request){
    
        $response['has_error']=1;
        $response['msg']="Something went wrong.Please try again later.";

        $userId = decrypt($request->encryptCode, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.

        $userObj = User::findOrFail($userId);
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


    public function activelink(Request $request, $encryptString)
    {
        if (Auth::guard('frontenduser')->check()) {
            // If user is logged in, redirect him/her to dashboard page //
            return Redirect::Route('dashboard');
        } else {
            try
            {
                        $userId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
                        $user = User::findOrFail($userId);
                        // print_r($user);die;
                        if (!empty($user)) {
                            $user->status = 'A';
                            $user->email_verified_at = Carbon::now();
                            $user->save();
                            return Redirect::Route('login')->with('success', 'Your email has been verified.Kindly login');
                        } 
                    
                
            } catch (Exception $e) {
                return Redirect::Route('login')->with('error', $e->getMessage());
            }
        }
    }




    
   

    

    
   



}

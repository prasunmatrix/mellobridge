<?php

namespace App\Http\Controllers\V1\admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper, AdminHelper, Image, Auth, Hash, Redirect, Validator, View;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\User;
use App\Models\Mastershipment;

use Yajra\Datatables\Datatables;
use Config;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public $data = array();             // set global class object

    /*****************************************************/
    # DashboardController
    # Function name : dashboardView
    # Author        :
    # Created Date  : 03-06-2022
    # Purpose       : Dashboard View
    #                 
    #                 
    # Params        : 
    /*****************************************************/

    public function dashboardView()
    {
        $this->data['page_title'] = 'Control Panel | Dashboard';
        $this->data['panel_title'] = 'Admin Dashboard';
        $this->data['total_user']=User::where('is_deleted','=','N')
                                ->where('usertype','=','FU')
                                ->get()
                                ->count();
        $this->data['total_shipment']=Mastershipment::where('is_deleted','=','N')
                                    ->get()
                                    ->count();
        $this->data['total_payment']=Mastershipment::where('is_deleted','=','N')
                                    ->where('is_paid','=',1)
                                    ->sum('client_profit_price');  
        $this->data['todays_payment']=Mastershipment::where('is_deleted','=','N')
                                    ->where('is_paid','=',1)
                                    ->whereDate('created_at', Carbon::today())
                                    ->sum('postage_amount');                                                   

        return view('admin.dashboard.index', $this->data);
    }

   

    public function showChangePasswordForm()
    {
        $this->data['page_title'] = 'Control Panel | Change Password';
        $this->data['panel_title'] = 'Change Password';
        

        return view('admin.dashboard.changepassword', $this->data);
    }

    /*****************************************************/
    # DashboardController
    # Function name : changePassword
    # Author        :
    # Created Date  : 13-05-2022
    # Purpose       : Change Password
    #                 
    #                 
    # Params        : Request $request
    /*****************************************************/


    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current_password'), Auth::guard('admin')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        } else {
            try {

                $validationCondition = [
                    'new_password' => 'required',
                    'confirm_password' => 'required|same:new_password',
                ];

                $validationMessages = array(
                    'new_password.required' => 'New Password is required.',
                    'confirm_password.required' => 'Confirm Password is required.',
                    'confirm_password.same' => 'Confirm Password should be same as new password.',
                );

                $Validator = Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    // If validation error occurs, load the error listing
                    return redirect()->back()->withErrors($Validator);
                } else {
                    $user = User::findOrFail(Auth::guard('admin')->user()->id);
                    $user->password = $request->new_password;
                    $saveResposne = $user->save();
                    if ($saveResposne == true) {
                        return redirect()->back()->with("success", "Password changed successfully !");
                    } else {
                        return redirect()->back()->with("error", "Password changed successfully !");
                    }
                }

            } catch (Exception $e) {
                return Redirect::Route('admin.changePassword')->with('error', $e->getMessage());
            }

        }
    }

  



}

<?php

namespace App\Http\Controllers\V1\admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper, AdminHelper, Image, Auth, Hash, Redirect, Validator, View;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\Mastercoupon;
use Yajra\Datatables\Datatables;
use Config;
use DB;
use Carbon\Carbon;

class CouponController extends Controller
{
    public $data = array();             // set global class object

     
    public function couponList(Request $request){
        $this->data['page_title']="Coupon List";
        $this->data['panel_title']="Coupon List";
        return view('admin.coupon.list',$this->data);
    }

    public function couponListTable(Request $request){

        // $data = DB::table('coupon')->where('is_deleted', 'N')->orderBy('id','desc')->get();
           $data =  Mastercoupon::
                    select([
                        'users.name',
                        'user_coupon.coupon_code',
                        'user_coupon.valid_from',
                        'user_coupon.valid_upto',
                        'user_coupon.discount_amount',
                        'user_coupon.id',
                    ])
                    ->join('users', 'users.id', 'user_coupon.user_id')
                    ->where('user_coupon.is_deleted', 'N')
                    ->orderBy('user_coupon.id','desc')
                    ->get();
        $finalResponse= Datatables::of($data)
           ->addColumn('action', function ($model) {
                $deletelink= route('admin.coupon-delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $editlink= route('admin.coupon.edit',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                
                if(checkFunctionPermission("coupon.edit")){
                    $actions .='<a href="' . $editlink . '" class="btn btn-info" id=""><i class="fas fa-edit"></i></a>';
                }
                if(checkFunctionPermission("coupon-delete")){
                    $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                    }
                $actions .='</div>';
                return $actions;

            })
            ->rawColumns(['action'])
            ->make(true);
            return $finalResponse;

    }

    public function couponAdd(Request $request)
    {
        $this->data['page_title']='Coupon Code Create ';
        $this->data['panel_title']='Coupon Code Create ';
        $this->data['userList'] = DB::table('users')->where('is_deleted', 'N')->where('status','A')->where('usertype','FU')->orderBy('id','desc')->get();

     try
        {
        	if ($request->isMethod('POST'))
        	{
				$validationCondition = array(
                    
                    'name'               => 'required',
                    'valid_from'         => 'required',
                    'valid_upto'         => 'required',
                    'amount'             => 'required|numeric',
				);
				$validationMessages = array(
					
                    'name.required'                 =>  'Please select any user' , 
					'valid_from.required'              => 'Please select Date ',
                    'valid_upto.required'              => 'Please select Date',
                    'amount.required'         => 'Please enetr discount amount',				);

				$Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
				if ($Validator->fails()) {
					return redirect()->route('admin.coupon-add')->withErrors($Validator)->withInput();
				} else {


                    $new = new Mastercoupon;
                    $new->user_id = $request->name;
                    $new->coupon_code  = 'MB-'.rand(10000,99999);
                    $new->valid_from  = $request->valid_from;
                    $new->valid_upto  = $request->valid_upto;
                    $new->discount_amount = $request->amount;
                    $new->created_by  = Auth::guard('admin')->user()->id;
                    $new->created_at  = Carbon::now();
                    $saveFunction = $new->save();

					if ($saveFunction) {
                
						$request->session()->flash('alert-success', 'Coupon has been added successfully');
						return redirect()->route('admin.coupon.list');
					} else {
						$request->session()->flash('alert-danger', 'An error occurred while adding the User');
						return redirect()->back();
					}
				}
			}
			return view('admin.coupon.add',$this->data);
		} catch (Exception $e) {
			return redirect()->route('coupon.list')->with('error', $e->getMessage());
		}

    
    }

    public function couponEdit(Request $request, $encryptString){
        $this->data['page_title']='Coupon Edit';
        $this->data['panel_title']='Coupon Edit';
        $this->data['userList'] = DB::table('users')->where('is_deleted', 'N')->where('status','A')->where('usertype','FU')->orderBy('id','desc')->get();

        $couponId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Mastercoupon::
                    select([
                        'users.name',
                        'users.id as user_id',
                        'user_coupon.coupon_code',
                        'user_coupon.valid_from',
                        'user_coupon.valid_upto',
                        'user_coupon.discount_amount',
                        'user_coupon.id',
                    ])
                    ->join('users', 'users.id', 'user_coupon.user_id')
                    ->where('user_coupon.is_deleted', 'N')
                    ->where('user_coupon.id', $couponId)
                    ->first();
        try
        {
            if ($request->isMethod('POST')) {
                if ($couponId == null) {
                    return redirect()->route('admin.coupon.edit');
                }
                $validationCondition = array(
                    'name'               => 'required',
                    'valid_from'         => 'required',
                    'valid_upto'         => 'required',
                    'amount'             => 'required|numeric',
                );
               
                $validationMessages = array(
                    'name.required'                 =>  'Please select any user' , 
					'valid_from.required'              => 'Please select Date ',
                    'valid_upto.required'              => 'Please select Date',
                    'amount.required'         => 'Please enetr discount amount',
                  
                );
                
                $Validator = \Validator::make($request->all(), $validationCondition, $validationMessages);
                if ($Validator->fails()) {
                    return Redirect::Route('admin.coupon.edit', ['encryptCode' => $encryptString])->withErrors($Validator);
                } else {
                    
                    
                    $details->user_id = $request->name;
                    $details->valid_from   = $request->valid_from;
                    $details->valid_upto   = $request->valid_upto;
                    $details->discount_amount   = $request->amount;
                    // $details->status   = $request->status;
                    $details->updated_by  = Auth::guard('admin')->user()->id;
                    $saveEvent = $details->save();
                    if ($saveEvent) {
                            return redirect()->route('admin.coupon.list')
                                        ->with('success','Coupon has been updated successfully');
                       

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
        return view('admin.coupon.edit',$this->data);
    }
   

    public function couponDelete(Request $request,$encryptString)
    {
       
        $CouponId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Mastercoupon::findOrFail($CouponId);
        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.coupon.list')->with('success','This detail has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }

    

}

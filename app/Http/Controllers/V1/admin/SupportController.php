<?php

namespace App\Http\Controllers\V1\admin;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helper, AdminHelper, Image, Auth, Hash, Redirect, Validator, View;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\User;
use App\Models\Mastersupport;
use Yajra\Datatables\Datatables;
use Config;
use App\Imports\CountryDataImport;
use Excel;
use DB;
use Carbon\Carbon;

class SupportController extends Controller
{
    public $data = array();             // set global class object

     
    public function supportList(Request $request){
        $this->data['page_title']="Support List";
        $this->data['panel_title']="Support List";
        return view('admin.support.list',$this->data);
    }

    public function supportListTable(Request $request){

        $data = DB::table('support')->where('is_deleted', 'N')->orderBy('id','desc')->get();
        $finalResponse= Datatables::of($data)
           ->addColumn('action', function ($model) {
                $deletelink= route('admin.support-delete',  encrypt($model->id, Config::get('Constant.ENC_KEY')));
                $actions='<div class="btn-group btn-group-sm ">';
                if(checkFunctionPermission("support.delete")){
                $actions .='<a href="javascript:void(0)" data-redirect-url="'.$deletelink.'" class="btn btn-danger delete-alert" id="button"><i class="fas fa-trash"></i></a>';
                }
                $actions .='</div>';
                return $actions;

            })
            ->rawColumns(['action'])
            ->make(true);
            return $finalResponse;

    }
   

    public function supportDelete(Request $request,$encryptString)
    {
       
        $SupportId = decrypt($encryptString, Config::get('Constant.ENC_KEY')); // get user-id After Decrypt with salt key.
        $details = Mastersupport::findOrFail($SupportId);

        
        if ($details) {
            $details->deleted_at=Carbon::now();
            $details->deleted_by=\Auth::guard('admin')->user()->id;
            $details->is_deleted='Y';
            $details->save();
            return redirect()->route('admin.support.list')->with('success','This detail has been deleted successfully!');
        } else {
            $request->session()->flash('alert-danger', 'An error occurred while deleting the User');
             return redirect()->back();
        }
    }

    

}

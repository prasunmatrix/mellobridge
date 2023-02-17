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
use PDF;
use DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public $data = array();             // set global class object

         //Report listing
    public function reportList(Request $request){
        $this->data['page_title']="Report List";
        $this->data['panel_title']="Report List";
        
        return view('admin.report.list',$this->data);
    }

    public function reportListTable(Request $request){
            $status = $request->status;
            $date='';
            if($request->status !=''){

                if($request->status ==1){
                    $date =date("Y-m-d");
                }
                $data = DB::table('transactions')
                    ->select('users.name','users.id','users.email','transactions.user_id','transactions.transaction_id','transactions.amount','transactions.transaction_date')
                    ->join('users', 'users.id', '=', 'transactions.user_id')
                    ->where('transactions.is_deleted', 'N')
                    ->whereBetween('transactions.transaction_date',[$date,$date])
                    ->orderBy('transactions.id','desc')
                    ->get();
            }else{
                $data = DB::table('transactions')
                ->select('users.name','users.id','users.email','transactions.user_id','transactions.transaction_id','transactions.amount','transactions.transaction_date')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                ->where('transactions.is_deleted', 'N')
                ->orderBy('transactions.id','desc')
                ->get();

            }
            // print_r($data);die;
            $finalResponse= Datatables::of($data)
                          ->make(true);
            return $finalResponse;

    }

    public function downloadtransactionPdf(Request $request) {

        // Fetch all rows from database
        $data = [];
        $status=$request->status;
        $customer_transaction = DB::table('transactions')
                            ->select('users.name','users.id','users.email','transactions.user_id','transactions.transaction_id','transactions.amount','transactions.transaction_date')
                            ->join('users', 'users.id', '=', 'transactions.user_id')
                            ->where('transactions.is_deleted', 'N')
                            ->orderBy('transactions.id','desc')
                            ->get();
        // print_r($customer_transaction[0]->name);die;                    
        $data['transactions']=  $customer_transaction ; 
        $date=date("Y-m-d"); 
        $file_name ='Reprort'.'-'.$date;
        ob_end_clean();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('admin.report.transaction_pdf', $data);
        // Finally, you can download the file using download function
        return $pdf->download($file_name . '.pdf');
    }

  

  
  
        
  
   
    

}

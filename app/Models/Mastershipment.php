<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Helpers\Helper;
use DB;
use Auth;

class Mastershipment extends Authenticatable {

    use Notifiable;

    protected $table = 'shipments';
    protected $guarded = ['id'];
    protected $fillable = ['request_id','order_id','phone_number','state_id','state_name','reatil_value','parcel_description','package_content','country_name','first_name','last_name','is_signature_confirm','user_id','from_address','to_address','weight','weight_unit','reference','postmark_date','status_code','status','postage_amount','discounted_amount','total_amount','is_paid','estimated_delivery_days','tracking_numbers','pricing','mail_class','shape','width','height','length','shape_unit','fees_amount','is_insurance','client_profit_price','insurance_price','totalpay','shiping_date','refund_detail','shipping_status','updated_by','is_deleted','deleted_at','deleted_by'];

    public function getTable() {
        return $this->table;
    }




 

}

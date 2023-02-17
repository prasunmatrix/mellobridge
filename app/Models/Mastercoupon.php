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

class Mastercoupon extends Authenticatable {

    use Notifiable;

    protected $table = 'user_coupon';
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'coupan_code','created_at','is_deleted','deleted_by','deleted_at'];

    public function getTable() {
        return $this->table;
    }




 

}

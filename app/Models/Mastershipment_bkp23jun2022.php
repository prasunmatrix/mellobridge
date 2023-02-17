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
    // protected $fillable = ['tracking_numbers', 'total_amount','created_at', 'updated_at','updated_by','is_deleted'];

    public function getTable() {
        return $this->table;
    }




 

}

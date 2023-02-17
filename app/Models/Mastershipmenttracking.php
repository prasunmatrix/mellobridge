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

class Mastershipmenttracking extends Authenticatable {

    use Notifiable;

    protected $table = 'shipment_tracking';
    protected $guarded = ['id'];
    protected $fillable = ['tracking_number', 'tracking_details'];

    public function getTable() {
        return $this->table;
    }




 

}

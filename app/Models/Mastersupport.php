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

class Mastersupport extends Authenticatable {

    use Notifiable;

    protected $table = 'support';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'query','created_at', 'updated_at','updated_by','is_deleted','deleted_by','deleted_at'];

    public function getTable() {
        return $this->table;
    }




 

}

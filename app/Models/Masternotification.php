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

class Masternotification extends Authenticatable {

    use Notifiable;

    protected $table = 'notification';
    protected $guarded = ['id'];
    protected $fillable = ['message','created_at','is_deleted'];

    public function getTable() {
        return $this->table;
    }




 

}

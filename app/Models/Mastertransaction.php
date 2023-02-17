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

class Mastertransaction extends Authenticatable {

    use Notifiable;

    protected $table = 'transaction';
    protected $guarded = ['id'];
    protected $fillable = ['amount','transaction_id	','user_id'];

    public function getTable() {
        return $this->table;
    }




 

}

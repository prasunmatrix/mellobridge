<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Helpers\Helper;
use DB;
use Auth;

class Customer extends Authenticatable {

    use Notifiable;

    protected $table = 'customers';
    protected $guarded = ['id'];
    protected $fillable = ['first_name', 'last_name', 'email', 'customer_type_id', 'dob','created_at', 'updated_at', 'created_by', 'updated_by'];
    protected $hidden = ['password', 'remember_token'];

    public function getTable() {
        return $this->table;
    }




 

}

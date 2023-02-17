<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MasterCountry extends Model 
{
    protected $table = 'country';
    protected $fillable = ['country_name','country_code'];
        
}
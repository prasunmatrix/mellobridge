<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InsurancePrice extends Model 
{
    protected $table = 'settings';
    protected $fillable = ['id','insurance_price'];
        
}
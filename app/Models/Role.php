<?php
/*****************************************************/
# Role
# Page/Class name   : Role
# Author            :
# Created Date      : 15-07-2020
# Functionality     : Table declaration
# Purpose           : Table declaration
/*****************************************************/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    /*****************************************************/
    # Role
    # Function name : createdBy
    # Author        :
    # Created Date  : 15-07-2020
    # Purpose       : Relation between User table
    # Params        : 
    /*****************************************************/
    public function createdBy(){

        return $this->belongsTo('App\Models\User','created_by');
    }
}

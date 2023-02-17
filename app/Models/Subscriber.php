<?php

/*****************************************************/
# Subscriber
# Page/Class name   : Subscriber
# Author            :
# Created Date      : 15-07-2020
# Functionality     : Table declaration
# Purpose           : Table declaration
/*****************************************************/
namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{

    public function subscribercategoryData()
    {
        return $this->hasMany('App\Models\SubscriberCategory', 'subscriber_id');
    }
  
   

}
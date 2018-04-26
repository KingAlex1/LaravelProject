<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function games(){
        return $this->hasMany('App\Game','id','order_id');
    }
}



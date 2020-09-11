<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    public function item(){
        return $this->belongsToMany('App\Item')->withPivot('qty','total');
//        return $this->belongsToMany('App\Item','order_details','order_id','item_id','quantity');
//        return $this->belongsToMany('App\Item','item_id');
    }
}

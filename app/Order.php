<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function detail(){
        return $this->hasMany('App\Detail');
    }
    public  function user(){
        return $this->belongsTo('App\User');
    }
//    public function item(){
//        return $this->belongsToMany('App\Item','order_details','order_id','item_id','quantity');
//
//    }

//    public function item(){
//        return $this->belongsToMany('App\Item','order_details');
//        return $this->belongsToMany('App\Item')->withPivot('qty','total');
//        return $this->belongsToMany('App\Item','order_details','order_id','item_id','quantity');
//        return $this->belongsToMany('App\Item','item_id');
//    }
//    public  function user(){
//        return $this->belongsTo('App/User');
//    }
}

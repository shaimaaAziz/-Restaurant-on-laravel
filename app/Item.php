<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public  function category(){
        return $this->belongsTo('App\Category');
    }
    public  function detail(){
        return $this->hasMany('App\Detail');
    }
    public  function cart(){
        return $this->belongsTo('App\Cart');
    }


}

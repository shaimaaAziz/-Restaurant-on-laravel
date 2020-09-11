<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    public  function order(){
        return $this->belongsTo('App\Order');
    }

    public function item(){
        return $this->belongsTo('App\Item');

    }
}

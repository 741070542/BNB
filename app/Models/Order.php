<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function color(){
        return $this->belongsTo('App\Models\Color','color');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type','type_id');
    }
    public function house(){
        return $this->belongsTo('App\Models\House','house_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function source(){
        return $this->belongsTo('App\Models\Source','source_id');
    }
}

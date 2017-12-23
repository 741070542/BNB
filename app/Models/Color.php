<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    public function orders(){
        return $this->hasMany('App\Models\Orders','color_id');
    }
}

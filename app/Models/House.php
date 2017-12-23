<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //
    public function channels(){
        return $this->hasMany('App\Models\Channel','house_id');
    }
}

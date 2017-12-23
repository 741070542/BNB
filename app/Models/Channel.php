<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function house(){
        return $this->belongsTo('App\Models\House');
    }
}

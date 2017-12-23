<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens,Notifiable;

    public function colors(){
        return $this->hasMany('App\Models\Color','user_id');
    }
    public function houses(){
        return $this->hasMany('App\Models\House','user_id');
    }
    public function orders(){
        return $this->hasMany('App\Models\Order','user_id');
    }
    public function sources(){
        return $this->hasMany('App\Models\Source','user_id');
    }
    public function Statistics(){
        return $this->hasMany('App\Models\Statistic','user_id');
    }
    public function types(){
        return $this->hasMany('App\Models\Type','user_id');
    }
}

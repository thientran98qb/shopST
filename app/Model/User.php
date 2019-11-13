<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role',  'users','id');
    }
    public function bill(){
        return $this->hasMany('App\Model\Bill','user_id','id');
    }
}

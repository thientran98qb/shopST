<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table="users";
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role',  'role_id','id');
    }
    public function bill(){
        return $this->hasMany('App\Model\Bill','user_id','id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function Users()
    {
        return $this->hasMany('App\User','role_id','id');
    }
}

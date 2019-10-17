<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table="bills";
    public function user(){
        return $this->belongsTo('App\Model\User','user_id','id');
    }
    public function billproduct(){
        return $this->hasMany('App\Model\BillProduct','bill_id','id');
    }
}

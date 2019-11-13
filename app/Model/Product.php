<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function billProduct(){
        return $this->hasMany('App\Model\BillProduct','product_id','id');
    }
    public function category(){
        return $this->belongsTo('App\Model\Category','category_id','id');
    }
    public function detailProduct()
    {
        return $this->hasOne('App\Model\DetailProduct');
    }
}

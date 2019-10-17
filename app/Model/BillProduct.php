<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    protected $table="billproducts";
    public function bill(){
        return $this->belongsTo('App\Model\Bill','bill_id','id');
    }
    public function product(){
        return $this->belongsTo('App\Model\Product','product_id','id');
    }
}

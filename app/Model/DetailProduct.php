<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    public function product()
    {
        return $this->hasOne('App\Model\Product');
    }
}

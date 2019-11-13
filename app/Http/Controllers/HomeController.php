<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex(){
        return view('frontend.home.home');
    }
    public function getloaiSP(){
        return view('frontend.products.type_product');
    }
    public function getdetailSP(){
        return view('frontend.detailproducts.detailproduct');
    }
}

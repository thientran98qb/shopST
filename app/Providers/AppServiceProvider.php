<?php

namespace App\Providers;

use App\Model\Category;
use Illuminate\Support\ServiceProvider;
use Session;
use App\Model\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('frontend/layouts/header',function ($view){
            $loai_sp=Category::all();
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer('frontend/layouts/header',function ($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart= new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer('frontend/carts/order',function ($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart= new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }
}

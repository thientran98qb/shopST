<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@getIndex')->name('home');
Route::get('/lsp/{id}', 'HomeController@getloaiSP')->name('lsp');
Route::get('/detailsp/{id}', 'HomeController@getdetailSP')->name('detailsp');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/add-to-cart/{id}','HomeController@getAddtoCart')->name('add-to-cart');
Route::get('del-cart/{id}','HomeController@getDelItemCart')->name('del-cart');
Route::get('order','HomeController@getCheckout')->name('order');
Route::post('order','HomeController@postCheckout')->name('order');
Route::get('login','HomeController@getLogin')->name('login');
Route::post('login','HomeController@postLogin')->name('login');
Route::get('register','HomeController@getRegister')->name('register');
Route::post('register','HomeController@postRegister')->name('register');
Route::get('logout','HomeController@getLogout')->name('logout');
Route::get('search','HomeController@getSearch')->name('search');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin-'], function () {
    // show form login if not login yet
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('login', 'LoginController@handleLogin')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::group(['middleware' => 'check_admin_login'], function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'category', 'as' => 'category-'], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('/add', 'CategoryController@create')->name('add');
            Route::post('/add', 'CategoryController@store')->name('add');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
            Route::post('/edit/{id}', 'CategoryController@update')->name('edit');
            Route::get('/detail/{id}', 'CategoryController@show')->name('detail');
            Route::post('/delete/{id}', 'CategoryController@destroy')->name('delete');
        });

        Route::group(['prefix' => 'user', 'as' => 'user-'], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/add', 'UserController@create')->name('add');
            Route::post('/add', 'UserController@store')->name('add');
            Route::get('/edit/{id}', 'UserController@edit')->name('edit');
            Route::post('/edit/{id}', 'UserController@update')->name('edit');
            Route::get('/detail/{id}', 'UserController@show')->name('detail');
            Route::post('/delete/{id}', 'UserController@destroy')->name('delete');
        });


    });
});


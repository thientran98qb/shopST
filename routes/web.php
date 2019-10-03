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
Route::get('/lsp', 'HomeController@getloaiSP')->name('loaisp');
Route::get('/detailsp', 'HomeController@getdetailSP')->name('detailsp');

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


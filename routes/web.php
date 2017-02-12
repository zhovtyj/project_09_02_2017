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

Auth::routes();


/****   HomePage *****/
Route::get('/', ['uses' => 'DashboardController@index', 'as' => 'home']);


/****   Register Step 2 *****/
Route::get('/register-step-2', 'Auth\RegisterStep2Controller@index');
Route::post('/register-step-2', ['uses' => 'Auth\RegisterStep2Controller@store', 'as' => 'register2.store']);



/****   CLIENT  *****/
Route::group(['middleware'=>'roles', 'roles'=> ['client']], function(){

    //SERVICES
    Route::get('/services', ['uses' => 'ServicesController@index', 'as' => 'client.services' ]);

    //Add to cart Ajax
    Route::post('/addtocart', ['uses' => 'CartController@addToCartAjax', 'as' => 'client.addtocart' ]);


});

/****   ADMIN  *****/
Route::group(['middleware'=>'roles', 'roles'=> ['admin']], function(){

    //ADMIN
    Route::get('/admin',['uses' => 'Admin\AdminController@index', 'as' => 'admin.index' ]);

    //SERVICES
    Route::resource('admin/service', 'Admin\ServiceController');

    //USERS
    Route::resource('admin/client', 'Admin\UserController');

});
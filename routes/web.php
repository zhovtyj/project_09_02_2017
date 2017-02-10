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

//HomePage
Route::get('/', ['uses' => 'DashboardController@index', 'as' => 'home']);

//Register Step 2
Route::get('/register-step-2', 'Auth\RegisterStep2Controller@index');
Route::post('/register-step-2', ['uses' => 'Auth\RegisterStep2Controller@store', 'as' => 'register2.store']);

//Admin
Route::get('/admin',[
    'uses' => 'AdminController@index',
    'as' => 'admin.index',
    'middleware' => 'roles',
    'roles' => ['admin']
]);


//Only admin
Route::group(['middleware'=>'roles', 'roles'=> ['admin']], function(){
    //Services
    Route::resource('admin/service', 'ServiceController');
});
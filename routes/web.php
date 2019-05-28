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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','UserController@login');

Route::prefix('index')->group(function(){
    Route::get('index','IndexController@index');
});

//合同管理
Route::prefix('agree')->middleware('checklogin')->group(function(){
    Route::get('index','AgreeController@index');
    Route::get('add','AgreeController@create');
    Route::post('add_do','AgreeController@store');

});
//管理员管理
Route::prefix('/user')->group(function(){
	Route::get('index','UserController@index');
	Route::get('login','UserController@login');
	Route::post('logindo','UserController@logindo');
	Route::get('/reg','UserController@register');
	Route::get('/doreg','UserController@registerdo');
	Route::get('/email','UserController@email');
	Route::get('/registerhandle','UserController@registerhandle');
	Route::get('/logout','UserController@logout');
	Route::get('/test','UserController@test');
	
});    


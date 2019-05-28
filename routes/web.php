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


Route::prefix('/connection')->group(function(){
	Route::get('add','ConnectionController@create');
	Route::post('add_do','ConnectionController@store');
	Route::get('index','ConnectionController@index');
	Route::post('destroy','ConnectionController@destroy');
});


Route::prefix('/order')->group(function(){
	Route::get('create','OrderController@create');
});


//合同管理
Route::prefix('agree')->middleware('checklogin')->group(function(){
    Route::get('index','AgreeController@index');
    Route::get('add','AgreeController@create');
    Route::post('add_do','AgreeController@store');
    Route::post('checkOnly','AgreeController@checkOnly');

});

//分类管理
Route::prefix('category')->group(function(){
    Route::get('index','CategoryController@index');
    Route::get('add','CategoryController@create');
    Route::post('add_do','CategoryController@store');


});

//供应商管理
Route::prefix('/supplier')->group(function(){
    Route::get('index','SupplierController@index');
    Route::get('add','SupplierController@create');
    Route::post('add_do','SupplierController@store');
    Route::get('del/{id}','SupplierController@destroy');

});

Route::prefix('product')->group(function(){
    Route::get('add','ProductController@create');
    Route::post('adddo','ProductController@adddo');
    Route::get('list','ProductController@index');
    Route::post('del','ProductController@del');
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


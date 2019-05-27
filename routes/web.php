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

Route::get('/','IndexController@index');


Route::prefix('/order')->group(function(){
	Route::get('create','OrderController@create');
});


//合同管理
Route::prefix('agree')->group(function(){
    Route::get('index','AgreeController@index');
    Route::get('add','AgreeController@create');
    Route::post('add_do','AgreeController@store');


});


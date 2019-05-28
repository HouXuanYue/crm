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

Route::prefix('/market')->group(function(){
	Route::get('add','MarketController@add');
	Route::get('doadd','MarketController@doadd');
	Route::get('list','MarketController@list');
	Route::get('del','MarketController@del');

});


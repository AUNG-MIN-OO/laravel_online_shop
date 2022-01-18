<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::get('/product/detail','PageController@productDetail');

Route::group(['prefix' => 'admin','namespace' => 'Admin','as'=>'admin.'],function (){
    Route::get('/','PageController@dashboard');
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');
});

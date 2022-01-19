<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::get('/product/detail','PageController@productDetail');

Route::group(['prefix' => 'admin','namespace' => 'Admin','as'=>'admin.'],function (){
    Route::get('/','PageController@dashboard');
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');

    Route::get('/order/pending','OrderController@pendingOrder')->name('order.pending');
    Route::get('/order/complete','OrderController@completeOrder')->name('order.complete');
    Route::get('/user/list','OrderController@userList')->name('user.list');
    Route::get('/order/make/complete/{id}','OrderController@makeComplete');
});

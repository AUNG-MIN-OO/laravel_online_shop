<?php

use Illuminate\Support\Facades\Route;

#user auth
Route::group(['middleware'=>'ShareData'],function (){
    ##register
    Route::get('/register','User\AuthController@showRegister');
    Route::post('/register','User\AuthController@postRegister');
    ##login
    Route::get('/login','User\AuthController@showLogin')->name('user.login');
    Route::post('/login','User\AuthController@postLogin');
    Route::get('/logout','User\AuthController@logout');

    Route::get('/', 'PageController@index')->name('user.home');
    Route::get('/product/{slug}','PageController@productDetail');
    ##cart
    Route::get('/product/cart/add/{slug}','PageController@addToCart');
    Route::get('/cart','PageController@showCart');
});



##admin auth
Route::get('/admin/login','Admin\AuthController@showLogin');
Route::post('/admin/login','Admin\AuthController@postLogin')->name('admin.login');
Route::group(['prefix' => 'admin','namespace' => 'Admin','as'=>'admin.','middleware'=>'Admin'],function (){
    Route::get('/','PageController@dashboard')->name('dashboard');
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');

    Route::get('/order/pending','OrderController@pendingOrder')->name('order.pending');
    Route::get('/order/complete','OrderController@completeOrder')->name('order.complete');
    Route::get('/user/list','PageController@userList')->name('user.list');
    Route::get('/order/make/complete/{id}','OrderController@makeComplete');

    #logout
    Route::get('/admin/logout','AuthController@logout')->name('logout');
});

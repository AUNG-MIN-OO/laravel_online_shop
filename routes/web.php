<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::get('/product/detail','PageController@productDetail');

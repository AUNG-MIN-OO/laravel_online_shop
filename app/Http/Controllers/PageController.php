<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function productDetail(){
        return view('user.product_detail');
    }
}

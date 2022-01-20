<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        if (Auth::attempt($request->only('email','password'))){
            Alert::toast('Welcome '.Auth::user()->name,'success');
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

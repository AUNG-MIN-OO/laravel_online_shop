<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showRegister(){
        return view('user.auth.register');
    }

    public function postRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        #upload image
        $file = $request->file('image');
        $new_file_name = uniqid().$file->getClientOriginalName();
        $file_path = 'image/';
        $file->storeAs($file_path,$new_file_name);

        #save to db
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'image'=>$file_path.$new_file_name,
        ]);

        Alert::toast('Registered successfully! Please login.','success');
        return redirect()->route('user.login');
    }

    public function showLogin(){
        return view('user.auth.login');
    }

    public function postLogin(Request $request){
        ##check email exists
        if (User::where('email',$request->email)->first()){
            ##attempt login
            if (Auth::attempt($request->only('email','password'))){
                Alert::toast('Welcome '.Auth::user()->name,'success');
                return redirect()->route('user.home');
            }
        }else{
            Alert::toast('Something wrong!','error');
            return redirect()->back();
        }

        if (Auth::attempt($request->only('email','password'))){
            Alert::toast('Welcome '.Auth::user()->name,'success');
            return redirect()->route('admin.dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}

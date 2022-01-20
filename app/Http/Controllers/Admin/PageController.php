<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        $date = date('Y-m-d');
        $total_order = ProductOrder::count();
        $pending_order = ProductOrder::where('status','pending')->count();
        $complete_order = ProductOrder::where('status','complete')->count();
        $latest_orders = ProductOrder::whereDate('created_at',$date)->with('user','product')->get();
        return view('admin.index',compact('total_order','pending_order','complete_order','latest_orders'));
    }

    public function userList(){
        $users = User::withCount('order')->orderBy('id','DESC')->paginate(5);
        return view('admin.user.index',compact('users'));
    }
}

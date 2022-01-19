<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function pendingOrder(){
        $order = ProductOrder::where('status','pending')->with('user','product')->paginate(2);
        return view('admin.order.index',compact('order'));
    }

    public function completeOrder(Request $request){
        if (isset($request->start_date)){
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $order = ProductOrder::where('status','complete')
                ->whereBetween('created_at',[$start_date,$end_date])
                ->paginate(2);
            $order->appends($request->all());
        }else{
            $order = ProductOrder::where('status','complete')->with('user','product')->paginate(2);
        }
        return view('admin.order.complete',compact('order'));
    }

    public function makeComplete($id){
        ProductOrder::where('id',$id)->update([
            'status'=>'complete'
        ]);

        Alert::toast('Order is confirmed!','success');
        return redirect()->back();
    }
}

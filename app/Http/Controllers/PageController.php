<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function index(){
        $products = Product::latest()->with('category')->paginate(6);
        return view('user.index',compact('products'));
    }

    public function productDetail($slug){
        $product = Product::where('slug',$slug);
        $product->update([
            'view_count'=>DB::raw('view_count+1'),
        ]);
        $product = $product->with('category')->first();
        return view('user.product_detail',compact('product'));
    }

    public function addToCart($slug){
        $product = Product::where('slug',$slug)->first()->id;
        $user = Auth::id();
        $quantity = 1;

        $productInCart = ProductCart::where(['user_id'=>$user,'product_id'=>$product])->first();
        if ($productInCart){
            $productInCart->update([
                'quantity' => DB::raw('quantity+1')
            ]);
        }else{
            ProductCart::create([
                'user_id' => $user,
                'product_id' => $product,
                'quantity' => $quantity,
            ]);
        }

        Alert::toast('Added to cart','success');
        return redirect()->back();
    }

    public function showCart(){
        $cart = ProductCart::where('user_id',Auth::id())->with('product')->get();
        return view('user.cart',compact('cart'));
    }
}

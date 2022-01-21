<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function index(Request $request){
        if ($request->category){
            $slug = $request->category;
            $category_id = Category::where('slug',$slug)->first()->id;
            $products = Product::where('category_id',$category_id)->with('category')->orderBy('id','DESC')->paginate(6);
        }else{
            $products = Product::latest()->with('category')->paginate(6);
        }
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

    public function makeOrder(){
        $user_id = Auth::id();
        $cart = ProductCart::where('user_id',$user_id)->get();
        foreach ($cart as $c){
            ProductOrder::create([
                'user_id' => $user_id,
                'product_id' => $c->product_id,
                'quantity' => $c->quantity,
                'status' => 'pending',
            ]);
            ProductCart::where('id',$c->id)->delete();
        }

        Alert::toast('Order success','success');
        return redirect()->back();
    }

    public function orderList(){
        $orders = ProductOrder::where('user_id',Auth::id())->with('product')->get();
        return view('user.order',compact('orders'));
    }

    public function showProfile(){
        $user = User::where('id',Auth::id())->first();
        return view('user.auth.info',compact('user'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        $user = User::where('id',Auth::id())->first();
        if ($request->file('image')){
            $request->validate([
                'image'=>'required|mimes:jpg,jpeg,png'
            ]);
            //get old image array and separate with slash and delete
            $oldImageArr = explode('/',$user->image);
            Storage::disk('image')->delete($oldImageArr[1]);

            $file = $request->file('image');
            $image_name = uniqid().$file->getClientOriginalName();
            $file_path = 'image/'.$image_name;
            $file->storeAs('image',$image_name);
        }else{
            $file_path = $user->image;
        }

        if ($request->password){
            $request->validate([
                'password' => 'required'
            ]);
        }

        User::where('id',Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $file_path,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        Alert::toast('User info is updated','success');
        return redirect()->route('profile.show');
    }
}

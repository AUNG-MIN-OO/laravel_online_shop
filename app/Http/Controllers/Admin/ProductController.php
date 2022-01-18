<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id','DESC')->latest()->paginate(5);
//        return $products;
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return  view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
        ]);

        $file = $request->file('image');
        $image_name = uniqid().$file->getClientOriginalName();
        $file_path = 'image/'.$image_name;
        $file->storeAs('image',$image_name);

        Product::create([
            'name'=>$request->name,
            'slug'=>uniqid().Str::slug($request->name),
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$file_path,
            'view_count'=>0,
            'category_id'=>$request->category,
        ]);
        Alert::toast('Product is created', 'success');
        return redirect()->route('admin.product.index')->with('success','Product is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->with('category')->first();
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::where('id',$id)->with('category')->first();
        return view('admin.product.edit',compact('category','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'price'=>'required',
        ]);

        $product = Product::find($id);

        if ($request->file('image')){
            $request->validate([
                'image'=>'required|mimes:jpg,jpeg,png'
            ]);
            //get old image array and separate with slash and delete
            $oldImageArr = explode('/',$product->image);
            Storage::disk('image')->delete($oldImageArr[1]);

            $file = $request->file('image');
            $image_name = uniqid().$file->getClientOriginalName();
            $file_path = 'image/'.$image_name;
            $file->storeAs('image',$image_name);
        }else{
            $file_path = $product->image;
        }

        Product::where('id',$id)->update([
            'name'=>$request->name,
            'slug'=>uniqid().Str::slug($request->name),
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>$file_path,
            'category_id'=>$request->category,
        ]);

        Alert::toast('Product is updated','success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        //get old image array and separate with slash and delete
        $oldImageArr = explode('/',$product->image);
        Storage::disk('image')->delete($oldImageArr[1]);

        Product::where('id',$id)->delete();
        Alert::toast('Product is deleted','success');
        return redirect()->route('admin.product.index');
    }
}

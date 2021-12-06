<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Image;
use File;


class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        return view('backend.products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products|max:20',
            'cate_id' => 'required',
            'supply_id' => 'required',
            'product_self' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'product_img' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->cate_id = $request->cate_id;
        $product->supply_id = $request->supply_id;
        $product->product_self = $request->product_self;
        $product->product_route = $request->product_route;
        $product->buy_date = $request->buy_date;
        $product->expire_date = $request->expire_date;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;

        // image check
        if($request->hasFile('product_img')){
            $images = $request->file('product_img');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/products/'.$img);
            Image::make($images)->save($destination);
        }

        $product->product_img = $img;
        $product->save();

        $notify = array('messege' => 'Product added successfully!','alert-type' => 'success');
        return back()->with($notify);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('id', 'desc')->get();
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        return view('backend.products.edit', compact('product','categories', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'cate_id' => 'required',
            'supply_id' => 'required',
            'product_self' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ]);

        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->cate_id = $request->cate_id;
        $product->supply_id = $request->supply_id;
        $product->product_self = $request->product_self;
        $product->product_route = $request->product_route;
        $product->buy_date = $request->buy_date;
        $product->expire_date = $request->expire_date;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;

        // image check
        if($request->hasFile('product_img')){

            if(File::exists('uploads/products/'.$product->product_img)){
                File::delete('uploads/products/'.$product->product_img);
            }

            $images = $request->file('product_img');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/products/'.$img);
            Image::make($images)->save($destination);

            $product->product_img = $img;
        }
        
        $product->save();

        $notify = array('messege' => 'Product updated successfully!','alert-type' => 'success');
        return redirect()->route('all.product')->with($notify);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            if(File::exists('uploads/products/'.$product->product_img)){
                File::delete('uploads/products/'.$product->product_img);
            }

            $product->delete();
        }

        $notify = array('messege' => 'Product deleted successfully!','alert-type' => 'success');
        return redirect()->route('all.product')->with($notify);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index (){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add (){
        $products = Product::all();
        return view('admin.product.add', compact('products'));
    }

    public function insert (Request $request){
        $products = new Product();
        if(request->hasFile('image')){
            $file = request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time(). '.'.$ext;
            $file->move('assets/uploads/products/',$filename);
            $products->image =$filename;
        }

        $products->prod_name = $request->input('prod_name');
        $products->description = $request->input('description');
        $products->image = $request->input('image');
        $products->price = $request->input('price');
        $products->weight = $request->input('weight');
        $products->stock = $request->input('stock');
        $products->save();
        return redirect('products')->with('status', "Product Added Successfully");
        
    }
}
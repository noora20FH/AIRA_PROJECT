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

    public function store (Request $request){
        // ddd($request); 
        $products = new Product();
        // if(request->hasFile('image')){
        //     $file = request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename= time(). '.'.$ext;
        //     $file->move('assets/uploads/products/',$filename);
        //     $products->image =$filename;
        // }
        if($request->file('image'))
        {
            $products->image = $request->file('image')->store('post-images');

        }

        $products->prod_name = $request->input('prod_name');
        $products->description = $request->input('description');
        
        $products->price = $request->input('price');
        $products->weight = $request->input('weight');
        $products->stock = $request->input('stock');
        $products->save();
        return redirect('/dashboard')->with('status', "Product Added Successfully");
        
    }
}
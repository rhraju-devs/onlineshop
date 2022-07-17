<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        return view('backend.admin.product.index', compact('products'));
    }
    public function create()
    {
        return view('backend.admin.product.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_summary' => $request->product_summary,
            'product_photo' => $request->product_photo,
            'product_category' => $request->product_category,
            'product_sub_category' => $request->product_sub_category,
            'product_brand' => $request->product_brand,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'status' => $request->product_status,
        ]);
        return redirect()->route('admin.product.list');
    }
    public function delete($id){
        $products = Product::find($id)->delete();
        return redirect()->back();
    }
}

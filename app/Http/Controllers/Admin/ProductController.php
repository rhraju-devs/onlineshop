<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::with('category', 'subcategory', 'brand')->get();
        // dd($products);
        return view('backend.admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNull('is_parent')->get();
        $brands = Brand::all();
        return view('backend.admin.product.create', compact('categories', 'brands', 'subcategories'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $productImage = null;
        if($request->hasFile('product_photo')){
            $productImage = uniqid('product_' . strtotime(date('Ymdhmis')), true) . '_' . $request->file('product_photo')->getClientOriginalName();
            $request->file('product_photo')->storeAs('/uploads/products/', $productImage);
        }
        $request->validate([
            'product_name' => 'string|required',
            'product_description' => 'string|required',
            'product_summary' => 'string|required',
            'product_photo' => 'nullable',
            'product_category' => 'nullable', 
            'product_sub_category'=>'nullable',
            'product_brand'=>'nullable',
            'product_quantity'=>'numeric|required',
            'product_price'=>'numeric|required',
            'product_status' => 'required',
            'product_weight' => 'numeric|required',
        ]);

        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_summary' => $request->product_summary,
            'product_photo' => $productImage,
            'product_category' => $request->product_category,
            'product_sub_category' => $request->product_sub_category,
            'product_brand' => $request->product_brand,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'status' => $request->product_status,
        ]);
        // dd($request);
        return redirect()->route('admin.product.list');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNull('is_parent')->get();
        $brands = Brand::all();
        return view('backend.admin.product.edit', compact('categories', 'brands', 'subcategories', 'product')); 
    }

    public function update(Request $request, $id){
// dd($request);
        $productImage = null;
        if($request->hasFile('product_photo')){
            $productImage = uniqid('products_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('product_photo')->getClientOriginalName();
            $request->file('product_photo')->storeAs('/uploads/products/', $productImage);
        }
        $product = Product::find($id);
        // dd($product);

        $request->validate([
            'product_name' => 'string|required',
            'product_description' => 'string|required',
            'product_summary' => 'string|required',
            'product_photo' => 'nullable',
            'product_category' => 'nullable', 
            'product_sub_category'=>'nullable',
            'product_brand'=>'nullable',
            'product_quantity'=>'numeric|required',
            'product_price'=>'numeric|required',
            'status' => 'required',
            'product_weight' => 'numeric|required',
        ]);
        // dd($product);

        $product -> update([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_summary' => $request->product_summary,
            'product_photo' => $productImage,
            'product_category' => $request->product_category,
            'product_sub_category' => $request->product_sub_category,
            'product_brand' => $request->product_brand,
            'product_quantity' => $request->product_quantity,
            'product_price' => $request->product_price,
            'product_weight' => $request->product_weight,
            'status' => $request->status,
        ]);
        // dd($product);

        return redirect()->route('admin.product.list');
    }

    public function show($id)
    {
        $product = Product::with('category', 'subcategory', 'brand')->find($id);
        // dd($products);
        return view('backend.admin.product.show', compact('product'));
    }
    public function delete($id){
        $products = Product::find($id)->delete();
        return redirect()->back();
    }
}

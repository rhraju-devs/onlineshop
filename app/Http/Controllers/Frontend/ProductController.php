<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function grid_product()
    {
        $products = Product::with('images')->get();
    //    $images =  $products->image;
        $brands = Brand::all();
        $categories = Category::all();
        return view('frontend.pages.product.shop_grid_left_sidebar_product', compact('products', 'brands', 'categories'));
    }

    public function search_product(Request $request){

        $search = $request['search'] ?? "";

        if($search != ""){
            // $products = Product::where('product_name', 'LIKE', '%' .$search.'%')->with('images')->get();
            $products = Product::whereLike(['product_name', 'brand.name', 'category.name'], $search)->get();
        }else{
        $products = Product::with('images')->get();
        }

        $brands = Brand::all();
        $categories = Category::all();
        $featureproducts = Product::where('feature_product', 'yes')->get();
        return view('frontend.pages.product.search_product', compact('products', 'brands', 'categories', 'featureproducts'));
    }
            // $products = Product::where('product_name', 'LIKE', '%' .$search.'%')->with('images')->get();
            // $products = Product::where('product_name', 'LIKE', '%' .$search.'%')->with('images')->get();
                    // $products = Product::with('category')->where('product_name', 'LIKE', '%'.$search.'%')->whereHas('Category', function($q){
        //     $q->where('name', 'LIKE', '%'. $search .'%');
        // })->get();
    public function list_product()
    {
        $products = Product::with('images')->get();
        //    $images =  $products->image;
            $brands = Brand::all();
            $categories = Category::all();
            return view('frontend.pages.product.shop_list_left_sidebar_product', compact('products', 'brands', 'categories'));
    }

    public function single_product($id)
    {   
        $product = Product::find($id);
        return view('frontend.pages.product.single_view_product', compact('product'));
    }
}

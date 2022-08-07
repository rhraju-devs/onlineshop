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

            $products = Product::where('product_name', 'LIKE', '%' .$search.'%')->orWhere('product_category', 'LIKE', '%' .$search.'%')->orWhere('product_sub_category', 'LIKE', '%' .$search.'%')->with('images', 'subcategory', 'category', 'brand')->get();

        }else{
        $products = Product::with('images')->get();
        }
        $brands = Brand::all();
        $categories = Category::all();
        $featureproducts = Product::where('feature_product', 'yes')->get();
        return view('frontend.pages.product.search_product', compact('products', 'brands', 'categories', 'featureproducts'));
    }

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

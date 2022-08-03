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

    public function list_product()
    {
        $products = Product::with('images')->get();
        //    $images =  $products->image;
            $brands = Brand::all();
            $categories = Category::all();
            return view('frontend.pages.product.shop_list_left_sidebar_product', compact('products', 'brands', 'categories'));
    }
}

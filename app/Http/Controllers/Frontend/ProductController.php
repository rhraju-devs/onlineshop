<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
    //    $images =  $products->image;
        $brands = Brand::all();
        $categories = Category::all();
        return view('frontend.pages.shop-grid-left-sidebar-product', compact('products', 'brands', 'categories'));
    }
}

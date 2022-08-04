<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class BrandController extends Controller
{
    public function grid_brand($id)
    {
        $products = Product::where('product_brand', $id)->get();
        $brands = Brand::all();
        $categories = Category::find($id)->with('parentCategory')->get();
        return view('frontend.pages.brand.shop_grid_left_sidebar_brand_product', compact('products', 'brands', 'categories'));
    }

    public function list_brand($id)
    {
        $products = Product::where('product_brand', $id)->get();
        $brands = Brand::all();
        $categories = Category::find($id)->with('parentCategory')->get();
        return view('frontend.pages.brand.shop_list_left_sidebar_brand_product', compact('products', 'brands', 'categories'));
    }
}

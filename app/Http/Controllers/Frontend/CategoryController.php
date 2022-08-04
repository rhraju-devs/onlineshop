<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class CategoryController extends Controller
{
    public function grid_category($id)
    {
        $products = Product::where('product_category', $id)->get();
        $brands = Brand::all();
        $categories = Category::find($id)->with('parentCategory')->get();
        // $categories = Category::find($id);//->with('parentCategory')->get();
        return view('frontend.pages.category.shop_grid_left_sidebar_category_product', compact('products', 'brands', 'categories'));
    }

    public function list_category($id)
    {
        $products = Product::where('product_category', $id)->get();
        $brands = Brand::all();
        $categories = Category::find($id)->with('parentCategory')->get();
        // $categories = Category::find($id);//->with('parentCategory')->get();
        return view('frontend.pages.category.shop_list_left_sidebar_category_product', compact('products', 'brands', 'categories'));
    }
}

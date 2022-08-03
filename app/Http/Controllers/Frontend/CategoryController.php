<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class CategoryController extends Controller
{
    public function view($id)
    {
        $products = Product::where('product_category', $id)->get();
        $brands = Brand::all();
        $categories = Category::find($id)->with('parentCategory')->get();
        return view('frontend.pages.category.all_category_product', compact('products', 'brands', 'categories'));
    }
}

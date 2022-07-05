<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::paginate(2);
        return view('backend.admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('backend.admin.brand.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'status' =>$request->status,
        ]);
        // return redirect()->back();
        return redirect()->route('admin.brand.list');
    }
}

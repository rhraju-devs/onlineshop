<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::all();
        return view('backend.admin.brand.index', compact('brands'));
    }
    public function create()
    {
        $brands = Brand::all();
        return view('backend.admin.brand.create', compact('brands'));
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

    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('backend.admin.brand.edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {
        $brands = Brand::find($id);
        $brands->update([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'status' =>$request->status,
        ]);
        return redirect()->route('admin.brand.list');
    }

    public function delete($id){
        $brands = Brand::find($id)->delete();
        return redirect()->back();
    }

    public function view($id){
        $brands = Brand::find($id);
        return view('backend.admin.brand.show', compact('brands'));
    }
}

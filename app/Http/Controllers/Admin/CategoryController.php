<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list()
    {
        // $categories = Category::paginate(10);
        $categories = Category::all();
        return view('backend.admin.category.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('backend.admin.category.create',compact('categories'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Category::create([
            'name' => $request->name,
            'slug' =>Str::slug( $request->name),
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'summary' => $request->summary,
            'photo' => $request->photo,
            'status' => $request->status,
            'parent_name' => $request->parent_name,
        ]);
        return redirect()->route('admin.category.list');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('backend.admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category -> update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'summary' => $request->summary,
            'photo' => $request->photo,
            'status' => $request->status,
            'parent_name' => $request->parent_name,
        ]);
        return redirect()->route('admin.category.list');
    }

    public function delete($id){
        $categories = Category::find($id)->delete();
        return redirect()->back();
    }
}

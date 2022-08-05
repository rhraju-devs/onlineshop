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
        $categories = Category::with('parentCategory')->orderBy('id','desc')->get();
        return view('backend.admin.category.index', compact('categories'));
    }
    public function create()
    {
        $parent_category = Category::where('is_parent',1)->orderBy('name', 'ASC')->get();
        return view('backend.admin.category.create',compact('parent_category'));
    }
    public function store(Request $request)
    {
        $categoryImage = null;
        if($request->hasFile($categoryImage)){
            $categoryImage = uniqid('category_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/category', $categoryImage);
        }

        // dd($request->all());

        $request->validate([
            'name' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|required',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable', 
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable',
        ]);

        // dd($request->all());

        $categories = Category::create([
            'name' => $request->name,
            'slug' =>Str::slug( $request->name),
            'parent_id' => $request->parent_id,
            'is_parent' => $request->is_parent,
            'description' => $request->description,
            'summary' => $request->summary,
            'photo' => $categoryImage,
            'status' => $request->status,
        ]);
        if($categories){
            return redirect()->route('admin.category.list')->with('success', 'Category Successfully Created');
        }else{
            return redirect()->back()->with('error', 'Category could not found and Try again'); 
        }
    }

    public function edit($id){
        $category = Category::find($id);
        $parent_category = Category::where('is_parent',1)->orderBy('name', 'ASC')->get();
        return view('backend.admin.category.edit', compact('category', 'parent_category'));
    }

    public function update(Request $request, $id){
        $categoryImage = null;
        if($request->hasFile($categoryImage)){
            $categoryImage = uniqid('category_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/category', $categoryImage);
        }

        $category = Category::find($id);
        $request->validate([
            'name' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|required',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable', 
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable',
        ]);
        $category -> update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_parent' => $request->is_parent,
            'description' => $request->description,
            'summary' => $request->summary,
            'photo' => $categoryImage,
            'status' => $request->status,
        ]);
        if($category->update([])){
            return redirect()->route('admin.category.list')->with('success', 'Category Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Category could not found and Try again'); 
        }
        // return redirect()->route('admin.category.list');
    }

    public function delete($id){
        $categories = Category::find($id)->delete();
        if($categories){
            return redirect()->route('admin.category.list')->with('success', 'Category Successfully Deleted');
        }else{
            return redirect()->back()->with('error', 'Category could not found and Try again'); 
        }
    }

    public function show($id){
        $category = Category::with('parentCategory')->orderBy('id','desc')->find($id);
        
        return view('backend.admin.category.show', compact('category'));
    }
}

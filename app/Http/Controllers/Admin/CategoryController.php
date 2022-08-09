<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

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
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $categoryImage = uniqid('category_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('photo')->getClientOriginalName();
            $file->storeAs('/uploads/category', $categoryImage);
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
        dd($categories);
        if(Category::create()){
            Toastr::success('Category Successfully Created :)', 'Created', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.category.list');
        }else{
            Toastr::error('Something went wrong :)', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }

    public function edit($id){
        $category = Category::find($id);
        $parent_category = Category::where('is_parent',1)->orderBy('name', 'ASC')->get();
        return view('backend.admin.category.edit', compact('category', 'parent_category'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $categoryImage=$category->photo;
        if($request->hasFile('photo')){
            $file=$request->file('photo');
            $categoryImage = uniqid('category_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('photo')->getClientOriginalName();
            $file->storeAs('/uploads/category', $categoryImage);
        }

        $category = Category::find($id);
        $request->validate([
            'name' => 'string|nullable',
            'summary' => 'string|nullable',
            'description' => 'string|nullable',
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
            Toastr::success('Category Successfully updated :)', 'Updated', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.category.list');
        }else{
            Toastr::error('Try again (:', 'Something Wrong', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }

    public function delete($id){
        $categories = Category::find($id)->delete();
        if($categories){
            Toastr::error('Category Successfully Deleted :)', 'Deleted', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.category.list');
        }else{
            Toastr::warning('Category could not found and Try again (:', 'Not Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }

    public function show($id){
        $category = Category::with('parentCategory')->orderBy('id','desc')->find($id);
        if($category){
            Toastr::info('Category Found :)', 'Show', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return view('backend.admin.category.show', compact('category'));
        }else{
            Toastr::warning('Category data not found (:', 'Not Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back();
        }
    }
}

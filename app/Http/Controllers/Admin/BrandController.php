<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
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
        $brandImage = null;
        if($request->hasFile('photo'))
        {
            $brandImage = uniqid('brand_' . strtotime(date('Ymdhsis')), true) . rand(0,1000) . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/uploads/brands', $brandImage);
        }
    
        $request->validate([
            'name'=> 'string|required',
            'description' => 'string|required',
            'summary' => 'string|required',
            'photo' => 'nullable',
            'status' => 'required',
        ]);
        $brands = Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'photo'=>$brandImage,
            'status' =>$request->status,
        ]);
        if($brands){
            Toastr::success('Brand Successfully Created :)', 'Create', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.brand.list');
        }else{
            Toastr::error('Fill up Brand Credential  (:', '', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
        // return redirect()->route('admin.brand.list');
        // }catch(Throwable $request){
        //     return $request->getMessage();
        // }
    }


    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('backend.admin.brand.edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {
        $brandImage = null;
        if($request->hasFile('photo'))
        {
            $brandImage = uniqid('brand_' . strtotime(date('Ymdhsis')), true) . rand(0,1000) . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/uploads/brands', $brandImage);
        }

        $request->validate([
            'name'=> 'string|nullable',
            'description' => 'string|nullable',
            'summary' => 'string|nullable',
            'photo' => 'nullable',
            'status' => 'nullable',
        ]);

        $brands = Brand::find($id);
        $brands->update([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'photo'=>$brandImage,
            'status' =>$request->status,
        ]);
        if($brands->update([])){
            Toastr::success('Brand Successfully Updated :)', 'Updated', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.brand.list');
        }else{
            Toastr::warning('Fill up Brand Credential  :)', '', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back()->with('error', 'Brand could not found and Try again'); 
        }
    }

    public function delete($id){
        $brands = Brand::find($id)->delete();
        if($brands){
            Toastr::error('Brand Deleted Successfully', 'Deleted', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.brand.list');
        }else{
            Toastr::warning('Brand could not found and Try again', 'Not Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true, "preventDuplicates" => true,]);
            return redirect()->back()->with('error', 'Brand could not found and Try again'); 
        }
        // return redirect()->back();
    }

    public function view($id){
        $brands = Brand::find($id);
        if($brands){
            Toastr::success('Brand Found Successfully !!!', 'Found', ["positionClass"=> "toast-top-right",   "closeButton" => true,"progressBar" => true, "preventDuplicates" => true,]);
            return view('backend.admin.brand.show', compact('brands'));
        }else{
            Toastr::warning('Brand could not found ...', 'Sorry!!', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true, "preventDuplicates" => true,]);
            return redirect()->back()->with('error', ''); 
        }
    }
}

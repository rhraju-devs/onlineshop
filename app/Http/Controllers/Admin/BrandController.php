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

        $brandImage = null;
        if($request->hasFile('photo'))
        {
            $brandImage = uniqid('brand_' . strtotime(date('Ymdhsis')), true) . '.' . $request->file('photo')->getClientOriginalExtension();
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
            return redirect()->route('admin.brand.list')->with('success', 'Banner Successfully Created');
        }else{
            return redirect()->back()->with('error', 'Banner could not found and Try again'); 
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
            $brandImage = uniqid('brand_' . strtotime(date('Ymdhsis')), true) . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/uploads/brands', $brandImage);
        }

        $request->validate([
            'name'=> 'string|required',
            'description' => 'string|required',
            'summary' => 'string|required',
            'photo' => 'nullable',
            'status' => 'required',
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
            return redirect()->route('admin.brand.list')->with('success', 'Brand Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Brand could not found and Try again'); 
        }
    }

    public function delete($id){
        $brands = Brand::find($id)->delete();
        if($brands){
            return redirect()->route('admin.brand.list')->with('success', 'Brand Successfully Deleted');
        }else{
            return redirect()->back()->with('error', 'Brand could not found and Try again'); 
        }
        // return redirect()->back();
    }

    public function view($id){
        $brands = Brand::find($id);
        if($brands){
            return view('backend.admin.brand.show', compact('brands'))->with('success', 'Banner Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Banner could not found and Try again'); 
        }
    }
}


    // public function store(Request $request)
    
    // {
    //     $brandImage = null;
    //     if($request->hasFile('photo'))
    //     {
    //         $brandImage = date('Ymdhsis') . '-'. $request->file('photo')->getClientOriginalExtension();
             
    //         $request->file('photo')->storeAs('/uploads/brands', $brandImage);

    //     }
    //     // dd($request->all());
    //     $request->validate([
    //         'name'=> 'string|required',
    //         'description' => 'string|required',
    //         'summary' => 'string|required',
    //         'photo' => 'nullable',
    //         'status' => 'required',
    //     ]);
    //     Brand::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'summary' => $request->summary,
    //         'photo'=>$brandImage,
    //         'status' =>$request->status,
    //     ]);
    //     // return redirect()->back();
    //     return redirect()->route('admin.brand.list');
    // }

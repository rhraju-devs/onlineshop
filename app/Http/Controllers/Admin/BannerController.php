<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('backend.admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.admin.banner.create');
    }

    public function store(Request $request)
    {
            $bannerImage = null;
            if($request->hasFile('photo'))
            {
                $bannerImage = uniqid('banner_' . strtotime(date('Ymdhsis')), true) . rand(0,1000) . '_' . $request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->storeAs('/uploads/banner/', $bannerImage);
            }
            $request->validate([
                'title' => 'string|nullable', 
                'description' => 'string|nullable',
                'subtitle' => 'string|nullable', 
                'offer' => 'string|nullable', 
                'button' => 'string|nullable',
                'photo' => 'required',
                'status' => 'required',
            ]);
            $bannerCreate = Banner::create([
                'title' => $request->title,
                'description' => $request->description,
                'subtitle' => $request->subtitle,
                'offer' => $request->offer,
                'button' => $request->button,
                'photo' => $bannerImage,
                'status' => $request->status,
            ]);
            
            if($bannerCreate){
                Toastr::success('Banner Successfully Created :)', 'Create', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
                return redirect()->route('admin.banner.list');
            }else{
                Toastr::error('Fill up Banner Credential  (:', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
                return redirect()->back(); 
            }

    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('backend.admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $banner = Banner::find($id);
        $bannerImage = $banner->photo;
        if($request->hasFile('photo'))
        {
            $bannerImage = uniqid('banner_' . strtotime(date('Ymdhsis')), true) . rand(0,1000) . '_' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/uploads/banner/', $bannerImage);
        }
        $request->validate([
            'title' => 'string|nullable', 
            'description' => 'string|nullable',
            'subtitle' => 'string|nullable', 
            'offer' => 'string|nullable', 
            'button' => 'string|nullable',
            'photo' => 'nullable',
            'status' => 'nullable',
        ]);
          $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'subtitle' => $request->subtitle,
            'offer' => $request->offer,
            'button' => $request->button,
            'photo' => $bannerImage,
            'status' => $request->status,
        ]);
    // dd($banner2);
        if($banner){
            Toastr::success('Banner Successfully Updated :)', 'Updated', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.banner.list');
        }else{
            Toastr::error('Fill up Banner Credential  (:', 'Not Updated', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }

    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        if($banner){
            $banner->delete();
            Toastr::error('Banner Successfully Deleted :)', 'Deleted', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.banner.list');
        }else{
            Toastr::warning('Banner could not found (:', 'Not Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }
    public function show($id)
    {
        $banner = Banner::find($id);
        // dd($banner);
        if($banner){
            Toastr::info('Banner Found :)', 'Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return view('backend.admin.banner.show', compact('banner'));
        }else{
            Toastr::warning('Something Wrong (:', 'Not Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }
}

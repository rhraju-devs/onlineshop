<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;


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
                $bannerImage = uniqid('banner_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalExtension();
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
                return redirect()->route('admin.banner.list')->with('success', 'Banner Successfully Created');
            }else{
                return redirect()->back()->with('error', 'Try again and fill the crediential again'); 
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
        $bannerImage = null;
        if($request->hasFile('photo'))
        {
            $bannerImage = uniqid('banner_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalExtension();
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
        return redirect()->route('admin.banner.list')->with('success', 'Banner Successfully Updated');
    }else{
        return redirect()->back()->with('error', 'Banner could not found and Try again'); 
    }
        // return redirect()->route('admin.banner.list');

    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        if($banner){
            $banner->delete();
            return redirect()->route('admin.banner.list')->with('success', 'Banner Successfully Deleted');
        }else{
            return redirect()->back()->with('error', 'Banner could not found and Try again'); 
        }
        // return redirect()->route('admin.banner.list');
    }
    public function show($id)
    {
        $banner = Banner::find($id);
        // dd($banner);
        if($banner){
            return view('backend.admin.banner.show', compact('banner'))->with('success', 'Banner found Successfully!');
        }else{
            return redirect()->back()->with('error', 'Banner could not found and Try again'); 
        }

    }
}

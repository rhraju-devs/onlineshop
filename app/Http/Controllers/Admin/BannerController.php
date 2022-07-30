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
            Banner::create([
                'title' => $request->title,
                'description' => $request->description,
                'subtitle' => $request->subtitle,
                'offer' => $request->offer,
                'button' => $request->button,
                'photo' => $bannerImage,
                'status' => $request->status,
            ]);
    
            return redirect()->route('admin.banner.list');
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
        return redirect()->route('admin.banner.list');

    }

    public function delete($id)
    {
        $banner = Banner::find($id)->delete();
        return redirect()->route('admin.banner.list');
    }
    public function show($id)
    {
        $banner = Banner::find($id);
        // dd($banner);
        return view('backend.admin.banner.show', compact('banner'));
    }
}

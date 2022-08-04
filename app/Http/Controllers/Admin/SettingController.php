<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('backend.admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('backend.admin.setting.create');
    }
    
    public function store(Request $request){
        $settingPhoto = null;
        if($request->hasFile('photo')){
            $settingPhoto = uniqid('setting_' . strtotime(date('ymhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/settings/', $settingPhoto);
        }

        $settingLogo = null;
        if($request->hasFile('logo')){
            $settingLogo = uniqid('logo' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('/uploads/settings/', $settingLogo);
        }
        $request->validate([
            'discription' => 'string|required',
            'email' => 'email|required',
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'logo' => 'nullable', 
            'tel_number' => 'required',
            'address' => 'string|required',
        ]);

        $settings = Setting::create([
            'description' => $request->discription, 
            'photo' => $settingPhoto,
            'logo' => $settingLogo, 
            'phone' => $request->phone,
            'email' => $request->email, 
            'tel_number' => $request->tel_number,
            'address' => $request ->address,
        ]);
        if($settings){
            return redirect()->route('admin.setting.details')->with('success', 'Banner Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Banner could not found and Try again'); 
        }
        // return redirect()->route('admin.setting.details');
    }
    
    public function edit($id)
    {
        $setting = Setting::find($id);
        // dd($setting);
        return view('backend.admin.setting.edit', compact('setting'));
    }
    public function update(Request $request, $id)
    {
        $settingPhoto = null;
        if($request->hasFile('photo')){
            $settingPhoto = uniqid('setting_' . strtotime(date('ymhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/settings/', $settingPhoto);
        }

        $settingLogo = null;
        if($request->hasFile('logo')){
            $settingLogo = uniqid('logo' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('/uploads/settings/', $settingLogo);
        }
        $setting = setting::find($id);

        $request->validate([
            'discription' => 'string|required',
            'email' => 'email|required',
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'tel_number' => 'required',
            'logo' => 'nullable', 
            'address' => 'string|required',
        ]);

        $setting->update([
            'description' => $request->discription, 
            'photo' => $settingPhoto,
            'logo' => $settingLogo, 
            'phone' => $request->phone,
            'email' => $request->email, 
            'tel_number' => $request->tel_number,
            'address' => $request ->address,
        ]);
        if($setting->update([])){
            return redirect()->route('admin.setting.details')->with('success', 'Banner Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Banner could not found and Try again'); 
        }
        // return redirect()->route('admin.setting.details');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

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
            Toastr::success('Setting Successfully Created :)', 'Create', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.setting.details');
        }else{
            Toastr::error('Something went wrong :)', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }
    
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('backend.admin.setting.edit', compact('setting'));
    }
    public function update(Request $request, $id)
    {
        $setting = setting::find($id);
        $settingPhoto = $setting->photo;
        if($request->hasFile('photo')){
            $settingPhoto = uniqid('setting_' . strtotime(date('ymhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/settings/', $settingPhoto);
        }

        $settingLogo = $setting->logo;
        if($request->hasFile('logo')){
            $settingLogo = uniqid('logo' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('/uploads/settings/', $settingLogo);
        }

        $request->validate([
            'discription' => 'string|nullable',
            'email' => 'email|nullable',
            'phone' => 'nullable|string|digits:11', 
            'photo' => 'nullable', 
            'tel_number' => 'nullable',
            'logo' => 'nullable', 
            'address' => 'string|nullable',
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
            Toastr::success('Setting Successfully Updated :)', 'Updated', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.setting.details');
        }else{
            Toastr::error('Something went wrong :)', 'Wrong', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }
}

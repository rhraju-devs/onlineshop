<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class VendorController extends Controller
{

    public function store(Request $request)
    {
        $vendorPhoto = null;
        if($request->hasFile('photo'))
        {
            $vendorPhoto = uniqid('vendor_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/vendors/', $vendorPhoto);
        }
        $request->validate([
            'fullname' => 'string|required',
            'username' => 'string|required|unique:vendors',
            'email' => 'email|required|unique:vendors',
            'password' => 'string|required',
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'description' => 'string|required',
            'zip' => 'numeric|required',
            'product' => 'string|required',
            'license' => 'string|required',
            'status' => 'string|required',
        ]);

        Vendor::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'photo' => $vendorPhoto,
            'address' => $request->address,
            'vendor_description' => $request->description,
            'zip' => $request->zip,
            'product' => $request->product,
            'license_num' => $request->license,
            'status' => $request->status,
        ]);
        // dd($request);
        return redirect('/');
    }
    public function edit(){

    }
    
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $check=Auth::guard('vendors')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        // dd($check);
        if(!$check){
            // return 'Could Not Login. Give Current crediential';
            Session::flash('error-msg', 'Invalid Email and Password');
        }
        else{
            return redirect()->back();
            // return 'I am ok';
        }
    }

    public function logout()
    {
     
        Auth::guard('vendors')->logout();
    

        return redirect('/');

    }
}

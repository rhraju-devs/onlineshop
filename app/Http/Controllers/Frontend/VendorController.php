<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;


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
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'username' => 'string|required|unique:vendors',
            'email' => 'email|required|unique:vendors',
            'password' => 'string|required',
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'vendor_description' => 'string|required',
            'zip_code' => 'numeric|required',
            // 'status' => 'string|required',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'photo' => $vendorPhoto,
            'address' => $request->address,
            'vendor_description' => $request->description,
            'zip_code' => $request->zip,
            // 'status' => $request->status,
        ]);
        // dd($request);
        if(User::create()){
            Toastr::success('Vendor Successfully Register :)', 'Registration', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }else{
            Toastr::error('Fill Up the Crediential again :)', 'Warning', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }
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
        $user =User::where('role','=', 'vendor')->where('email',$request->email)->first();
        if($user){
            Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password,
            ]);
            Toastr::success('Vendor Successfully Login :)', 'Login', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }else{
            Toastr::error('Invalid Email and Password (:', 'Credientail', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }
        // $check=Auth::guard('vendors')->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        // ]);
        // dd($check);
        // if(!$check){
        //     // return 'Could Not Login. Give Current crediential';
        //     Session::flash('error-msg', 'Invalid Email and Password');
        //     return redirect()->route('frontend.dashboard');
        // }
        // else{
        //     Session::flash('success-msg', 'Vendor Registration Complete wait for approve');
        //     return redirect()->route('frontend.dashboard');
        //     // return 'I am ok';
        // }
    }

    public function logout()
    {   
        $check = Auth::logout();
        if($check){
            Toastr::error('Vendor Successfully Logout (:', 'Logout', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }else{
            Toastr::warning('Something Went Wrong (:', 'Warning', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }

    }
}

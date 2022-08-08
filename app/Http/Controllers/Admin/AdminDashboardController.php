<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.admin.dashboard.example');
    }
    public function login()
    {
        return view('backend.admin.login');
    }
    public function loginCheck(Request $request)
    {
        $check = Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password,
        ]);
        if($check){
            Toastr::success('Admin Login Successfully :)', 'Login', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.dashboard');
        }else{
            Toastr::error('Invalid email and password (:', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.login');
        }

    }
    public function logout()
    {
        Auth::logout();
        Toastr::error('Admin Successfully Logout :)', '', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
        return redirect()->route('admin.login');
    }
}

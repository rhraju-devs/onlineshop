<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
        }else{
            return redirect()->route('admin.login')->with('error', 'Invalid email and password');
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

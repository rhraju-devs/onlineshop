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
        Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password,
        ]);

        return redirect()->route('admin.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

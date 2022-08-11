<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Artisan;

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

    public function optimization()
    {
        // dd('hi');
        // Toastr::success('Admin Config, Cache, View and Route Suggggggggggggccessfully Clear :)', 'Clear', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
        // $data = request()->session()->all();
        // dd($data);
        $check = Artisan::call('config:cache');
        $check = Artisan::call('cache:clear');
        $check = Artisan::call('view:clear');
        $check = Artisan::call('route:cache');
       
        if(isset($check)){
            Toastr::success('Admin Config, Cache, View and Route Successfully Clear :)', 'Clear', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back();
        }else{
            Toastr::error('Admin Config, Cache, View and Route Successfully Clear :)', 'Clear', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back();
        }

    }
}

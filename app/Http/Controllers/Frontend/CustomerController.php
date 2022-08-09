<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class CustomerController extends Controller
{

    public function store(Request $request)
    {
        // dd($request);
        $customerImage = null;
        if($request->hasFile('photo')){
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/uploads/customers/', $customerImage);
        }
        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'username' => 'string|required',
            'email' => 'email|required',
            'password' => 'required|min:6', 
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            // 'status' => 'string|required'
        ]);
        // dd($request->all());
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'photo' => $customerImage,
            'address' => $request->address,
            // 'status' => $request->status,
        ]);
        // dd($request->all());
        return redirect()->route('frontend.dashboard');
    }
    public function edit(){

    }

    public function update(Request $request, $id){
        $customerImage = null;
        if($request->hasFile('photo'))
        {
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' .rand(1, 1000) . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/uploads/customers/', $customerImage);
        }
        $customer = Customer::find($id);

        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'username' => 'string|required',
            'email' => 'email|required',
            'password' => 'required|min:6', 
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'status' => 'string|required'
        ]);

        $customer->update([
            'firstname'=>$request->firstname,
            'lastname' => $request->lastname,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'photo'=>$customerImage,
            'address'=>$request->address,
            'status'=>$request->status, 
        ]);
        return redirect()->route('frontend.dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user =User::where('status','=', 'active')->where('email',$request->email)->first();
        if($user){
            Auth::attempt([
                'email'=>$request->email,
                'password'=>$request->password,
            ]);

            Toastr::error('Customer Login Successfully (:', 'Login', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }else{
            Toastr::error('Invalid Email and Password (:', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }
    }

    public function logout()
    {
        $check = Auth::logout();
        dd($check);
        if($check){
            Toastr::error('Logout Successfully (:', 'Logout', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }else{
            Toastr::warning('Something Went Wrong (:', 'Warning', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('frontend.dashboard');
        }
    }
}

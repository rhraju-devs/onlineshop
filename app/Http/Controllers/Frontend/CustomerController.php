<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{

    public function store(Request $request)
    {
        // dd($request);
        $customerImage = null;
        if($request->hasFile('photo')){
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
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
            'status' => 'string|required'
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
            'status' => $request->status,
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
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
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
        $check=Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        // dd($check);
        if(!$check){
            // return 'Could Not Login. Give Current crediential';
            Session::flash('error-msg', 'Invalid Email and Password');

        }
        else{
            return redirect()->route('frontend.dashboard');
        }
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('frontend.dashboard');

    }
}

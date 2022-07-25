<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('backend.admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('backend.admin.customer.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $customerImage = null;
        if($request->hasFile('photo')){
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/customers/', $customerImage);
        }
        $request->validate([
            'fullname' => 'string|required',
            'username' => 'string|required|unique:customers',
            'email' => 'email|required|unique:customers',
            'password' => 'required|min:6', 
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'status' => 'string|required'
        ]);

        Customer::create([
            'fullname'=>$request->fullname,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'photo'=>$customerImage,
            'address'=>$request->address,
            'status'=>$request->status,
        ]);
        // dd($request);
        return redirect()->route('admin.customer.list');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('backend.admin.customer.edit', compact('customer'));  
    }

    public function update(Request $request, $id)
    {
        $customerImage = null;
        if($request->hasFile('photo'))
        {
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/customers/', $customerImage);
        }
        $customer = Customer::find($id);

        $request->validate([
            'fullname' => 'string|required',
            'username' => 'string|required|unique:customers',
            'email' => 'email|required|unique:customers',
            'password' => 'required|min:6', 
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'status' => 'string|required'
        ]);

        $customer->update([
            'fullname'=>$request->fullname,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'photo'=>$customerImage,
            'address'=>$request->address,
            'status'=>$request->status, 
        ]);
        return redirect()->route('admin.customer.list');
    }

    public function delete($id)
    {
        $customer = Customer::find($id)->delete();
        return redirect()->back();
    }

    public function show($id)
    {

    }


}

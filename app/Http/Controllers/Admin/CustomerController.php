<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::all();
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
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'username' => 'string|required|unique:customers',
            'email' => 'email|required|unique:customers',
            'password' => 'required|min:6', 
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'status' => 'string|required'
        ]);

        $customer = User::create([
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
        if($customer){
            return redirect()->route('admin.customer.list')->with('success', 'Customer Successfully Created');
        }else{
            return redirect()->back()->with('error', 'Customer could not found and Try again'); 
        }
        // dd($request);;
    }

    public function edit($id)
    {
        $customer = User::find($id);
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
        $customer = User::find($id);

        $request->validate([
            'firstname' => 'string|nullable',
            'lastname' => 'string|nullable',
            'username' => 'string|nullable',
            // 'email' => 'email',
            // 'password' => 'required|min:6', 
            'phone' => 'nullable|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|nullable',
            'status' => 'string|nullable'
        ]);

        $customer->update([
            'firstname'=>$request->firstname,
            'lastname' => $request->lastname,
            'username'=>$request->username,
            // 'email'=>$request->email,
            // 'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'photo'=>$customerImage,
            'address'=>$request->address,
            'status'=>$request->status, 
        ]);
        if($customer->update([])){
            return redirect()->route('admin.customer.list')->with('success', 'Customer Successfully Updated');
        }else{
            return redirect()->back()->with('error', 'Customer could not found and Try again'); 
        }
    }

    public function delete($id)
    {
        $customer = User::find($id)->delete();
        if($customer){
            return redirect()->route('admin.customer.list')->with('success', 'Customer Successfully Deleted');
        }else{
            return redirect()->back()->with('error', 'Customer could not found and Try again'); 
        }
    }

    public function show($id)
    {
        $customer = User::find($id);
        return view('backend.admin.customer.show', compact('customer'));
    }


}

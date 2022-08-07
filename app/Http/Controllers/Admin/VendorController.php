<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {   
        $search = $request['search'] ?? "";
        // dd($search);
        if($search != ""){
            // dd($search);
            $vendors = User::where('firstname', 'LIKE', '%' .$search.'%')->orWhere('lastname', 'LIKE', '%' .$search.'%')->orWhere('username', 'LIKE', '%' .$search.'%')->orWhere('email', 'LIKE', '%' .$search.'%')->get();
            // dd($products);
        }else{
            $vendors = User::all();
        }
        // $vendors = User::all();
        return view('backend.admin.vendor.index', compact('vendors'));
    }

    public function create()
    {
        return view('backend.admin.vendor.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $vendorPhoto = null;
        if($request->hasFile('photo'))
        {
            $vendorPhoto = uniqid('vendor_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/vendors/', $vendorPhoto);
        }
        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'username' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'description' => 'string|required',
            'zip' => 'numeric|required',
            // 'is_vendor' => 'nullable',

            'status' => 'string|required',
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
            // 'is_vendor' => $request->is_vendor,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.vendor.list');
    }
    public function edit($id)
    {
        // dd('i am coming');
        $vendor = User::find($id);
        // dd('i am coming');
        return view('backend.admin.vendor.edit', compact('vendor'));
    }
    public function update(Request $request, $id)
    {
        $vendorPhoto = null;
        if($request->hasFile('photo'))
        {
            $vendorPhoto = uniqid('vendor_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/vendors/', $vendorPhoto);
        }
        $vendor = User::find($id);
        $request->validate([
            // 'firstname' => 'nullable',
            // 'lastname' => 'nullable',
            // 'username' => 'nullable',
            // 'email' => 'nullable',
            // 'password' => 'nullable',
            // 'phone' => 'nullable', 
            // 'photo' => 'nullable', 
            // 'address' => 'nullable',
            // 'description' => 'nullable',
            // 'zip_code' => 'nullable',
            'is_vendor' => 'required',
            'status' => 'string|nullable',
            'role' => 'string|required'
        ]);

        $vendor->update([
            // 'firstname' => $request->firstname,
            // 'lastname' => $request->lastname,
            // 'username' => $request->username,
            // 'email' => $request->email,
            // 'password' => Hash::make($request->password),
            // 'phone' => $request->phone,
            // 'photo' => $vendorPhoto,
            // 'address' => $request->address,
            // 'vendor_description' => $request->description,
            // 'zip_code' => $request->zip,
            'is_vendor' => $request->is_vendor,
            'status' => $request->status,
            'role' => $request->role,
        ]);
        return redirect()->route('admin.vendor.list');
    }

    public function delete($id)
    {
        $vendor = User::find($id)->delete();
        return redirect()->back();
    }

    public function show($id)
    {
        $vendor = User::find($id);
        return view('backend.admin.vendor.show', compact('vendor'));
    }

}

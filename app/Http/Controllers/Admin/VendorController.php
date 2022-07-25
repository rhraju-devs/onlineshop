<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
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
            'fullname' => 'string|required',
            'username' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'description' => 'string|required',
            'zip' => 'numeric|required',
            'product' => 'string|required',
            'license' => 'string|required',
            'status' => 'string|required',
        ]);

        Vendor::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'photo' => $vendorPhoto,
            'address' => $request->address,
            'vendor_description' => $request->description,
            'zip' => $request->zip,
            'product' => $request->product,
            'license_num' => $request->license,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.vendor.list');
    }
    public function edit($id)
    {
        // dd('i am coming');
        $vendor = Vendor::find($id);
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
        $vendor = Vendor::find($id);
        $request->validate([
            'fullname' => 'string|required',
            'username' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'description' => 'string|required',
            'zip' => 'numeric|required',
            'product' => 'string|required',
            'license' => 'string|required',
            'status' => 'string|required',
        ]);

        $vendor->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'photo' => $vendorPhoto,
            'address' => $request->address,
            'vendor_description' => $request->description,
            'zip' => $request->zip,
            'product' => $request->product,
            'license_num' => $request->license,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.vendor.list');
    }

    public function delete($id)
    {
        $vendor = Vendor::find($id)->delete();
        return redirect()->back();
    }

    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('backend.admin.vendor.show', compact('vendor'));
    }

}

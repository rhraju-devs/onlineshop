<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        return view('backend.admin.shipping.index');
    }
    public function create()
    {
        return view('backend.admin.shipping.create');
    }
    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'type' => 'string|required',
            'delivery_time' => 'required|string',
            'price'=> 'required|numeric',
            'status'=> 'required|string',
        ]);

        Shipping::create([
            'type' => $request->type,
            'delivery_time' => $request->delivery_time,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.shipping.list');
    }

    public function edit($id)
    {
        $data = Shipping::find($id);
        return view('backend.admin.shipping.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = Shipping::find($id);
        // dd($data);
        $request->validate([
            'type' => 'string|required',
            'price'=> 'required|numeric',
            'delivery_time' => 'required|string',
            'status'=> 'required|string',
        ]);

        $data->update([
            'type' => $request->type,
            'delivery_time' => $request->delivery_time,
            'price' => $request->price,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.shipping.list');
    }
    public function delete($id)
    {
        $data = Shipping::find($id)->delete();
        return redirect()->route('admin.shipping.list');
    }
}

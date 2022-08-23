<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderDetail::with('orderDetails')->get();
        return view('backend.admin.order.list.index', compact('orders'));
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }

    public function invoice($id)
    {
        // dd($id);
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->find($id);
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->where('order_id', $orders->orderDetails->id)->get();
        // $orders=Order::with('userGet')->get();
        // dd($orders);
        return view('backend.admin.order.list.invoice', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class OrderControllerDetails extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails')->get();
        return view('backend.admin.order.order.index', compact('orders'));
    }

    public function invoice($id)
    {
        $orders = Order::with('orderDetails')->find($id);
        return view('backend.admin.order.order.invoice', compact('orders'));
    }

    public function dompdf(Request $request, $id)
    {
        // dd('hi');
        $orders = Order::with('orderDetails')->find($id);
        // dd($orders);
        // $status = $orders->orderDetails->status;
        // $firstname = $orders->orderDetails->firstname;
        // $lastname = $orders->orderDetails->lastname;
        // $address = $orders->orderDetails->address;
        // $order_create = $orders->orderDetails->created_at->format('D, d F, Y');
        // $order_id = $orders->orderDetails->id;
        // $order = Order::with(['orderDetails', 'getProduct'])->where('order_id', $order_id)->get()->toArray();
        // $product_name = $orders->getProduct->product_name;
        // $product_quantity =$orders->quantity;
        // $product_price = $orders->unit_price;
        // $subtotal = $orders->subtotal;
        // dd($product_name, $product_quantity, $product_price, $subtotal);
    //    foreach($orders as $key=>$orderData){
    //     $orderData;

    //    }
    //    dd($orders);
        $data = [
            'orders' => $orders,
        ];

        view()->share('data',$data);
        $pdf = Pdf::loadView('backend.admin.order.order.dompdf', $data)->setOptions(['defaultFont' => 'sans-serif'])->setOptions(['isRemoteEnabled'=> true]);
        // return $pdf->download('invoice.pdf');
        return $pdf->stream('invoice.pdf');

    }
}

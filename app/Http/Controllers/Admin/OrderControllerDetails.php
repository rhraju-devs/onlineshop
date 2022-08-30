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
        $orders = Order::with('orderDetails')->find($id);
        $data = [
            'orders' => $orders,
        ];
        view()->share('data',$data);
        $pdf = Pdf::loadView('backend.admin.order.order.dompdf', $data)->setOptions(['defaultFont' => 'sans-serif'])->setOptions(['isRemoteEnabled'=> true]);
        return $pdf->stream('invoice.pdf');
    }
}

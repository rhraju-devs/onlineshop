<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
// use PDF;

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
        // dd(test());
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->find($id);
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->where('order_id', $orders->orderDetails->id)->get();
        // $orders=Order::with('userGet')->get();
        // dd($orders);
        return view('backend.admin.order.list.invoice', compact('orders'));
    }

    public function dompdf(Request $request, $id)
    {
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->find($id);
        $order_id = $orders->orderDetails->id;
        $orders = Order::with('orderDetails')->where('id', $order_id);
        $data = [
            'orders' => $orders,
        ];
        view()->share('data',$data);
        $pdf = Pdf::loadView('backend.admin.order.list.dompdf', $data)->setOptions(['defaultFont' => 'sans-serif'])->setOptions(['isRemoteEnabled'=> true]);
        return $pdf->stream('invoice.pdf');

    }

    public function fullpdf()
    {
        $orders = OrderDetail::with('orderDetails')->get();
        // return view('backend.admin.order.list.index', compact('orders'));
        // $data = Employee::all();
        // share data to view
        view()->share('orders',$orders);
        // $pdf = PDF::loadView('pdf_view', $data);
        // // download PDF file with download method
        // return $pdf->download('pdf_file.pdf');


        $pdf = Pdf::loadView('backend.admin.order.list.index', $orders);//->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // $pdf = \PDF::loadView('productType.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}

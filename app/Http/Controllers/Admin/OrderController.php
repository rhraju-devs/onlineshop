<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
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
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->find($id);
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->where('order_id', $orders->orderDetails->id)->get();
        // $orders=Order::with('userGet')->get();
        // dd($orders);
        return view('backend.admin.order.list.invoice', compact('orders'));
    }

    public function dompdf(Request $request, $id)
    {
        $orders = OrderDetail::with(['orderDetails', 'getProduct'])->find($id);
        $status = $orders->orderDetails->status;
        $firstname = $orders->orderDetails->firstname;
        $lastname = $orders->orderDetails->lastname;
        $address = $orders->orderDetails->address;
        $order_create = $orders->orderDetails->created_at->format('D, d F, Y');
        $order_id = $orders->orderDetails->id;
        $order = OrderDetail::with(['orderDetails', 'getProduct'])->where('order_id', $order_id)->get()->toArray();
        $product_name = $orders->getProduct->product_name;
        $product_quantity =$orders->quantity;
        $product_price = $orders->unit_price;
        $subtotal = $orders->subtotal;
        // dd($product_name, $product_quantity, $product_price, $subtotal);
       foreach($orders as $key=>$orderData){
        $orderData;

       }
    //    dd($orders);
        $data = [
            'order_id' => $order_id,
            'order_create' => $order_create,
            'order' => $order,
            'status' => $status,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'address' => $address,
            'orderData' => $orderData,
            'product_name' => $product_name,
            'product_quantity' => $product_quantity, 
            'product_price' => $product_price,
            'subtotal' => $subtotal,
        ];

        view()->share('data',$data);
        $pdf = Pdf::loadView('backend.admin.order.list.dompdf', $data)->setOptions(['defaultFont' => 'sans-serif'])->setOptions(['isRemoteEnabled'=> true]);
        // return $pdf->download('invoice.pdf');
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

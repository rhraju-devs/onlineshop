<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('frontend.pages.checkout.checkout');
    }

    public function store(Request $request)
    {
        // dd($request);
        $carts= session()->get('cart');
        $cart_totalwith_vat = session()->get('cart_total');
        // dd($carts);
//dd($carts);
        if($carts)
        {
            $order=Order::create([
                'user_id'=>auth()->user()->id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'zip' => $request->zip,
                'shipping' => $request->shipping,
                'total_price' => $request->shipping + $cart_totalwith_vat,
            ]);
            // dd($order);

            // insert details into order details table
            foreach ($carts as $cart)
            {
                OrderDetail::create([
                    'order_id'=> $order->id,
                    'product_id'=>$cart['product_id'],
                    'unit_price'=>$cart['product_price'],
                    'quantity'=>$cart['product_qty'],
                    'subtotal'=>$cart['product_qty'] * $cart['product_price'] ,
                ]);
            }
            session()->forget('cart');
            session()->forget('cart_total');
            return redirect()->route('frontend.dashboard')->with('message','Order Placed Successfully.');
        }
        
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CustomerDashboardController extends Controller
{
    public function dashboard()
    {
        return view('frontend.dashboard.dashboard');
    }

    public function orderlist()
    {
        return view('frontend.dashboard.order_list');
    }

    public function details()
    {
        return view('frontend.dashboard.account_details');
    }

    public function address()
    {
        return view('frontend.dashboard.address');
    }

    public function invoice($id)
    {
        $orders = Order::with('orderDetails')->find($id);
        return view('frontend.dashboard.invoice', compact('orders'));
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

    public function delete($id)
    {
        $order = Order::with('orderDetails')->find($id)->delete();
        return redirect()->back();
    }

    public function changePassword()
    {
        return view('frontend.dashboard.changepassword');
    }

    public function passwordUpdate(Request $request)
    {
        // dd($request->all());
        $rules = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
// dd($rules);

        if(Hash::check($request->old_password, auth()->user()->password))
        {
            User::whereId(auth()->user()->id)->update([
                'password' => bcrypt($request->password),
            ]);
            return redirect()->route('frontend.customer.dashboard');
        }
        else{
            return redirect()->back();
        }

    }
}

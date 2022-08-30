<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}

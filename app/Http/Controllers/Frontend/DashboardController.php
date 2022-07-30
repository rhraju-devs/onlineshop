<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('frontend.pages.dashboard');
    }

    public function wishlist()
    {
        return view('frontend.pages.wishlist.index');
    }

    public function contact_us()
    {
        return view('frontend.pages.contactUs.index');
    }

    public function about_us()
    {
        return view('frontend.pages.aboutUs.index');
    }
    public function checkout_1()
    {

    }
    public function checkout_2()
    {
        
    }

    public function checkout_3()
    {
        
    }

    public function checkout_4()
    {
        
    }

    public function checkout_5()
    {
        
    }

    public function cart()
    {

    }
}

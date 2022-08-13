<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\MailContact;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Brian2694\Toastr\Facades\Toastr;
// Mail class import
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // dd($request->search);
        $search = $request['search'] ?? "";
        // dd($search);
        if($search != ""){
            // dd($search);
            $products = Product::where('product_name', 'LIKE', '%' .$search.'%')->with('images')->get();
            // dd($products);
        }else{
        $products = Product::with('images')->get();
        }

        $brands = Brand::all();
        $categories = Category::all();
        $featureproducts = Product::where('feature_product', 'yes')->get();
        return view('frontend.pages.dashboard.frontend_dashboard', compact('products', 'brands', 'categories', 'featureproducts'));
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
    public function sendEmail(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email, 
            'subject' => $request->subject,
            'issue' => $request->issue,
            'message' => $request->message,
        ];
        // dd($data);
    Mail::to('receiver@gmail.com')->send(new MailContact($data));
    Toastr::success('Thanks for Giving us Feedback');
    return redirect()->route('frontend.dashboard');
    }
}

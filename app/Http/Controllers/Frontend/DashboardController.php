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

use Illuminate\Notifications\Messages\VonageMessage;

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

        if($this->isOnline()){
            Mail::to('receiver@gmail.com')->send(new MailContact($data));
            Toastr::success('Thanks for Giving us Feedback');
            return redirect()->route('frontend.dashboard')->with('success', 'Thanks for giving us your feedback');
        }else{
            return "No connection! Check your Net Connection";
        }
        // dd($data);

    }

    public function isOnline($site = "https://www.youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the Vonage / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\VonageMessage
     */
    public function toVonage($notifiable)
    {
        
        return (new VonageMessage)
                    ->content('Your SMS message content')
                    ->from('15554443333');
    }

//     $users = User::select([‘id’, ‘first_name’, ‘last_name’])->get();
 
// foreach($users as $user) {
//     // Do something here
// }
}

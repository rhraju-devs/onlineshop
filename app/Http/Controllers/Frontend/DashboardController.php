<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session; 
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

    public function wishlist()
    {
        // dd(Session::get('cart'));
        return view('frontend.pages.wishlist.index');
    }
    
    public function addWishlist($id)
    {
        // dd($request->id);

        $product=Product::with('images')->find($id);
        
            // dd($product);
            // dd($product->images[0]->image);
        if(!isset($product))
        {
            //product not found
            Toastr::warning('Product not Found :)', 'Not Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            // dd($product);
            return redirect()->back();
        }
        $cartExist=session()->get('wishlist');

        if(session()->forget('wishlist')){
            return 'success';
        }

        //cart is empty start
        if($cartExist == null) {
            //case 01: cart is empty.
            //  action: add product to cart
            if($product->product_quantity>=1){
                // dd($product->product_quantity);
                $cartData = [
                    $id => [
                        'product_id' => $id,
                        'product_image' => $product->images[0]->image,
                        'product_name' => $product->product_name,
                        'product_price' => $product->product_price,
                        'product_qty' => 1,
                        'subtotal'=>$product->product_price ,
                    ]
                ];
                // session cart variable data added
                session()->put('wishlist', $cartData);
                // session()->flush();
                // dd(session()->get('cart'));
                Toastr::success('Added to Cart successfully','Success');
                return redirect()->back();
            }
            // product quantity not available
            else{
                Toastr::error('Stock Out','Sorry !!!');
            }
            return redirect()->back();
        }
        //cart empty end

        // cart is not empty. but product does not exist into the cart
        // if(!isset($cartExist[$id]))
        if(array_key_exists($id, $cartExist))
        {

            //increment quantity of existing product.
            $cartExist[$id]['product_qty']+=1;
            // dd($cartExist[$id]['product_qty']);
            if($product->product_quantity>=$cartExist[$id]['product_qty'])
            {
                $getCart[$id]['subtotal']=$cartExist[$id]['product_qty']*$cartExist[$id]['product_price'];
                session()->put('wishlist',$cartExist);
                return redirect()->back()->with('message','Product Quantity Updated.');
            }
            return redirect()->back()->with('message','Product Stock out.');
        }else
        {
            //if not empty but product is different step 3
            if($product->product_quantity>=1)
            {
                $cartExist[$id]=[
                    'product_id' => $id,
                    'product_image' => $product->images[0]->image,
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'product_qty' => 1,
                    'subtotal'=>$product->product_price ,
                ];
                session()->put('wishlist',$cartExist);
                return redirect()->back()->with('message','Product Added to Cart.');
            }
            return redirect()->back()->with('message','Product Stock Out.');
        }
        // cart is not empty. but product does not exist into the cart

                // dd(session()->get('cart'));
                // return redirect()->route('product.cart.view');
    }


}

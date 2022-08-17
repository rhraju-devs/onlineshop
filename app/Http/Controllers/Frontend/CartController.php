<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Product;
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function cartView()
    {
        return view('frontend.pages.cart.cart');
    }


    public function addToCart($id)
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
        $cartExist=session()->get('cart');


        //cart is empty start
        if(!is_null($cartExist)) {
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
                session()->put('cart', $cartData);
                // session()->flush();
                // dd(session()->get('cart'));
                Toastr::success('Added to Cart successfully','Success');
                return redirect()->route('product.cart.view');
            }
            // product quantity not available
            else{
                Toastr::error('Stock Out','Sorry !!!');
            }
            return redirect()->back();
        }
        //cart empty end

        // cart is not empty. but product does not exist into the cart
        // cart is not empty. but product does not exist into the cart

                // dd(session()->get('cart'));
    }
}

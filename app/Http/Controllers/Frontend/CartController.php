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

        if(session()->forget('cart')){
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
                session()->put('cart', $cartData);
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
                session()->put('cart',$cartExist);
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
                session()->put('cart',$cartExist);
                return redirect()->back()->with('message','Product Added to Cart.');
            }
            return redirect()->back()->with('message','Product Stock Out.');
        }
        // cart is not empty. but product does not exist into the cart

                // dd(session()->get('cart'));
                return redirect()->route('product.cart.view');
    }

    public function clearCart(){
        session()->forget('cart');
        return redirect()->back()->with('message','Cart Clear');
    }

    public function deleteCartItem($id)
    {
        $updatedCart=session()->get('cart');
        unset($updatedCart[$id]);
        session()->put('cart',$updatedCart);

        return redirect()->back()->with('message','Item deleted.');
    }

    public function updateCart(Request $request,$id)
    {
        // dd($id);
        // dd($request->all());
        $getCart=session()->get('cart');
// dd($getCart);
        $product=Product::find($id);
        // dd($product);
        if($product->product_quantity>=$request->quantity)
        {
            $getCart[$id]['product_qty']=$request->quantity;
            $getCart[$id]['subtotal']=$request->quantity * $getCart[$id]['product_price'];
// dd($getCart);
            session()->put('cart',$getCart);
            return redirect()->back()->with('message','Product Quantity Updated');
        }
        return redirect()->back()->with('message','Product Stock Out.');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
//    add to cart
    public function addToCart($id)
    {

        $product=Product::find($id);
        if(!$product)
        {
            //product not found
            return redirect()->back();
        }
        // session cart variable
        $cartExist=session()->get('cart');

        if(!$cartExist) {
            //case 01: cart is empty.
            //  action: add product to cart
            if($product->available_quantity>=1){
                $cartData = [
                    $id => [
                        'product_id' => $id,
                        'product_name' => $product->product_name,
                        'product_price' => $product->product_price,
                        'product_qty' => 1,
                        'subtotal'=>$product->product_price ,
                    ]
                ];
                // session cart variable data added
                session()->put('cart', $cartData);
                Toastr::success('Added to Cart successfully','Success');
            }
            // product quantity not available
            else{
                Toastr::error('Stock Out','Sorry !!!');
            }
            return redirect()->back();

        }

        //case 02: cart is not empty. but product does not exist into the cart
        //action: add different product with quantity 1
        if(!isset($cartExist[$id]))
        {
            if($product->available_quantity>=1){
                $cartExist[$id] = [
                    'product_id' => $id,
                    'product_name' => $product->product_name,
                    'product_price' => $product->product_price,
                    'product_qty' => 1,
                    'subtotal'=>$product->product_price,
                ];

                session()->put('cart', $cartExist);
                Toastr::success('Added to Cart successfully','Success');

            }
            else{
                Toastr::error('Stock Out','Sorry !!!');
            }
            return redirect()->back();


        }


        //case 03: product exist into cart
        //action: increase product quantity (quantity+1)
        if($product->available_quantity >= $cartExist[$id]['product_qty']){
            $cartExist[$id]['product_qty']=$cartExist[$id]['product_qty']+1;
            # for updating the subtotal
            $cartExist[$id]['subtotal'] = $cartExist[$id]['product_price'] * $cartExist[$id]['product_qty'];

            session()->put('cart', $cartExist);
            Toastr::success('Cart updated successfully','Success');
        }
        else{
            Toastr::error('Stock Out','Sorry !!!');
        }
        return redirect()->back();
    }

    public function addToCartUpdate(Request $request,$product_id)
    {
        $getCart=session()->get('cart');

        $product=Product::find($product_id);
        if($product->available_quantity>=$request->quantity)
        {
            $getCart[$product_id]['product_qty']+=$request->quantity;
            $getCart[$product_id]['subtotal']=$request->quantity *$getCart[$product_id]['product_price'];

            session()->put('cart',$getCart);
            Toastr::success('Product Quantity on Cart updated ','Success');
            return redirect()->back();
        }
        Toastr::error('Stock Out','Sorry !!!');
        return redirect()->back();
    }
}
@extends('frontend.master')
@section('css')
<!-- //add css link here -->
@endsection

@section('frontend_content')
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Cart</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Cart Area -->
    <div class="cart_area section_padding_100_70 clearfix">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12">
                    <div class="cart-table">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-30">
                                <thead>
                                    <tr>
                                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                            
                                @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)


                                            <tr>
                                                <th scope="row">
                                                    <a href="{{route('delete.cart.item', $id)}}">
                                                        <i class="icofont-close"></i>
                                                    </a>
                                                </th>
                                                <td>
                                                    <img src="{{url('/uploads/product_images/', $details['product_image'])}}" alt="Product">
                                                </td>
                                                <td>
                                                    <a href="#">{{$details['product_name']}}</a>
                                                </td>
                                                <td>BDT. {{number_format($details['product_price'], 2)}} &#2547;</td>
                                                <td>
                                                    <div class="quantity">
                                                        <form action="{{route('product.cart.update', $id)}}" method="get">
                                                            <input type="number" class="qty-text mx-3" id="qty2" step="1" min="1"  name="quantity" value="{{ $details['product_qty'] }}">
                                                            <button type="submit" class="btn btn-primary btn-sm" rel="noopener noreferrer">
                                                                <i class="icofont-refresh"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                                <td>BDT. {{number_format($details['product_price'] * $details['product_qty'], 2) }} &#2547;</td>
                                            </tr>
                                        @endforeach

                                    @else
                                            <tr>
                                                <th colspan="6">No Cart Product Available</th>
                                            </tr>

                                    @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>


                    <div class="cart-footer text-right">
                        <div class="back-to-shop float-right">
                            <a href="{{route('clear.cart')}}" class="btn btn-primary">Delete All Item</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="cart-apply-coupon mb-30">
                        <h6>Have a Coupon?</h6>
                        <p>Enter your coupon code here &amp; get awesome discounts!</p>
                        <!-- Form -->
                        <div class="coupon-form">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Enter Your Coupon Code">
                                <button type="submit" class="btn btn-primary">Apply Coupon</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="cart-total-area mb-30">
                        <h5 class="mb-3">Cart Totals</h5>
                        <div class="table-responsive">
                            <table class="table mb-3">
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>$56.00</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$10.00</td>
                                    </tr>
                                    <tr>
                                        <td>VAT (10%)</td>
                                        <td>$5.60</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>$71.60</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="checkout-1.html" class="btn btn-primary d-block">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@extends('frontend.master')

@section('frontend_content')


    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Wishlist</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Wishlist Table Area -->
    <div class="wishlist-table section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table wishlist-table">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-30">
                                <thead>
                                    <tr>
                                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                
                                @if(session('wishlist'))
                                        @foreach(session('wishlist') as $id => $details)
                                       {{-- @dd(session('wishlist'))--}}
                                    <tr>
                                        <th scope="row">
                                            <i class="icofont-close"></i>
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
                                                <input type="number" class="qty-text" id="qty2" step="1" min="1"  name="quantity" value="{{ $details['product_qty'] }}">
                                            </div>
                                        </td>
                                        <td><a href="{{route('product.add.cart', $id)}}" class="btn btn-primary btn-sm">Add to Cart</a></td>
                                    </tr>
                                    @endforeach

                                    @else
                                            <tr>
                                                <th colspan="6">No Wishlist Product Available</th>
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
                                        <th scope="col"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="cart-footer text-right">
                        <div class="back-to-shop float-left">
                            <a href="#" class="btn btn-primary">Delete All Item</a>
                        </div>

                        <div class="back-to-shop float-right">
                            <a href="#" class="btn btn-primary">Add All Item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Table Area -->
@endsection
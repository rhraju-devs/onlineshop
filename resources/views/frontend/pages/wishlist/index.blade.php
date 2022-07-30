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
                                    <tr>
                                        <th scope="row">
                                            <i class="icofont-close"></i>
                                        </th>
                                        <td>
                                            <img src="{{url('/frontend/img/product-img/onsale-1.png')}}" alt="Product">
                                        </td>
                                        <td>
                                            <a href="#">Bluetooth Speaker</a>
                                        </td>
                                        <td>$9</td>
                                        <td>
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty2" step="1" min="1" max="99" name="quantity" value="1">
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Add to Cart</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <i class="icofont-close"></i>
                                        </th>
                                        <td>
                                            <img src="{{url('/frontend/img/product-img/onsale-2.png')}}" alt="Product">
                                        </td>
                                        <td>
                                            <a href="#">Roof Lamp</a>
                                        </td>
                                        <td>$11</td>
                                        <td>
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty3" step="1" min="1" max="99" name="quantity" value="1">
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Add to Cart</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <i class="icofont-close"></i>
                                        </th>
                                        <td>
                                            <img src="{{url('/frontend/img/product-img/onsale-6.png')}}" alt="Product">
                                        </td>
                                        <td>
                                            <a href="#">Cotton T-shirt</a>
                                        </td>
                                        <td>$6</td>
                                        <td>
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty4" step="1" min="1" max="99" name="quantity" value="1">
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Add to Cart</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <i class="icofont-close"></i>
                                        </th>
                                        <td>
                                            <img src="{{url('/frontend/img/product-img/onsale-4.png')}}" alt="Product">
                                        </td>
                                        <td>
                                            <a href="#">Water Bottle</a>
                                        </td>
                                        <td>$17</td>
                                        <td>
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty5" step="1" min="1" max="99" name="quantity" value="1">
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Add to Cart</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <i class="icofont-close"></i>
                                        </th>
                                        <td>
                                            <img src="{{url('frontend/img/product-img/onsale-5.png')}}" alt="Product">
                                        </td>
                                        <td>
                                            <a href="#">Alka Sliper</a>
                                        </td>
                                        <td>$13</td>
                                        <td>
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty6" step="1" min="1" max="99" name="quantity" value="1">
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Add to Cart</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="cart-footer text-right">
                        <div class="back-to-shop">
                            <a href="#" class="btn btn-primary">Add All Item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Table Area -->
@endsection
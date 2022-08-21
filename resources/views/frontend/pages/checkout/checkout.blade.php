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
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-4">Checkout Details</h5>
                        <form action="{{route('frontend.checkout.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" placeholder="First Name" name="firstname" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="lastname" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" class="form-control" id="email_address" placeholder="Email Address" name="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" class="form-control" id="phone_number" min="0" name="phone">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="street_address">Shipping Address</label>
                                    <input type="text" class="form-control" id="street_address" placeholder="Street Address" name="address">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" id="postcode" placeholder="Postcode / Zip" name="zip">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="shipping">shipping</label>
                                    @if($shipping->count()>0)
                                        <select name="shipping" id="shipping" class="form-select col-md-6" aria-label="Default select example">
                                            <option selected disabled></option>
                                            @foreach($shipping as $key=>$data)
                                            <option value="{{$data->price}}">BDT. {{$data->price}} &#2547; || {{$data->type}}</option>
                                            @endforeach
                                        </select>
                                        @else

                                    @endif
                                </div>


                                <div class="col-md-6 mb-3">
                                    <button type="reset" class="btn btn-primary mt-2 ml-2">Reset</button>
                                     <button type="submit" class="btn btn-primary mt-2 ml-2">Submit</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="checkout_pagination d-flex justify-content-end mt-50">
                        <a href="{{route('frontend.dashboard')}}" class="btn btn-primary mt-2 ml-2">Home</a>
                        <a href="{{route('frontend.grid.product')}}" class="btn btn-primary mt-2 ml-2">All Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area -->
@endsection
@extends('frontend.master')

@section('frontend_content')
<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>My Account</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('frontend.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- My Account Area -->
<section class="my-account-area section_padding_100_50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="my-account-navigation mb-50">
                    <ul>
                        <li><a href="{{route('frontend.customer.dashboard')}}">Dashboard</a></li>
                        <li class="active"><a href="{{route('frontend.customer.orderlist')}}">Orders</a></li>
                        <li><a href="downloads.html">Downloads</a></li>
                        <li><a href="{{route('frontend.customer.address')}}">Addresses</a></li>
                        <li><a href="{{route('frontend.customer.details')}}">Account Details</a></li>
                        <li><a href="{{route('frontend.customer.change.password')}}">Change Password</a></li>
                        <li><a href="{{route('customer.logout')}}">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="my-account-content mb-50">
                    <div class="cart-table">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">S.L</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Shipping</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $orders = App\Models\Order::with('orderDetails')->where('user_id', auth()->user()->id)->get();
                                    @endphp
                                    @if($orders->count()>0)
                                    @foreach($orders as $key=>$data)
                                    <tr>
                                        <td scope="col">{{$key+1}}</td>
                                        <td scope="col">{{$data->firstname}} {{$data->lastname}}</td>
                                        <td scope="col">{{$data->email}}</td>
                                        <td scope="col">#{{$data->id}}</td>
                                        <td scope="col">{{$data->shipping}}</td>
                                        <td scope="col">{{$data->total_price}}</td>
                                        <td scope="col">
                                            @if($data->payment_method == 'cod')
                                            <span
                                                class="badge rounded-pill badge-primary text-uppercase">{{$data->payment_method}}</span>
                                            @elseif($data->payment_method == 'ssl')
                                            <span
                                                class="badge rounded-pill badge-info text-uppercase">{{$data->payment_method}}</span>
                                            @endif
                                        </td>
                                        <td scope="col">
                                            @if($data->status=='pending')
                                            <span class="badge badge-primary text-uppercase">{{$data->status}}</span>
                                            @elseif($data->status=='approved')
                                            <span class="badge badge-info text-uppercase">{{$data->status}}</span>
                                            @elseif($data->status=='delivered')
                                            <span class="badge badge-success text-uppercase">{{$data->status}}</span>
                                            @elseif($data->status =='cancel')
                                            <span class="badge badge-danger text-uppercase">{{$data->status}}</span>
                                            @elseif($data->staus == 'received')
                                            <span class="badge badge-success text-uppercase">{{$data->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('frontend.customer.invoice', $data->id)}}"
                                                data-toggle="tooltip" title="View" data-placement="bottom"
                                                class="btn btn-outline-success btn-sm"><img
                                                    src="{{url('icon/eye.svg')}}" alt="" srcset=""></a>

                                            <a href="{{route('frontend.customer.pdf', $data->id)}}"
                                                data-toggle="tooltip" title="DomPDF" data-placement="bottom"
                                                class="btn btn-outline-success btn-sm"><img
                                                    src="{{url('icon/pdf.svg')}}" alt="" srcset=""></a>

                                            <a href="{{route('forntend.customer.delete', $data->id)}}" data-toggle="tooltip" title="Delete" data-placement="bottom"
                                                class="btn btn-outline-danger btn-sm"><img
                                                    src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">No Order Data Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <th scope="col">S.L</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Shipping</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- My Account Area -->

@endsection

@extends('backend.master')

@section('admin_breadcrumb')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Admin Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('admin.customer.list')}}">Customer</a></li>
                        <li class="breadcrumb-item"><a href="#">View Customer Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
@endsection

@section('admin_dashboard_content')
    <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Customer</h5> 
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row my-4">
                                        <div class="col-md-6 col-lg-6">
                                            <h4 class="mb-4 float-left">Customer Details</h4>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <a class="float-right btn btn-outline-info" href="{{route('admin.customer.list')}}">Customer List</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 text-center">
                                            <img class="w-100 border-radius-lg shadow-lg mx-auto"
                                                src="{{url('/uploads/customers/' . $customer->photo)}}" alt="{{$customer->phot}}">
                                        </div>
                                        <div class="col-lg-6 mx-auto">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6">
                                                    <h5>Full Name : </h5>
                                                    <h3 class="mt-lg-0 mt-4">{{$customer->firstname}} {{$customer->lastname}}</h3>
                                                </div>

                                                <div class="col-md-6 col-lg-6">
                                                    <h5>User Name </h5>
                                                    <h3 class="mt-lg-0 mt-4">{{$customer->username}}</h3>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-12 col-lg-12">
                                                    <h5>Email Address : </h5>
                                                    <h3>{{$customer->email}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>

@endsection

@push('scripts')

@endpush
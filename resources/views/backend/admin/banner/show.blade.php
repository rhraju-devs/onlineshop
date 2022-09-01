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
                        <li class="breadcrumb-item"><a href="{{route('admin.banner.list')}}">Banner</a></li>
                        <li class="breadcrumb-item"><a href="#">View Banner</a></li>
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
                        <h5>Banner</h5> 
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
                                            <span class="mb-4 text-left">Banner Details</span>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <a class="text-right btn btn-outline-info" href="{{route('admin.banner.list')}}">Banner List</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-5 col-lg-6 text-center">
                                            <img class="w-100 border-radius-lg shadow-lg mx-auto"
                                                src="{{url('uploads/banner/' . $banner->photo)}}" alt="{{url('uploads/banner/' . $banner->photo)}}">
                                        </div>
                                        <div class="col-lg-6 mx-auto">
                                            <h4>Banner Title : </h4>
                                            <h3 class="mt-lg-0 mt-4">{{$banner->title}}</h3>

                                            <h4>Banner Description : </h4>
                                            <h3 class="mt-lg-0 mt-4">{{$banner->description}}</h3>

                                            <h4>Banner Sub Title : </h4>
                                            <h3 class="mt-lg-0 mt-4">{{$banner->subtitle}}</h3>

                                            <h4>Banner Button : </h4>
                                            <h3 class="mt-lg-0 mt-4">{{$banner->button}}</h3>

                                            <h4>Banner Offer : </h4>
                                            <h3 class="mt-lg-0 mt-4">{{$banner->offer}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- [ sample-page ] end -->
    </div>

@endsection

@push('scripts')
    <!-- Data Table Plugin -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

@if(Session::has('error'))
            <script>
                toastr.error("{!! Session::get('error') !!}");
            </script>
    @endif

    @if(Session::has('success'))
            <script>
                toastr.success("{!! Session::get('success') !!}");
            </script>
    @endif
@endpush
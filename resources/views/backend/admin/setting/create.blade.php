@extends('backend.master')
@section('css')
<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

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
                        <li class="breadcrumb-item"><a href="{{route('admin.setting.details')}}">Setting</a></li>
                        <li class="breadcrumb-item"><a href="#">Create Setting</a></li>
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
                <h5>Setting</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <a class="btn btn-outline-info float-left"
                                        href="{{route('admin.setting.details')}}">Setting View</a>
                                </div>
                                <div class="col-md-6 col-lg-6 float-right">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    @if(count($errors) > 0 )
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <ul class="p-0 m-0" style="list-style: none;">
                                                @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="m-3" action="{{route('admin.setting.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                placeholder="Enter 14 digit's Phone Number">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tel_number" class="form-label">Tel Number :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="tel_number" name="tel_number"
                                                placeholder="+8809638860924">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Enter Address">
                                        </div>

                                        <div class="mb-3">
                                            <label  class="form-label">Website Description :<span
                                                    class="text-danger"> *</span></label>
                                            <textarea id="summernote1" name="discription" class="form-control"
                                                "></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="photo" class="form-label">Website Feature  Photos :<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="logo" class="form-label">Website Logo:<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="file" class="form-control" id="logo" name="logo">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="reset" class="btn btn-primary">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote1').summernote({
            height: 200,
        });
        $('.dropdrown-toggle').dropdown();
    });
</script>
@endpush

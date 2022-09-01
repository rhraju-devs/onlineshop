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
                        <li class="breadcrumb-item"><a href="{{route('admin.brand.list')}}">Brand</a></li>
                        <li class="breadcrumb-item"><a href="#">Add Brand</a></li>
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
                        <h5>Brand</h5> 
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
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <a class="btn btn-outline-info align-right" href="{{route('admin.brand.list')}}">Brand List</a>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                        <p class="fw-bold">Total Brand : {{$brands->count()}}</p>
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

                                            <form class="m-3" action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Brand Name :<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Brand Name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Brand Description :<span class="text-danger"> *</span></label>
                                                    <textarea id="summernote2" name="description" class="form-control" id="description" class="form-control"
                                                        placeholder="Enter Brand Description"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="summary" class="form-label">Brand Summary :<span class="text-danger"> *</span></label>
                                                    <textarea id="summernote1" name="summary" class="form-control" id="summary"
                                                        placeholder="Enter Brand Summary"></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">Brand Photos :<span class="text-danger"> *</span></label>
                                                            <!-- <input type="file" class="form-control" id="photos[]" name="photo" multiple> -->
                                                            <input type="file" class="form-control" id="photo" name="photo" multiple>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">brand Status :<span class="text-danger"> *</span></label>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text" for="status">Options</label>
                                                            </div>
                                                            <select name='status' class="custom-select" id="status">
                                                                <option selected>Choose...</option>
                                                                <option value="active">Active</option>
                                                                <option value="inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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
        <!-- [ Main Content ] end -->
@endsection

@push('scripts')
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote({
                height : 200,
            });
            $('.dropdrown-toggle').dropdown();   
        });
        $(document).ready(function() {
            $('#summernote2').summernote({
                height : 200,
            });
            $('.dropdrown-toggle').dropdown();   
        });
    </script>

@endpush
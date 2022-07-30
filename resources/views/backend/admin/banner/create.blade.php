@extends('backend.master')

@section('css')

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
                                    <a class="btn btn-outline-info align-right" href="{{route('admin.banner.list')}}">Banner List</a>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <p class="fw-bold">Total Banner : {{$banners->count()}}</p>
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

                                    <form class="m-3" action="{{route('admin.banner.store')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Banner Title :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter Banner Title">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Banner Description :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" name="description" class="form-control" id="description"
                                                class="form-control" placeholder="Enter Banner Description">
                                        </div>
                                        <div class="mb-3">
                                            <label for="subtitle" class="form-label">Banner Subtitle :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" name="subtitle" class="form-control" id="subtitle"
                                                placeholder="Enter Banner Subtitle">
                                        </div>

                                        <div class="mb-3">
                                            <label for="offer" class="form-label">Banner Offer :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" name="offer" class="form-control" id="offer"
                                                placeholder="Enter Banner Offer">
                                        </div>

                                        <div class="mb-3">
                                            <label for="button" class="form-label">Banner Button :<span class="text-danger"> *</span></label>
                                            <input type="text" name="button" class="form-control" id="button" placeholder="Enter Banner Button">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="photo" class="form-label">Banner Photo :<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="photo" class="form-label">Banner Status :<span
                                                            class="text-danger"> *</span></label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="status">Options</label>
                                                    </div>
                                                    <select name='status' class="custom-select" id="status">
                                                        <option selected>Choose Banner Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="reset" class="btn btn-primary btn-lg m-r-5">Reset</button>
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

@endpush

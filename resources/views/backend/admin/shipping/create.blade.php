@extends('backend.master')

@section('css')

@endsection

@section('admin_dashboard_content')

<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Shipping</h5>
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
                                    <a class="btn btn-outline-info align-right" href="{{route('admin.shipping.list')}}">shipping List</a>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <p class="fw-bold">Total Shipping : {{$shipping->count()}}</p>
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

                                    <form class="m-3" action="{{route('admin.shipping.store')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Shipping Type :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="type" name="type"
                                                placeholder="Enter Shipping Type" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="delivery_time" class="form-label">Delivery Time :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="delivery_time" name="delivery_time"
                                                placeholder="Delivery Time" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Shipping Price :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="number" name="price" class="form-control" id="price"
                                                class="form-control" placeholder="Enter Shipping Price" required>
                                        </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Shipping Status :<span
                                                            class="text-danger"> *</span></label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="status">Options</label>
                                                    </div>
                                                    <select name='status' class="custom-select" id="status">
                                                        <option selected>Choose Shipping Status</option>
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


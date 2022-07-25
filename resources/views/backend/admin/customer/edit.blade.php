@extends('backend.master')
@section('css')
<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('admin_dashboard_content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Customer</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        Maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
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
                                        href="{{route('admin.customer.list')}}">Customer List</a>
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
                                    <form class="m-3" action="{{route('admin.customer.update', $customer->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Full Name :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="fullname" name="fullname"
                                                value="{{$customer->fullname}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">User Name :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="username" name="username"
                                            value="{{$customer->username}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="address" name="address"
                                            value="{{$customer->address}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                            value="{{$customer->email}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                            value="{{$customer->password}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Photo :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="file" class="form-control" id="photo" name="photo"
                                            value="{{$customer->photo}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                            value="{{$customer->phone}}">
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3">
                                                    <label for="status" class="form-label">Customer Status :<span
                                                            class="text-danger"> *</span></label>
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="status">Options</label>
                                                    </div>
                                                    <select name='status' class="custom-select" id="status">
                                                        <option>Status</option>
                                                        <option @if($customer->status == 'active') selected @endif value="active">Active</option>
                                                        <option @if($customer->status == 'inactive') selected @endif value="inactive">Inactive</option>
                                                    </select>
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


@endpush

@extends('frontend.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@endsection


@section('frontend_content')
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Customer Registration</h3>


                <div class="modal-body">

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

                    <form class="m-3" action="{{route('customer.registration')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name :<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name :<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter User Name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email :<span class="text-danger"> *</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password :<span class="text-danger">
                                    *</span></label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo :<span class="text-danger"> *</span></label>
                            <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone :<span class="text-danger"> *</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address :<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <div class="input-group mb-3">
                                    <label for="status" class="form-label">Customer Status :<span class="text-danger">
                                            *</span></label>
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="status">Options</label>
                                    </div>
                                    <select name='status' class="custom-select" id="status">
                                        <option selected>Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <button type="reset" class="btn btn-primary close">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Vendor
                    Registration</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Vendor Registration</h3>

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

                <form class="m-3" action="{{route('vendor.registration')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname"
                            placeholder="Enter Full Name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter User Name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email :<span class="text-danger"> *</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email Address">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password :<span class="text-danger"> *</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Password">
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo :<span class="text-danger"> *</span></label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone :<span class="text-danger"> *</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>

                    <div class="mb-3">
                        <label for="summernote1" class="form-label">Description :<span class="text-danger">
                                *</span></label>
                        <textarea class="form-control" id="summernote1" name="description"
                            placeholder="Description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="zip" class="form-label">Zip Number :<span class="text-danger"> *</span></label>
                        <input type="number" class="form-control" id="zip" name="zip" placeholder="Enter Zip Number">
                    </div>

                    <div class="input-group mb-3">
                        <label for="product" class="form-label">Product :<span class="text-danger"> *</span></label>
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="product">Options</label>
                        </div>
                        <select name='product' class="custom-select" id="product">
                            <option selected>--> Select Product <--</option> <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="license" class="form-label">License Number :<span class="text-danger">
                                *</span></label>
                        <input type="number" class="form-control" id="license" name="license"
                            placeholder="Enter License Number">
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="input-group mb-3">
                                <label for="status" class="form-label">Vendor Status :<span class="text-danger">
                                        *</span></label>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status">Options</label>
                                </div>
                                <select name='status' class="custom-select" id="status">
                                    <option selected>Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <button type="reset" class="btn btn-primary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Customer
                    Registration</button>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Customer Registration</a>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
@endpush








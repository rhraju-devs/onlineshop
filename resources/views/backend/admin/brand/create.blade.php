@extends('backend.master')
@section('admin_dashboard_content')
<div style="background-color: #fff;" class="row">
    <div class="col-md-12 col-lg-12">
        <a class="btn btn-outline-info align-right" href="{{route('admin.brand.list')}}">Brand List</a>
    </div>

    <div class="col-md-12 col-lg-12">
        <h1>Create Brand</h1>
    </div>

    <div class="col-md-12 col-lg-12">

        <form class="m-3" action="{{route('admin.brand.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Brand Name :<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Brand Name">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Brand Description :<span class="text-danger"> *</span></label>
                <textarea name="description" class="form-control" id="description" class="form-control"
                    placeholder="Enter Brand Description"></textarea>
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Brand Summary :<span class="text-danger"> *</span></label>
                <textarea name="summary" class="form-control" id="summary"
                    placeholder="Enter Brand Summary"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Brand Photos :<span class="text-danger"> *</span></label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-lg-4">

                </div>
                <div class="col-md-4 col-lg-4">

                </div>
                <div class="col-md-4 col-lg-4">
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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
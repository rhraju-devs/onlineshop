@extends('backend.master')

@section('admin_dashboard_content')
<div style="background-color: #fff;" class="row">
    <div class="col-md-12 col-lg-12">
        <a class="btn btn-outline-info align-right" href="{{route('admin.product.list')}}">Product List</a>
    </div>

    <div class="col-md-12 col-lg-12">
        <h1>Create Product</h1>
    </div>

    <div class="col-md-12 col-lg-12">

        <form class="m-3" action="{{route('admin.product.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name :<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="name" name="product_name" placeholder="Enter Product Name">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Product Description :<span class="text-danger"> *</span></label>
                <textarea name="product_description" class="form-control" id="description" class="form-control"
                    placeholder="Enter Product Description"></textarea>
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Product Summary :<span class="text-danger"> *</span></label>
                <textarea name="product_summary" class="form-control" id="summary"
                    placeholder="Enter Product Summary"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Product Photos :<span class="text-danger"> *</span></label>
                        <input type="file" class="form-control" id="photo" name="product_photo">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="brand" class="form-label">Product Brand :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="brand" name="product_brand">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category Name :<span class="text-danger"> *</span></label>
                        <select name="product_category" class="form-select" aria-label="Default select example">
                        <option selected>Select Category</option>

                        <option value="1">Admin Name</option>
                        
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="sub_category" class="form-label">Sub Category Name :</label>
                        <input type="text" class="form-control" id="sub_category" name="product_sub_category">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Product Quantity :<span class="text-danger"> *</span></label>
                        <input type="number" class="form-control" id="quantity" name="product_quantity">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label for="price" class="form-label">Product Price :<span class="text-danger"> *</span></label>
                        <input type="number" class="form-control" id="price" name="product_price">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="mb-3">
                        <label for="weight" class="form-label">Product Weight :<span class="text-danger"> *</span></label>
                        <input type="number" class="form-control" id="weight" name="product_weight">
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
                        <select name='product_status' class="custom-select" id="status">
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

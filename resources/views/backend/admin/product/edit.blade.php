@extends('backend.master')

@section('css')
<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('admin_dashboard_content')
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Product View</h5>
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
                                    <a class="btn btn-outline-info float-left" href="{{route('admin.product.list')}}">Product List</a>
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

                                    <form enctype="multipart/form-data" class="m-3" action="{{route('admin.product.update', $product->id)}}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Product Name :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="name" name="product_name"
                                               value="{{$product->product_name}}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="summernote1" class="form-label">Product Description :<span
                                                    class="text-danger"> *</span></label>
                                            <textarea name="product_description" class="form-control" id="summernote1"
                                               >{{$product->product_description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="summernote2" class="form-label">Product Summary :<span
                                                    class="text-danger"> *</span></label>
                                            <textarea name="product_summary" class="form-control" id="summernote2"
                                                >{{$product->product_summary}}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="photo" class="form-label">Product Photos :<span
                                                            class="text-danger"> *</span></label>
                                                            <input type="file" id="photo" name="images[]" class="form-control" accept="image/*" multiple >
                                                        <div class="col-md-12">
                                                             @foreach ($images as $image)
                                                            <!-- <div class="card text-white bg-secondary mb-3" >
                                                                <div class="card-body"> -->
                                                                <img style="width: 70px; height: 70px" src="{{url('/uploads/product_images/' . $image->image)}}" class="mx-2 my-2">
                                                                <!-- </div>
                                                            </div> -->
                                                             @endforeach
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="brand" class="form-label">Brand Name :<span
                                                            class="text-danger"> *</span></label>
                                                    <select name="product_brand" id="brand" class="form-select"
                                                        aria-label="Default select example">
                                                        @foreach($brands as $brand)
                                                        <option @if($product->product_brand == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Parent Category Name :<span
                                                            class="text-danger"> *</span></label>
                                                    <select name="product_category" class="form-select"
                                                        aria-label="Default select example">

                                                        @foreach($categories as $category)
                                                        <option @if($product->product_category == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="sub_category" class="form-label">Sub-Category Name
                                                        :<span class="text-danger"> *</span></label>
                                                    <select name="product_sub_category" id="sub_category"
                                                        class="form-select" aria-label="Default select example">

                                                        @foreach($subcategories as $category)
                                                        <option @if($product->product_sub_category == $category->id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="mb-3">
                                                    <label for="quantity" class="form-label">Product Quantity :<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="number" class="form-control" id="quantity"
                                                        name="product_quantity" value="{{$product->product_quantity}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="mb-3">
                                                    <label for="price" class="form-label">Product Price :<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="number" class="form-control" id="price"
                                                        name="product_price" value="{{$product->product_price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <div class="mb-3">
                                                    <label for="weight" class="form-label">Product Weight :<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="number" class="form-control" id="weight"
                                                        name="product_weight" value="{{$product->product_weight}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                    <label for="feature_product" class="form-label">Feature Product :<span
                                                            class="text-danger"> *</span></label><br>
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="feature_product">Options</label>
                                                    </div>
                                                    <select name='feature_product' class="custom-select" id="feature_product">
                                                        <option @if($product->feature_product == 'yes') selected @endif value="yes">Yes</option>
                                                        <option @if($product->feature_product == 'no') selected @endif value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="input-group mb-3">
                                                <label for="status" class="form-label">Product Status :<span
                                                            class="text-danger"> *</span></label><br>
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="status">Options</label>
                                                    </div>

                                                    <select name='status' class="custom-select" id="status">
                                                        <option @if($product->status == 'active') selected @endif value="active">Active</option>
                                                        <option @if($product->status == 'inactive') selected @endif value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="reset" class="btn btn-primary">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
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
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote1').summernote({
            height: 200,
        });
        $('.dropdrown-toggle').dropdown();
    });
    $(document).ready(function () {
        $('#summernote2').summernote({
            height: 200,
        });
        $('.dropdrown-toggle').dropdown();
    });

</script>

@endpush


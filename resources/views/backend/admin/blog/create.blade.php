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
                <h5>Blog</h5>
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
                                        href="">Blog List</a>
                                </div>
                                <div class="col-md-6 col-lg-6 float-right">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <form class="m-3" action="" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Blog Title:<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Category Name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Blog Description :<span
                                                    class="text-danger"> *</span></label>
                                            <textarea id="summernote1" name="description" class="form-control"
                                                id="description" class="form-control"
                                                placeholder="Enter Blog Description"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="summary" class="form-label">Blog Summary :<span
                                                    class="text-danger"> *</span></label>
                                            <textarea id="summernote2" name="summary" class="form-control" id="summary"
                                                placeholder="Enter Blog Summary"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="photo" class="form-label">Blog Feature Photos :<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Blog Parent Category Name :<span
                                                            class="text-danger"> *</span></label>
                                                    <select name="product_category" class="form-select"
                                                        aria-label="Default select example">
                                                        <option selected>Select Blog Category</option>

                                                        <option value=""></option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="mb-3">
                                                    <label for="sub_category" class="form-label">Blog Sub-Category Name
                                                        :<span class="text-danger"> *</span></label>
                                                    <select name="product_sub_category" id="sub_category"
                                                        class="form-select" aria-label="Default select example">
                                                        <option selected>Select Blog Sub-Category</option>

                                                        <option value=""></option>

                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3">
                                                    <label for="status" class="form-label">Blog Status :<span
                                                            class="text-danger"> *</span></label>
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

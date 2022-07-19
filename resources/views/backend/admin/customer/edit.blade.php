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
                <h5>Category</h5>
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
                                        href="{{route('admin.category.list')}}">Category List</a>
                                </div>
                                <div class="col-md-6 col-lg-6 float-right">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <form class="m-3" action="" method="">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Full Name :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="fullname" name="fullname"
                                                placeholder="Enter Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">User Name :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Enter User Name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email Address">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Password">
                                        </div>

                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Photo :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="file" class="form-control" id="photo" name="photo"
                                                placeholder="Photo">
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                placeholder="phone">
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
    $(document).ready(function () {
        $('#summernote2').summernote({
            height: 200,
        });
        $('.dropdrown-toggle').dropdown();
    });

</script>

@endpush

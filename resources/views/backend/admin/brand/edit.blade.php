@extends('backend.master')

@section('css')
<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('admin_dashboard_content')
<div style="background-color: #fff;" class="row">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <a class="btn btn-outline-info align-right" href="{{route('admin.brand.list')}}">Brand List</a>
        </div>
        <div class="col-md-6 col-lg-6">
            <p class="fw-bold">Total Brand : {{$brands->count()}}</p>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <h1 class="fw-bold">Update Brand</h1>
    </div>

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

        <form class="m-3" action="{{route('admin.brand.update', $brands->id)}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Brand Name :<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{$brands->name}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Brand Description :<span class="text-danger">
                        *</span></label>
                <textarea id="summernote2" name="description" class="form-control" id="description" class="form-control"
                    value="{{$brands->description}}">{{$brands->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Brand Summary :<span class="text-danger"> *</span></label>
                <textarea id="summernote1" name="summary" class="form-control" id="summary"
                    value="{{$brands->summary}}">{{$brands->summary}}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Brand Photos :<span class="text-danger"> *</span></label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Brand Status :<span class="text-danger"> *</span></label>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="status">Options</label>
                        </div>
                        <select name='status' class="custom-select" id="status">
                            <!-- <option selected>Choose...</option> -->
                            <option @if($brands->status == 'active') selected @endif value="active">Active</option>
                            <option @if($brands->status == 'inactive') selected @endif value="inactive">Inactive
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="reset" class="btn btn-primary btn-lg">Cancel</button>
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
        </form>
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

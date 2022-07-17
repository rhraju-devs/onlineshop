@extends('backend.master')
@section('css')
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('admin_dashboard_content')

<div style="background-color: #fff;" class="row">
    <div class="col-md-12 col-lg-12">
        <a class="btn btn-outline-info align-right" href="{{route('admin.category.list')}}">Category List</a>
    </div>

    <div class="col-md-12 col-lg-12">
        <h1>Edit Category</h1>
    </div>

    <div class="col-md-12 col-lg-12">

        <form class="m-3" action="{{route('admin.category.update', $category->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Category Name :<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Category Description :<span class="text-danger"> *</span></label>
                <textarea id="summernote1" name="description" class="form-control" id="description" class="form-control"
                    value="{{$category->description}}"></textarea>
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Category Summary :<span class="text-danger"> *</span></label>
                <textarea id="summernote2" name="summary" class="form-control" id="summary"
                    value="{{$category->summary}}"></textarea>
            </div>

            <div class="mb-3">
                <label for="is_parent" class="form-label">Is Parent :<span class="text-danger"> *</span></label>
                <input onclick="myFunction()" type="checkbox" name="is_parent" id="is_parent">
            </div>

            <div class="input-group mb-3 parent_category">
                <label for="category_name" class="form-label">Parent Category :<span class="text-danger"> *</span></label>
                <div class="input-group-prepend">
                    <label class="input-group-text" for="category_name">Options</label>
                </div>
                <select name='parent_name' class="custom-select" id="">
                    <option selected >Choose Parent Category</option>
                     @foreach($category as $data)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach
                </select>
            </div>


            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="input-group mb-3">
                    <label for="status" class="form-label">Category Status :<span class="text-danger"> *</span></label>
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
            <div class="row">
            <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Category Photos :<span class="text-danger"> *</span></label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote({
                height : 200,
                placeholder: 'Enter your text',
            });
            $('.dropdrown-toggle').dropdown();   
        });
        $(document).ready(function() {
            $('#summernote2').summernote({
                height : 200,
                placeholder: 'Enter your text',
            });
            $('.dropdrown-toggle').dropdown();   
        });
    </script>
    <script>
        // $(document).ready(function(){
        //     $("#is_parent").click(function(){
        //         $("#parent_category").slideDown("slow");
        //     });
        // });
        function myFunction() {
            var x = document.getElementById("parent_category");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endpush
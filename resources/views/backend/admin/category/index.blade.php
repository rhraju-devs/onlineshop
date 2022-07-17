@extends('backend.master')

@section('css')
    <!-- Data table Plugin -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('admin_dashboard_content')
<div style="background-color: #fff;" class="row">
        <div class="col-md-12 col-lg-12">
            <a class="btn btn-outline-info align-right" href="{{route('admin.category.create')}}">Add Category</a>
        </div>

        <div class="col-md-12 col-lg-12">
            <h1>Category List</h1>
        </div>

        <div class="col-md-12 col-lg-12">
        <table id="data_table_set" class="table table-info table-responsive table-striped table-hover">

            <thead>
                <tr>
                    <th scope="col">S.L</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Image</th>
                    <th scope="col">Parent Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>

            </thead>
            <tbody class="table-group-divider">
                @foreach($categories as $key=>$category)
                    <tr>
                        <td scope="col">{{$key+1}}</td>
                        <td scope="col">{{$category->name}}</td>
                        <td scope="col">{{$category->slug}}</td>
                        <td scope="col">{{$category->description}}</td>
                        <td scope="col">{{$category->summary}}</td>
                        <td scope="col">{{$category->photo}}</td>
                        <td scope="col">{{$category->parent_name}}</td>
                        <td scope="col">{{$category->status}}</td>
                        <td scope="col">{{$category->created_at}}</td>
                        <td scope="col">{{$category->updated_at}}</td>
                        <td>
                            <a href="" data-toggle="tooltip" title="View" data-placement="bottom" class="btn btn-outline-success btn-sm"><img src="{{url('icon/eye.svg')}}" alt="" srcset=""></a>
                            <a href="{{route('admin.category.edit', $category->id)}}" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning btn-sm"><img src="{{url('icon/edit.svg')}}" alt="" srcset=""></a>
                            <a href="{{route('admin.category.delete', $category->id)}}" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-outline-danger btn-sm"><img src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- <!//{{-- {{$categories->links()}} --}}-->

        </div>
    </div>
    <!-- Data Table -->

@endsection
@push('scripts')
    <!-- Data Table Plugin -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#data_table_set').DataTable();
        });
    </script>
@endpush
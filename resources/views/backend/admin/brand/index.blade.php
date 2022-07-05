@extends('backend.master')

@section('admin_dashboard_content')
<div style="background-color: #fff;" class="row">
        <div class="col-md-12 col-lg-12">
            <a class="btn btn-outline-info align-right" href="{{route('admin.brand.create')}}">Add Brand</a>
        </div>

        <div class="col-md-12 col-lg-12">
            <h1>Brand List</h1>
        </div>

        <div class="col-md-12 col-lg-12">
        <table class="table table-info table-responsive table-striped table-hover">

            <thead>
                <tr>
                    <th scope="col">S.L</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>

            </thead>
            <tbody class="table-group-divider">
                @foreach($brands as $brand)
                    <tr>
                        <td scope="col">{{$brand->id}}</td>
                        <td scope="col">{{$brand->name}}</td>
                        <td scope="col">{{$brand->description}}</td>
                        <td scope="col">{{$brand->summary}}</td>
                        <td scope="col">{{$brand->photo}}</td>
                        <td scope="col">{{$brand->status}}</td>
                        <td scope="col">{{$brand->created_at}}</td>
                        <td scope="col">{{$brand->updated_at}}</td>
                        <td>
                        <a href="" data-toggle="tooltip" title="View" data-placement="bottom" class="btn btn-outline-success btn-sm"><img src="{{url('icon/eye.svg')}}" alt="" srcset=""></a>
                            <a href="" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning btn-sm"><img src="{{url('icon/edit.svg')}}" alt="" srcset=""></a>
                            <a href="" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-outline-danger btn-sm"><img src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{ $brands->onEachSide(3)->links() }}

        </div>
    </div>
@endsection
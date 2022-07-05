@extends('backend.master')

@section('admin_dashboard_content')
    <div style="background-color: #fff;" class="row">
        <div class="col-md-12 col-lg-12">
            <a class="btn btn-outline-info align-right" href="{{route('admin.product.create')}}">Add product</a>
        </div>

        <div class="col-md-12 col-lg-12">
            <h1>Product List</h1>
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
        <th scope="col">Category</th>
        <th scope="col">Sub Category</th>
        <th scope="col">Brand</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Weight</th>
        <th scope="col">Status</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Action</th>
    </tr>

</thead>
<tbody class="table-group-divider">
@foreach($products as $key=>$product)
        <tr>
            <td scope="col">{{$key+1}}</td>
            <td scope="col">{{$product->product_name}}</td>
            <td scope="col">{{$product->product_description}}</td>
            <td scope="col">{{$product->product_summary}}</td>
            <td scope="col">{{$product->product_photo}}</td>
            <td scope="col">{{$product->product_category}}</td>
            <td scope="col">{{$product->product_sub_category}}</td>
            <td scope="col">{{$product->product_brand}}</td>
            <td scope="col">{{$product->product_quantity}}</td>
            <td scope="col">{{$product->product_price}}</td>
            <td scope="col">{{$product->product_weight}}</td>
            <td scope="col">{{$product->status}}</td>
            <td scope="col">{{$product->created_at}}</td>
            <td scope="col">{{$product->updated_at}}</td>
            <td>
                    <a href="" data-toggle="tooltip" title="View" data-placement="bottom" class="btn btn-outline-success btn-sm"><img src="{{url('icon/eye.svg')}}" alt="" srcset=""></a>
                    <a href="" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning btn-sm"><img src="{{url('icon/edit.svg')}}" alt="" srcset=""></a>
                    <a href="" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-outline-danger btn-sm"><img src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                </td>  
        </tr>
        @endforeach
</tbody>
</table>
        </div>
    </div>
@endsection
@extends('backend.master')

@section('admin_dashboard_content')
    <div style="background-color: #fff;" class="row">
        <div class="col-md-12 col-lg-12">
            <a class="btn btn-outline-info align-right" href="">Add product</a>
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
    </tr>
</thead>
<tbody class="table-group-divider">

        <tr>
            <td scope="col">S.L</td>
            <td scope="col">Name</td>
            <td scope="col">Description</td>
            <td scope="col">Summary</td>
            <td scope="col">Image</td>
            <td scope="col">Category</td>
            <td scope="col">Sub Category</td>
            <td scope="col">Brand</td>
            <td scope="col">Quantity</td>
            <td scope="col">Price</td>
            <td scope="col">Weight</td>
            <td scope="col">Status</td>
            <td scope="col">Created At</td>
            <td scope="col">Updated At</td>
        </tr>

</tbody>
</table>
        </div>
    </div>
@endsection
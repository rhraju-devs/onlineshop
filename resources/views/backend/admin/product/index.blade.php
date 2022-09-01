@extends('backend.master')

@section('css')
    <!-- Data table Plugin -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('admin_breadcrumb')
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Admin Dashboard</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.product.list')}}">Product</a></li>
                                <li class="breadcrumb-item"><a href="#">Product List</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
@endsection

@section('admin_dashboard_content')

    <div class="row">

        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <h5>Product</h5> 
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row my-3">
                                    <div class="col-md-6 col-lg-6">
                                        <a class="btn btn-outline-info float-left" href="{{route('admin.product.create')}}">Add Product</a>
                                    </div>
                                    <div class="col-md-6 col-lg-6 float-right">
                                    <p class="fw-bold float-right">Total Product : {{$products->count()}}</p>
                                    </div>      
                                </div>

                                <div class="row my-2">
                                    <div class="col-md-12 col-lg-12">
                                        <h1>Product List</h1>
                                    </div>

                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <table id="data_table_set" class="table table-info table-responsive table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.L</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Summary</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Sub Category</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Feater Product</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach($products as $key=>$product)
                                            <tr>
                                                <td scope="col">{{$key+1}}</td>
                                                <td scope="col">{{$product->product_name}}</td>
                                                <td scope="col">{!! $product->product_description !!}</td>
                                                <td scope="col">{!! $product->product_summary !!}</td>
                                                <td scope="col">{{optional($product->category)->name}}</td>
                                                <td scope="col">{{optional($product->subcategory)->name}}</td>
                                                <td scope="col">{{optional($product->brand)->name}}</td>
                                                <td scope="col">{{$product->product_quantity}}</td>
                                                <td scope="col">{{$product->product_price}}</td>
                                                <td scope="col">{{$product->product_weight}}</td>
                                                <td scope="col">{{$product->status}}</td>
                                                <td scope="col">{{$product->feature_product}}</td>
                                                <td>
                                                    <a href="{{route('admin.product.show', $product->id)}}" data-toggle="tooltip" title="View" data-placement="bottom"
                                                        class="btn btn-outline-success btn-sm"><img src="{{url('icon/eye.svg')}}" alt=""
                                                            srcset=""></a>
                                                    <a href="{{route('admin.product.edit', $product->id)}}" data-toggle="tooltip" title="Edit" data-placement="bottom"
                                                        class="btn btn-outline-warning btn-sm"><img src="{{url('icon/edit.svg')}}" alt=""
                                                            srcset=""></a>
                                                    <a href="{{route('admin.product.delete', $product->id)}}" data-toggle="tooltip" title="Delete"
                                                        data-placement="bottom" class="btn btn-outline-danger btn-sm"><img
                                                            src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">S.L</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Summary</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Sub Category</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Feater Product</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
<!-- Data Table Plugin -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#data_table_set').DataTable();
        });

    </script>
    @if(Session::has('product_added'))
        <script>
            toastr.success("{!! Session::get('product_added') !!}");
        </script>
    @endif
@endpush

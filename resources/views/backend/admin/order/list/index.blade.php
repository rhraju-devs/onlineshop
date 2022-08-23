@extends('backend.master')

@section('css')
    <!-- Data table Plugin -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('admin_dashboard_content')



    <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Order  List</h5> 
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
                                            <!-- <a class="btn btn-outline-info" href="">Order</a> -->
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <p class="fw-bold align-right">Total Order : ( {{(\App\Models\Order::all()->count())}} )</p>
                                        </div>      
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <table id="data_table_set" class="table table-info table-responsive table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.L</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">User Id</th>
                                                    <th scope="col">Order Id</th>
                                                    <th scope="col">Product Id</th>
                                                    <th scope="col">Transition Id</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Shipping</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Payment Method</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @foreach($orders as $key=>$data)

                                                    <tr>
                                                        <td scope="col">{{$key+1}}</td>
                                                        <td scope="col">{{$data->orderDetails->firstname}} {{$data->orderDetails->lastname}}</td>
                                                        <td scope="col">{{$data->orderDetails->email}}</td>
                                                        <td scope="col">{{$data->orderDetails->user_id}}</td>
                                                        <td scope="col">#{{$data->order_id}}</td>
                                                        <td scope="col">{{$data->product_id}}</td>
                                                        <td scope="col">{{$data->orderDetails->transition_id}}</td>
                                                        <td scope="col">{{$data->orderDetails->address}}</td>
                                                        <td scope="col">{{$data->quantity}}</td>
                                                        <td scope="col">{{$data->unit_price}}</td>
                                                        <td scope="col">{{$data->orderDetails->shipping}}</td>
                                                        <td scope="col">{{$data->subtotal}}</td>
                                                        <td scope="col">{{$data->orderDetails->total_price}}</td>
                                                        <td scope="col">
                                                            @if($data->orderDetails->payment_method == 'cod')
                                                                <span class="badge rounded-pill badge-primary text-uppercase">{{$data->orderDetails->payment_method}}</span>
                                                            @elseif($data->orderDetails->payment_method == 'ssl')
                                                                <span class="badge rounded-pill badge-info text-uppercase">{{$data->orderDetails->payment_method}}</span>
                                                            @endif
                                                        </td>
                                                        <td scope="col">
                                                            @if($data->orderDetails->status=='pending')
                                                                <span class="badge badge-primary text-uppercase">{{$data->orderDetails->status}}</span>
                                                            @elseif($data->orderDetails->status=='approved')
                                                                <span class="badge badge-info text-uppercase">{{$data->orderDetails->status}}</span>
                                                            @elseif($data->orderDetails->status=='delivered')
                                                                <span class="badge badge-success text-uppercase">{{$data->orderDetails->status}}</span>
                                                            @elseif($data->orderDetails->status =='cancel')
                                                                <span class="badge badge-danger text-uppercase">{{$data->orderDetails->status}}</span>
                                                            @elseif($data->orderDetails->staus == 'received')
                                                                <span class="badge badge-success text-uppercase">{{$data->orderDetails->status}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                        <a href="{{route('admin.order.invoice', $data->id)}}" data-toggle="tooltip" title="View" data-placement="bottom" class="btn btn-outline-success btn-sm"><img src="{{url('icon/eye.svg')}}" alt="" srcset=""></a>
                                                        <a href="{{route('admin.order.edit', $data->id)}}" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning btn-sm"><img src="{{url('icon/edit.svg')}}" alt="" srcset=""></a>
                                                        <a href="{{route('admin.order.delete', $data->id)}}" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-outline-danger btn-sm"><img src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">S.L</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">User Id</th>
                                                    <th scope="col">Order Id</th>
                                                    <th scope="col">Product Id</th>
                                                    <th scope="col">Transition Id</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Shipping</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Payment Method</th>
                                                    <th scope="col">Status</th>
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
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->

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
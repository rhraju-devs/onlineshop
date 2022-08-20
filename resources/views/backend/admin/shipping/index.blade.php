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
                        <h5>Shipping List</h5> 
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
                                            <a class="btn btn-outline-info" href="{{route('admin.shipping.create')}}">Add shipping</a>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <p class="fw-bold align-right">Total Shipping : {{$shipping->count()}}</p>
                                        </div>      
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <table id="data_table_set" class="table table-info table-responsive table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.L</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">price</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @if($shipping->count()>0)
                                                @foreach($shipping as $key=>$data)
                                                    <tr>
                                                        <td scope="col">{{$key+1}}</td>
                                                        <td scope="col">{{$data->type}}</td>
                                                        <td scope="col">{{$data->price}}</td>
                                                        <td scope="col">{{$data->status}}</td>
                                                        <td>
                                                        <a href="" data-toggle="tooltip" title="View" data-placement="bottom" class="btn btn-outline-success btn-sm"><img src="{{url('icon/eye.svg')}}" alt="" srcset=""></a>
                                                        <a href="{{route('admin.shipping.edit', $data->id)}}" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning btn-sm"><img src="{{url('icon/edit.svg')}}" alt="" srcset=""></a>
                                                        <a href="{{route('admin.shipping.delete', $data->id)}}" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-outline-danger btn-sm"><img src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan="5"> No Shipping Data Found</td>
                                                    </tr>
                                                    @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                <th scope="col">S.L</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">price</th>
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




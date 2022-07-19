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
                    <h5>Category</h5> 
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
                                        <a class="btn btn-outline-info float-left" href="{{route('admin.category.create')}}">Add Category</a>
                                    </div>
                                    <div class="col-md-6 col-lg-6 float-right">
                                    <p class="fw-bold float-right">Total Category : {{$categories->count()}}</p>
                                    </div>      
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
                                                <th scope="col">Is Parent</th>
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
                                                    <td scope="col">{!! $category->description !!}</td>
                                                    <td scope="col">{!! $category->summary !!}</td>
                                                    <td scope="col">{{$category->photo}}</td>
                                                    <td scope="col">{{$category->is_parent === 1 ? 'Yes' : 'No'}}</td>
                                                    <td scope="col">{{optional($category->parentCategory)->name}}</td>
                                                    <td scope="col">{{$category->status}}</td>
                                                    <td scope="col">{{$category->created_at}}</td>
                                                    <td scope="col">{{$category->updated_at}}</td>
                                                    <td>
                                                        <a href="{{route('admin.category.show', $category->id)}}" data-toggle="tooltip" title="View" data-placement="bottom" class="btn btn-outline-success btn-sm"><img src="{{url('icon/eye.svg')}}" alt="" srcset=""></a>
                                                        <a href="{{route('admin.category.edit', $category->id)}}" data-toggle="tooltip" title="Edit" data-placement="bottom" class="btn btn-outline-warning btn-sm"><img src="{{url('icon/edit.svg')}}" alt="" srcset=""></a>
                                                        <a href="{{route('admin.category.delete', $category->id)}}" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-outline-danger btn-sm"><img src="{{url('icon/delete.svg')}}" alt="" srcset=""></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">S.L</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Summary</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Is Parent</th>
                                                <th scope="col">Parent Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Updated At</th>
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
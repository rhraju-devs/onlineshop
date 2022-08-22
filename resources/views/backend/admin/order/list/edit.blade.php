@extends('backend.master')



@section('admin_dashboard_content')
<div style="background-color: #fff;" class="row">
    <div class="row">
    <div class="row my-3 mx-5">
        <div class="col-md-6 col-lg-6">
            <a class="btn btn-outline-info float-left" href="{{route('admin.order.list')}}">Order List</a>
        </div>
        <div class="col-md-6 col-lg-6 float-right">
        <p class="fw-bold float-right">Total Banner :Total Order : ( {{(\App\Models\Order::all()->count())}} )</p>
        </div>      
    </div>

    </div>

    <div class="col-md-12 col-lg-12">
        <h1 class="fw-bold">Update Order Status</h1>
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

        <form class="m-3" action="{{route('admin.order.update', $order->id)}}" method="post">
            @csrf
            @method('PUT')

                <div class="col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Order Status :<span class="text-danger"> *</span></label>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="status">Options</label>
                        </div>
                        <select name='status' class="custom-select" id="status">
                            <option disabled>Choose Banner Status</option>
                            <option @if ($banner->status == 'active')  'selected' @endif value="active">Active</option>
                            <option @if ($banner->status == 'inactive')  'selected' @endif value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="reset" class="btn btn-primary btn-sm m-r-5">Reset</button>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>

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

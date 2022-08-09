@extends('backend.master')

@section('css')

@endsection

@section('admin_dashboard_content')

<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">

            <div class="card-header">
                <h5>Setting</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if($settings->count() === 0)
                            <div class="row my-3">
                                <div class="col-md-6 col-lg-6">
                                    <p class="fw-bold float-left">No Setting Found</p>
                                </div>
                                <div class="col-md-6 col-lg-6 float-right">
                                    <a class="btn btn-outline-info float-right" href="{{route('admin.setting.create')}}">Create Setting</a>
                                </div>
                            </div>
                            @endif

                            @foreach($settings as $setting)
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <h3 class="fw-bold float-left">Setting Details</h3>
                                        </div>
                                        <div class="col-md-6 col-lg-6 float-right">
                                            <a class="btn btn-outline-info float-right" href="{{route('admin.setting.edit', $setting->id)}}">Edit Setting</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 text-center">
                                        <h5>Site Photo : </h5>
                                        <img class="w-100 border-radius-lg shadow-lg mx-auto"
                                            src="{{'/uploads/settings/' . $setting->photo}}" alt="{{$setting->photo . 'photo'}}">
                                        <br>
                                        <h5>Site Logo : </h5>
                                        <img class="w-100 border-radius-lg shadow-lg mx-auto"
                                        src="{{'/uploads/settings/' . $setting->logo}}" alt="{{$setting->photo . 'photo'}}">
                                    </div>
                                    <div class="col-lg-6 mx-auto">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <h5>Phone : </h5>
                                                <h3 class="mt-lg-0 mt-4">{{$setting->phone}}</h3>
                                            </div>
                                            <div class="col-md-12 col-lg-12">
                                                <h5>Tel Number</h5>
                                                <h3 class="mt-lg-0 mt-4">{{$setting->tel_number}}</h3>
                                            </div>

                                            <div class="col-md-12 col-lg-12">
                                                <h5>Email : </h5>
                                                <h3 class="mt-lg-0 mt-4">{{($setting->email)}}</h3>
                                            </div>

                                            <div class="col-md-12 col-lg-12">
                                                <h5>Address : </h5>
                                                <h3 class="mt-lg-0 mt-4">{{($setting->address)}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab"
                                                href="#description" role="tab" aria-controls="home"
                                                aria-selected="true">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab"
                                                href="#summary" role="tab" aria-controls="profile"
                                                aria-selected="false">Summary</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <p class="mb-0">{!! $setting->description !!}</p>
                                        </div>
                                        <div class="tab-pane fade" id="summary" role="tabpanel" aria-labelledby="profile-tab">
                                            <p class="mb-0">Site Summary</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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

@endpush

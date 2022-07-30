@extends('backend.customer.master')

@section('customer_dashboard_content')
<div class="row">

    <!-- seo start -->
    <div class="col-xl-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3>$16,756</h3>
                        <h6 class="text-muted m-b-0">Visits<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                    </div>
                    <div class="col-6">
                        <div id="seo-chart1" class="d-flex align-items-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3>49.54%</h3>
                        <h6 class="text-muted m-b-0">Bounce Rate<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                    </div>
                    <div class="col-6">
                        <div id="seo-chart2" class="d-flex align-items-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3>1,62,564</h3>
                        <h6 class="text-muted m-b-0">Products<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                    </div>
                    <div class="col-6">
                        <div id="seo-chart3" class="d-flex align-items-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- seo end -->




    <!-- prject ,team member start -->

    <div class="col-xl-6 col-md-12">
        <div class="card table-card review-card">
            <div class="card-header borderless ">
                <h5>Customer Reviews</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i>
                                        expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="review-block">
                    <div class="row">
                        <div class="col-sm-auto p-r-0">
                            <img src="{{url('backend/assets/images/user/avatar-2.jpg')}}" alt="user image"
                                class="img-radius profile-img cust-img m-b-15">
                        </div>
                        <div class="col">
                            <h6 class="m-b-15">John Deo <span class="float-right f-13 text-muted"> a week
                                    ago</span></h6>
                            <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                            <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                            <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                            <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                            <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                            <p class="m-t-15 m-b-15 text-muted">Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book.</p>
                            <a href="#!" class="m-r-30 text-muted"><i
                                    class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                            <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                            <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-auto p-r-0">
                            <img src="{{url('backend/assets/images/user/avatar-4.jpg')}}" alt="user image"
                                class="img-radius profile-img cust-img m-b-15">
                        </div>
                        <div class="col">
                            <h6 class="m-b-15">Allina D’croze <span class="float-right f-13 text-muted"> a
                                    week ago</span></h6>
                            <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                            <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                            <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                            <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                            <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                            <p class="m-t-15 m-b-15 text-muted">Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown printer
                                took a
                                galley of type and scrambled it to make a type specimen book.</p>
                            <a href="#!" class="m-r-30 text-muted"><i
                                    class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                            <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                            <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                            <blockquote class="blockquote m-t-15 m-b-0">
                                <h6>Allina D’croze</h6>
                                <p class="m-b-0 text-muted">Lorem Ipsum is simply dummy text of the
                                    industry.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="text-right  m-r-20">
                    <a href="#!" class="b-b-primary text-primary">View all Customer Reviews</a>
                </div>
            </div>
        </div>

    </div>


    <div class="col-xl-6 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5>Latest Updates</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i>
                                        expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="latest-update-box">
                    <div class="row p-t-30 p-b-30">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline-flex">2 hrs ago</p>
                            <i class="feather icon-twitter bg-twitter update-icon"></i>
                        </div>
                        <div class="col">
                            <a href="#!">
                                <h6>+ 1652 Followers</h6>
                            </a>
                            <p class="text-muted m-b-0">You’re getting more and more followers, keep it up!
                            </p>
                        </div>
                    </div>
                    <div class="row p-b-30">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline-flex">4 hrs ago</p>
                            <i class="feather icon-briefcase bg-c-red update-icon"></i>
                        </div>
                        <div class="col">
                            <a href="#!">
                                <h6>+ 5 New Products were added!</h6>
                            </a>
                            <p class="text-muted m-b-0">Congratulations!</p>
                        </div>
                    </div>
                    <div class="row p-b-0">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline-flex">2 day ago</p>
                            <i class="feather icon-facebook bg-facebook update-icon"></i>
                        </div>
                        <div class="col">
                            <a href="#!">
                                <h6>+1 Friend Requests</h6>
                            </a>
                            <p class="text-muted m-b-10">This is great, keep it up!</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="b-none">
                                            <a href="#!" class="align-middle">
                                                <img src="{{url('backend/assets/images/user/avatar-2.jpg')}}"
                                                    alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                <div class="d-inline-block">
                                                    <h6>Jeny William</h6>
                                                    <p class="text-muted m-b-0">Graphic Designer</p>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#!" class="b-b-primary text-primary">View all Projects</a>
                </div>
            </div>
        </div>
    </div>
    <!-- prject ,team member start -->

</div>
@endsection

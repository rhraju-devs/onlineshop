<!-- use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request; -->
<nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                    <!-- url('/uploads/customers/' . auth()->user()->photo) -->
                        <img class="img-radius" src="" class="img-radius"
                                alt="">
                        <div class="user-details">
                            <div id="more-details"><i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="user-profile.html"><i
                                        class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href="#!"><i
                                        class="feather icon-settings m-r-5"></i>Settings</a></li>
                            <li class="list-group-item"><a href="auth-normal-sign-in.html"><i
                                        class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('customer.dashboard')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Order</span><span
                                class="badge badge-primary ml-3">2</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="">Order List</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Product Review</span><span
                                class="badge badge-primary ml-3"></span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="">Review List</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Order Tracking</span><span
                                class="badge badge-primary ml-3">2</span></a>
                     
                        <ul class="pcoded-submenu">
                            <li><a href="">Order Approved</a></li>
                            <li><a href="">Order Rejected</a></li>
                            <li><a href="">Order Delivered</a></li>
                            <li><a href="">Order Recieved</a></li>
                        </ul>
                    </li>
    
                    <li class="nav-item pcoded-menu-caption">
                        <label>Wishlist &amp; Cart</label>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Wishlist</span><span
                                class="badge badge-primary ml-3">2</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="">Wish List</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-layout"></i></span><span class="pcoded-mtext">Cart</span><span
                                class="badge badge-primary ml-3">2</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="">Cart List</a></li>
                        </ul>
                    </li>
             
                </ul>
            </div>
        </div>
    </nav>
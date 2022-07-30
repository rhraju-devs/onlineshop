<header class="header_area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-6">
                    <div class="welcome-note">
                            <span>
                                @foreach($settings as $setting)
                                    <i class="icofont-email"></i>
                                    {{$setting->email}}
                                @endforeach
                            </span>
                            <span class="mx-5">
                                @foreach($settings as $setting)
                                <i class="icofont-phone"></i>
                                {{$setting->phone}}
                                @endforeach
                            <span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                        <!-- Language Dropdown -->
                        <div class="language-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    English
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="#">Bangla</a>
                                    <a class="dropdown-item" href="#">Arabic</a>
                                </div>
                            </div>
                        </div>

                        <!-- Currency Dropdown -->
                        <div class="currency-dropdown">
                            <div class="dropdown">
                                <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    $ USD
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="#">৳ BDT</a>
                                    <a class="dropdown-item" href="#">€ Euro</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="bigshop-main-menu">
        <div class="container">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar" id="bigshopNav">

                    <!-- Nav Brand -->
                    <a href="index.html" class="nav-brand"><img src="{{asset('frontend/img/core-img/logo.png')}}"
                            alt="logo"></a>

                    <!-- Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Close -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav -->
                        <div class="classynav">
                            <ul>
                                <li>
                                    <a href="{{route('frontend.dashboard')}}">Home</a>
                                </li>

                                <li>
                                    <a href="#">All Product</a>
                                </li>

                                <li><a href="#">Item</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><strong>Category</strong></li>
                                            @foreach($categories as $category)
                                                <li><a href="#">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                        <li><strong>Brand</strong></li>
                                            @foreach($brands as $brand)
                                                <li><a href="">{{$brand->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="single-mega cn-col-2">
                                            @foreach($banners as $banner)
                                                <div class="megamenu-slides owl-carousel">
                                                    <a href="#">
                                                            <div>
                                                                <img style="width:200px;height:150px" src="{{asset('/uploads/banner/'.$banner->photo)}}" alt="{{$banner->photo}}">
                                                            </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <a href="{{route('frontend.blog')}}">Blog</a>
                                </li>

                                <li>
                                    <a href="{{route('frontend.about_us')}}">About Us</a>
                                </li>

                                <li>
                                    <a href="{{route('frontend.contact_us')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Hero Meta -->
                    <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                        <!-- Search -->
                        <div class="search-area">
                            <div class="search-btn"><i class="icofont-search"></i></div>
                            <!-- Form -->
                            <div class="search-form">
                                <input type="search" class="form-control" placeholder="Search">
                                <input type="submit" class="d-none" value="Send">
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="wishlist-area">
                            <a href="{{route('frontend.wishlist')}}" class="wishlist-btn"><i class="icofont-heart"></i></a>
                        </div>

                        <!-- Cart -->
                        <div class="cart-area">
                            <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity">2</span>
                            </div>

                            <!-- Cart Dropdown Content -->
                            <div class="cart-dropdown-content">
                                <ul class="cart-list">
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{asset('frontend/img/product-img/top-1.png')}}"
                                                    class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="#">Kid's Fashion</a>
                                                <p>1 x - <span class="price">$32.99</span></p>
                                            </div>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                    </li>
                                    <li>
                                        <div class="cart-item-desc">
                                            <a href="#" class="image">
                                                <img src="{{asset('frontend/img/product-img/best-4.png')}}"
                                                    class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a href="#">Headphone</a>
                                                <p>2x - <span class="price">$49.99</span></p>
                                            </div>
                                        </div>
                                        <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                    </li>
                                </ul>
                                <div class="cart-pricing my-4">
                                    <ul>
                                        <li>
                                            <span>Sub Total:</span>
                                            <span>$822.96</span>
                                        </li>
                                        <li>
                                            <span>Shipping:</span>
                                            <span>$30.00</span>
                                        </li>
                                        <li>
                                            <span>Total:</span>
                                            <span>$856.63</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-box">
                                    <a href="checkout-1.html" class="btn btn-primary d-block">Checkout</a>
                                </div>
                            </div>
                        </div>



                        <!-- Account -->
                        <div class="account-area">
                            @if(auth()->check())
                            <div class="user-thumbnail m-r-2">
                                <img src="{{url('/uploads/customers/' . auth()->user()->photo)}}" alt="{{url('frontend/img/bg-img/user.jpg')}}">
                            </div>
                            @elseif(Auth::guard('vendors')->check())
                            <div class="user-thumbnail m-r-2">
                            <img src="{{url('/uploads/vendors/' . auth('vendors')->user()->photo)}}" alt="{{url('frontend/img/bg-img/user.jpg')}}">
                            </div>
                            @else
                            
                            @endif
                            <ul class="user-meta-dropdown">
                                <li class="user-title"><span>Hello,</span>
                                    @if(auth()->check())
                                        {{auth()->user()->fullname}}
                                    @elseif(Auth::guard('vendors')->check())
                                        {{auth('vendors')->user()->fullname}}
                                    @else

                                    @endif
                            </li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="order-list.html">Orders List</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li> 
                                    @if(auth()->check())
                                        <a href="{{route('customer.logout')}}"><i class="icofont-logout"></i>
                                    @elseif(Auth::guard('vendors')->check())
                                        <a href="{{route('vendor.logout')}}"><i class="icofont-logout"></i>
                                    @else

                                    @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Account -->
                        <!-- <div class="wishlist-area mx-2"> -->
                            <!-- <a href="wishlist.html" class="">Login</a> -->
                            <!-- <a  class=" btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2">
                                Login
                            </a> -->
                        <!-- </div> -->

                        @if(auth()->check())
                            <a href="{{route('customer.logout')}}"><i class="icofont-user"></i> Logout</a> | {{auth()->user()->fullname}}
                        @elseif(Auth::guard('vendors')->check())
                            <a href="{{route('vendor.logout')}}"> <i class="iconfont-user"></i> Logout | {{auth('vendors')->user()->fullname}}</a>
                         @else
                            <a class="btn-sm btn-primary" role="button" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Login</a>
                            <!-- Login  Button trigger modal -->

                            <!-- Register  Button trigger modal -->
                            <button type="button" class="btn-sm btn-primary mx-1" data-toggle="modal" data-target="#exampleModal">
                               Register
                            </button>
                        @endif

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>





<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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

                <form class="m-3" action="{{route('customer.registration')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname"
                            placeholder="Enter Full Name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter User Name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email :<span class="text-danger"> *</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email Address">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password :<span class="text-danger"> *</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Password">
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo :<span class="text-danger"> *</span></label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone :<span class="text-danger"> *</span></label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address :<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="input-group mb-3">
                                <label for="status" class="form-label">Customer Status :<span class="text-danger">
                                        *</span></label>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status">Options</label>
                                </div>
                                <select name='status' class="custom-select" id="status">
                                    <option selected>Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <button type="reset" class="btn btn-primary close">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>













<!-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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
                @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                @endif


                <form action="{{route('vendor.login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div> -->










<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Customer Login</h3>


                <div class="modal-body">

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

                    <form class="m-3" action="{{route('customer.login')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <button type="reset" class="btn btn-primary close">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Vendor
                    Login</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="modal-title">Vendor Login</h3>

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

                <form class="m-3" action="{{route('vendor.login')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <button type="reset" class="btn btn-primary close">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Customer
                    Login</button>
            </div>
        </div>
    </div>
</div>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>OnlineShop || Login Page</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{url('icon/icon.png')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{url('backend/assets/css/style.css')}}">

    <!-- Toastr CDN -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Login</h4>
                        <form action="{{route('admin.login.check')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email"></label>
                                <input type="text" class="form-control" id="Email" placeholder="Email address" name="email">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password"></label>
                                <input type="password" class="form-control" id="Password" placeholder="Password"
                                    name="password">
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">

                            </div>
                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                            <p class="mb-2 text-muted">Forgot password? <a href="" class="f-w-400">Reset</a></p>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="" class="f-w-400">Signup</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{url('backend/assets/js/vendor-all.min.js')}}"></script>
<script src="{{url('backend/assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{url('backend/assets/js/ripple.js')}}"></script>
<script src="{{url('backend/assets/js/pcoded.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Toastr CDN -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>



</html>

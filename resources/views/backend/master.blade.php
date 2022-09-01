<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.admin.fixed.head')
    @yield('css')
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <!-- <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div> -->
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    @include('backend.admin.fixed.sidebar')
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->

    @include('backend.admin.fixed.header')

    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">

        <!-- breadcrumb start -->
        @yield('admin_breadcrumb')
        <!-- breadcrumb end -->

            <!-- [ Main Content ] start -->

                @yield('admin_dashboard_content')



            <!-- [ Main Content ] end -->
        </div>
    </div>

    @include('backend.admin.fixed.script')
    @stack('scripts')
</body>

</html>

<!doctype html>
<html lang="en">

<head>
@include('frontend.fixed.head')

@yield('css')

</head>

<body>
    <!-- Preloader -->
    <!-- <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->

    <!-- Header Area -->
      @include('frontend.fixed.header')
    <!-- Header Area End -->

      @yield('frontend_content');

    <!-- Footer Area -->
      @include('frontend.fixed.footer')
    <!-- Footer Area -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    @include('frontend.fixed.script')

    @stack('script')

</body>

</html>

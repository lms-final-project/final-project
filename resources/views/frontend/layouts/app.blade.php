<!doctype html>
<html class="no-js" lang="en">

@include('frontend.layouts.head')

<body>
    <div class="main-wrapper">
        {{-- Navbars --}}
        @include('frontend.layouts.mainNav')
        @include('frontend.layouts.mobileNav')

        <!-- Start Search Popup  -->
        @include('frontend.layouts.searchPopup')
        <!-- End Search Popup  -->

        @yield('index')
        @yield('breadcrump')
        @yield('content')
    </div>


    <!-- Start Footer Area  -->
    @include('frontend.layouts.footer')
    <!-- End Footer Area  -->

    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- JS ============================================ -->
    @include('frontend.layouts.js')
    <script>
        $('#user-btn').on('click' , ()=> {
            $('#user-btn').closest('form').submit();
        })
    </script>
    @stack('scripts')
</body>

</html>

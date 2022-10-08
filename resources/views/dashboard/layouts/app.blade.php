
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LMS - learning mangement system</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('dashboard/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
   
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/remixicon.css')}}">
    @stack('styles')
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="">
    <!-- [ Pre-loader ] start -->
        @include('dashboard.layouts.preloader')
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
        @include('dashboard.layouts.sidebar')
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
        @include('dashboard.layouts.navbar')
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
                @include('dashboard.layouts.headerWithBreadcrumb')
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- table card-1 start -->
                <div class="col-12">
                    <div class="container">
                       
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- Required Js -->

    <script src="{{ asset('dashboard/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pcoded.min.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('dashboard/assets/js/plugins/apexcharts.min.js') }}"></script>
    <!-- custom-chart js -->
    <script src="{{ asset('dashboard/assets/js/pages/dashboard-main.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/plugins/jquery-ui.min.js') }}"></script>

    {{-- Customized js --}}
    <script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>

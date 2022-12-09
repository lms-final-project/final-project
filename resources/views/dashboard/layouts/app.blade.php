
<style>
    .btn-primary {
    color: #fff !important;
    background-color: #df99b9 !important;
    border-color: #df99b9 !important;
}

.btn-primary:hover {
    color: #fff !important;
    background-color: #df99b9!important;
    border-color: #df99b9 !important;
}
.flat-card .row-table span {
    
    color: #373a3c !important;

}
</style>
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


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/alertify.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
    <style>
        .ajs-message {
            color: white;
            border: 1px solid white;
            border-radius: 8px;
            box-shadow: -3px 2px 17px -1px rgba(0,0,0,0.53);
            -webkit-box-shadow: -3px 2px 17px -1px rgba(0,0,0,0.53);
            -moz-box-shadow: -3px 2px 17px -1px rgba(0,0,0,0.53);
        }
    </style>

    @stack('styles')
    @vite(['resources/js/app.js'])
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

    <script src="{{ asset('frontend/assets/js/alertify.min.js') }}"></script>
    {{-- Customized js --}}
    <script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>

    <script>
        alertify.set('notifier','position', 'top-right');
        @if ( Session::has('success') )
            alertify.notify("{{ Session::get('success') }}", 'success', 3);
        @endif

        @if ( Session::has('danger') )
            alertify.notify("{{ Session::get('danger') }}", 'error', 3);
        @endif
    </script>
    @stack('scripts')
</body>

</html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Knowledge Academy</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/eduvibe-font.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/magnifypopup.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/odometer.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/lightbox.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/animation.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/jqueru-ui-min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/alertify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
    <style>
        #user-btn:hover{
            cursor: pointer;
        }
    </style>

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

    @vite('resources/js/app.js')
</head>

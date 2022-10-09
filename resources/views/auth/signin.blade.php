<!DOCTYPE html>
<html lang="en">

<head>

	<title>LMS-Signin</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('dashboard/assets/images/favicon.ico')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css')}}">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{ asset('dashboard/assets/images/logo.png')}}" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
                    <div class="card-body">
                        <form  method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="email" id="Email" placeholder="Email address">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Save credentials.</label>
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                        </form>
                            <hr>
                            <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}" class="f-w-400">Signup</a></p>
                        </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

    <!-- Required Js -->
    <script src="{{ asset('dashboard/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/plugins/bootstrap.min.js')}}"></script>

    <script src="{{ asset('dashboard/assets/js/pcoded.min.js')}}"></script>
</body>

</html>
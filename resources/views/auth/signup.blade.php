<!DOCTYPE html>
<html lang="en">

<head>

	<title>Knowledge Academy Signup</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<!--<link rel="icon" href="{{ asset('dashboard/assets/images/favicon.ico')}}" type="image/x-icon">-->

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css')}}">
    <style>
        .auth-wrapper {
            background-image: url({{asset('dashboard/assets/images/auth/knwoledgeBackGround.jpg')}});
        }
        .card.borderless {
    border: 3px solid #231F40;

}
.KnwoledgeBordr{
    border: 3px solid #231F40;
}
.form-control:focus {
    
    border-color: #df99b9;
    
}
.btn-dark:hover {
    color: #231F40;
    background-color: #df99b9;
    border-color: #df99b9;
}
    </style>
</head>


<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="{{ asset('dashboard/assets/images/Knowledgeacademy1.png')}}" alt="" class="img-fluid mb-4 KnwoledgeBordr">
		<div class="card borderless">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card-body">
                            <h4 class="f-w-600">Sign up</h4>
                            <hr>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="name" id="Username" placeholder="User name">
                                <x-input_error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="Email" name="email" placeholder="Email address">
                                <x-input_error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" id="Password" name="password_confirmation" placeholder="Password Confirmation">
                                <x-input_error :messages="$errors->get('password')" class="mt-2" />
                                <x-input_error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <button class="btn btn-dark btn-block mb-4 f-w-600">Sign up</button>
                            <hr>
                            <p class="mb-2">Already have an account? <a href="{{ route('login') }}" class="f-w-400">Signin</a></p>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->
    <!-- Required Js -->
    <script src="{{ asset('dashboard/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/plugins/bootstrap.min.js')}}"></script>

    <script src="{{ asset('dashboard/assets/js/pcoded.min.js')}}"></script>
</body>

</html>


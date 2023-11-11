<!doctype html>
<html lang="en" dir="ltr">
  <head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

		<!-- TITLE -->
		<title>Tron-X.Game</title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

		<!-- SIDE-MENU CSS -->
		<link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet" id="sidemenu-theme">

		<!-- SINGLE-PAGE CSS -->
		<link href="{{asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet" type="text/css">

		<!--C3 CHARTS CSS -->
		<link href="{{asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>

		<!-- P-scroll bar css-->
		<link href="{{asset('assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />

	</head>

	<body class="dark-mode">

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img" style="background: #c9c9c9;">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							{{-- <img src="{{asset('assets/images/brand/logo.png')}}" class="header-brand-img" alt=""> --}}
							<img src="{{asset('assets/images/logo/logo.png')}}" class="header-brand-img m-0" alt="" style="height: 3.25rem;">
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                                    @csrf

									<span class="login100-form-title">
										Registration
									</span>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" autocomplete="name" autofocus required>
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="mdi mdi-account" aria-hidden="true"></i>
										</span>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
										<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email" required>
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" autocomplete="new-password" required>
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
                                    <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
										<input class="input100" type="password" name="password_confirmation" placeholder="Confrim Password" id="password-confirm" autocomplete="new-password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input">
										<input class="input100" type="text" name="reveral_code" placeholder="Reveral Code" id="reveral_code" min="4" max="4" value="{{ isset($_GET['reveral']) && $_GET['reveral'] != '' ? $_GET['reveral'] : '' }}">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-money-box" aria-hidden="true"></i>
										</span>
									</div>
									<label class="custom-control custom-checkbox mt-4">
										<input type="checkbox" class="custom-control-input" checked>
										<span class="custom-control-label">Agree the <a href="">terms and policy</a></span>
									</label>
									<div class="container-login100-form-btn">
                                        <button type="submit" class="login100-form-btn btn-primary">Register</button>
									</div>
									<div class="text-center pt-3">
										<p class="text-dark mb-0">Already have account?<a href="/login" class="text-primary ms-1">Sign In</a></p>
									</div>
								</form>
							</div>
							<div class="card-footer">
								<div class="d-flex justify-content-center my-3">
									<a href="" class="social-login  text-center me-4">
										<i class="fa fa-google"></i>
									</a>
									<a href="" class="social-login  text-center me-4">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="" class="social-login  text-center">
										<i class="fa fa-twitter"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- END PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY JS -->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

		<!-- INPUT MASK JS -->
		<script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

		<!-- CUSTOM JS-->
		<script src="{{asset('assets/js/custom.js')}}"></script>

	</body>
</html>

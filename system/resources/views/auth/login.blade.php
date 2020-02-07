<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>..:: Login - {{ config('app.name', 'Laravel') }} ::..</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('/assets/')}}/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/assets/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/assets/')}}/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/assets/')}}/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/assets/')}}/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('/assets/')}}/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{url('/assets/')}}/global_assets/js/main/jquery.min.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{url('/assets/')}}/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="{{url('/assets/js/app.js')}}"></script>
	<script src="{{url('/assets/')}}/global_assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->
<style>

.login-cover {
    background: url(assets/global_assets/images/login_cover.jpg) no-repeat;
    background-size: cover;
}
</style>
</head>

<body>

	<!-- Page content -->
	<div class="page-content login-cover">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form wmin-sm-400" action="{{ route('login') }}" method="post">
                @csrf
					<div class="card mb-0">
						<div class="tab-content card-body">
							<div class="tab-pane fade show active" id="login-tab1">
								<div class="text-center mb-3">
									<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Login to your account</h5>
									<span class="d-block text-muted">Your credentials</span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
                                <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
                                    @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
								</div>

								<div class="form-group d-flex align-items-center">
									<div class="form-check mb-0">
										<label class="form-check-label">
											<input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
											Remember
										</label>
									</div>

									<a href="login_password_recover.html" class="ml-auto">Forgot password?</a>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Sign in</button>
								</div>


								<div class="form-group text-center text-muted content-divider">
									<span class="px-2">Sistem Informasi Abesensi Sekolah</span>
								</div>

								
								<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
							</div>

							
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>

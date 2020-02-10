<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>403 - {{ config('app.name', 'Laravel') }}</title>

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
	<script src="{{url('/assets/js/app.js')}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{{url('/')}}" class="d-inline-block">
				<img src="{{url('/assets/')}}/global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			

			
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Container -->
				<div class="flex-fill">

					<!-- Error title -->
					<div class="text-center mb-3">
						<h1 class="error-title">403</h1>
						<h5>You don't have permission to access on this page</h5>
					</div>
					<!-- /error title -->


					<!-- Error content -->
					<div class="row">
						<div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">


							<!-- Buttons -->
							<div class="row">
								<div class="col-sm-6">
									<a href="{url('/')}" class="btn btn-primary btn-block"><i class="icon-home4 mr-2"></i> Dashboard</a>
								</div>

								<div class="col-sm-6">
									<a href="javascript:history.back()" class="btn btn-light btn-block mt-3 mt-sm-0"><i class="icon-menu7 mr-2"></i> Back</a>
								</div>
							</div>
							<!-- /buttons -->

						</div>
					</div>
					<!-- /error wrapper -->

				</div>
				<!-- /container -->

			</div>
			<!-- /content area -->


			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; {{date('Y')}}. <a href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a> by <a href="https://www.kedaivirtual.com/" target="_blank">Refky Satria Bima</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="javascript:void()" class="navbar-nav-link" data-toggle="modal" data-target="#modal_theme_info"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<div id="modal_theme_info" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-info">
								<h6 class="modal-title">Suppot Application</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<h6 class="font-weight-semibold">Sistem Informasi Absensi Sekolah <strong>V.1.0</strong></h6>
								<p>
                                Development By : Refky Satria Bima<br>
                                Year : 2020<br>
                                Version : 1.0
                                </p>

								<hr>

								<h6 class="font-weight-semibold">Developer Contact</h6>
								<p>Email : refkysatria21@gmail.com<br>
                                Hp/WA : 089631449716

                                </p>
								
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
						
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Absensi - @yield('PageTitle')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('/assets/')}}/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/assets/')}}/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
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
	<script src="{{url('/assets/')}}/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/plugins/ui/perfect_scrollbar.min.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="{{url('/assets/')}}/global_assets/js/demo_pages/layout_fixed_sidebar_custom.js"></script>
	<!-- /theme JS files -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="navbar-top">
@include('sweet::alert')
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="{{url('/assets/')}}/global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				
				
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{url('/assets/')}}/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span>{{Auth::user()->name}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
						<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		@include('backend.template.menu')
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">
            
            @yield('content')
			


			<!-- Footer -->
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme - Multipurpose Bootstrap4 Admin Template</title>
  <!--favicon-->
  <link rel="icon" href="{{url('assets/images/favicon.ico')}}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{url('assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{url('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{url('assets/css/app-style.css')}}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

	   <div class="card-authentication2 mx-auto my-5">
	    <div class="card-group">
	    	<div class="card mb-0">
	    	   <div class="bg-signin2"></div>
	    		<div class="card-img-overlay rounded-left my-5">
                 <h2 class="text-white">Lorem</h2>
                 <h1 class="text-white">Ipsum Dolor</h1>
                 <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
             </div>
	    	</div>

	    	<div class="card mb-0 ">
	    		<div class="card-body">
	    			<div class="card-content p-3">
	    				<div class="text-center">
					 		<img src="assets/images/logo-icon.png" alt="logo icon">
					 	</div>
					 <div class="card-title text-uppercase text-center py-3">{{ __('Login') }}</div>
					 <form method="POST" action="{{ route('login') }}">
                        @csrf
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							   <label for="exampleInputUsername" class="sr-only">{{ __('E-Mail Address') }}</label>
							   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
								 <div class="form-control-position">
									<i class="icon-user"></i>
								</div>
						   </div>
						   		@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						  </div>
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="exampleInputPassword" class="sr-only">Password</label>
							  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
							  <div class="form-control-position">
								  <i class="icon-lock"></i>
							  </div>
						   </div>
						   		@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						  </div>
						  
						<button type="submit" class="btn btn-light btn-block waves-effect waves-light">Sign In</button>
						 <div class="text-center pt-3">
						
						<hr>
						<p class="text-warning">Belum Memiliki Akun? <a href="javaScript:void();">Hubungi Admin</a></p>
						</div>
					</form>
				 </div>
				</div>
	    	</div>
	     </div>
	    </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{url('assets/js/jquery.min.js')}}"></script>
  <script src="{{url('assets/js/popper.min.js')}}"></script>
  <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
	
  <!-- horizontal-menu js -->
  <script src="{{url('assets/js/horizontal-menu.js')}}"></script>
  
  <!-- Custom scripts -->
  <script src="{{url('assets/js/app-script.js')}}"></script>
  
</body>
</html>

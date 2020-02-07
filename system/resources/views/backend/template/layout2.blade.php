<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Absensi - @yield('PageTitle')</title>
  <!--favicon-->
  <link rel="icon" href="{{url('/')}}/assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="{{url('/')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{url('/')}}/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{url('/')}}/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{url('/')}}/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Horizontal CSS-->
  <link href="{{url('/')}}/assets/css/horizontal-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{url('/')}}/assets/css/app-style.css" rel="stylesheet"/>
 
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link" href="javascript:void();">
        <div class="media align-items-center">
           <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
          <div class="media-body">
            <h5 class="logo-text">{{ config('app.name', 'Laravel') }}</h5>
          </div>
        </div>
     </a>
    </li>
    
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    
    
   
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
            <p class="user-subtitle">{{ Auth::user()->email }}</p>
            </div>
           </div>
          </a>
        </li>
       
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="icon-power mr-2"></i> {{ __('Logout') }}</li>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<!-- start horizontal Menu -->
@include('backend.template.menu')
    
    <!-- end horizontal Menu -->

<div class="clearfix"></div>

@yield('content')
  

<!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->

   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © {{ config('app.name', 'Laravel') }} <?= date('Y');?>
        </div>
      </div>
    </footer>
	<!--End footer-->
	
   
   </div>
  <!--end color switcher-->
	
  </div><!--End wrapper-->
  

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('/')}}/assets/js/jquery.min.js"></script>
  <script src="{{url('/')}}/assets/js/popper.min.js"></script>
  <script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="{{url('/')}}/assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- horizontal-menu js -->
  <script src="{{url('/')}}/assets/js/horizontal-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="{{url('/')}}/assets/js/app-script.js"></script>

  <!-- Chart js -->
  <script src="{{url('/')}}/assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Index2 js -->
  <script src="{{url('/')}}/assets/js/dashboard-property-listing.js"></script>

</body>
</html>

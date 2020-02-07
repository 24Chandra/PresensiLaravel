@extends('backend.template.layout')
@section('PageTitle', 'Dahsboard Admin')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dashboard</span> </h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
						</div>

					</div>

					
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">
				<div class="row">
					<div class="col-sm-6 col-xl-4">
						<div class="card card-body">
							<div class="media mb-3">
								<div class="media-body">
									<h6 class="font-weight-semibold mb-0">Total Siswa</h6>
									<span class="text-muted">Seluruh data siswa</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-users icon-2x text-indigo-400 opacity-75"></i>
								</div>
							</div>

							<div class="progress mb-2" style="height: 0.125rem;">
								<div class="progress-bar bg-indigo-400" style="width: 80%">
									<span class="sr-only">67% Complete</span>
								</div>
							</div>

							<div>
				                <span class="float-right">150</span>
				                Jumlah
			                </div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-4">
						<div class="card card-body">
							<div class="media mb-3">
								<div class="media-body">
									<h6 class="font-weight-semibold mb-0">Total Kelas</h6>
									<span class="text-muted">Statistik Data Kelas</span>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-home icon-2x text-danger-400 opacity-75"></i>
								</div>
							</div>

							<div class="progress mb-2" style="height: 0.125rem;">
								<div class="progress-bar bg-danger-400" style="width: 50%">
									<span class="sr-only">8</span>
								</div>
							</div>
			                
			                <div>
			                	<span class="float-right">8</span>
			                	Jumlah Kelas
			                </div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-4">
						<div class="card card-body">
							<div class="media mb-3">
								<div class="mr-3 align-self-center">
									<i class="icon-user icon-2x text-blue-400 opacity-75"></i>
								</div>

								<div class="media-body">
									<h6 class="font-weight-semibold mb-0">Total Guru</h6>
									<span class="text-muted">Statistik Data Guru</span>
								</div>
							</div>

							<div class="progress mb-2" style="height: 0.125rem;">
								<div class="progress-bar bg-blue" style="width: 75%">
									<span class="sr-only">75% Complete</span>
								</div>
							</div>
			                
			                <div>
			                	<span class="float-right">50</span>
			                	Jumlah guru
			                </div>
						</div>
					</div>

					
				</div>

				<div class="row">
					<div class="col-sm-6 col-xl-4">

						<div class="card">
								<div class="card-body bg-blue text-center card-img-top" style="background-image: url({{url('/assets')}}/global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
									<div class="card-img-actions d-inline-block mb-3">
										<img class="img-fluid rounded-circle" src="{{url('/assets')}}/global_assets/images/placeholders/placeholder.jpg" width="170" height="170" alt="">
										
									</div>

									<h6 class="font-weight-semibold mb-0">{{Auth::user()->name}}</h6>
									<span class="d-block opacity-75">Head of UX</span>

								</div>

								<div class="card-body border-top-0">
									<div class="d-sm-flex flex-sm-wrap mb-3">
										<div class="font-weight-semibold">Full name:</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">{{Auth::user()->name}}</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-3">
										<div class="font-weight-semibold">Phone number:</div>
										<div class="ml-sm-auto mt-2 mt-sm-0">+3630 8911837</div>
									</div>

									<div class="d-sm-flex flex-sm-wrap mb-3">
										<div class="font-weight-semibold">Corporate Email:</div>
										<div class="ml-sm-auto mt-2 mt-sm-0"><a href="#">corporate@domain.com</a></div>
									</div>

									<div class="d-sm-flex flex-sm-wrap">
										<div class="font-weight-semibold">Personal Email:</div>
										<div class="ml-sm-auto mt-2 mt-sm-0"><a href="#">personal@domain.com</a></div>
									</div>
								</div>
							</div>
					</div>
					<div class="col-md-8">
					<div class="card">
							<div class="card-header bg-white header-elements-inline">
								<h6 class="card-title">Selamat Datang</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                	</div>
			                	</div>
							</div>
							
							<div class="card-body">
							Selamat Datang Di Halaman Admin Sistem Informasi Absensi Sekolah.

							</div>
						</div>

					</div>
				</div>




				<!-- Main charts -->
				
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->

     @endsection


@section('footer')
<!-- Footer Script -->

@endsection
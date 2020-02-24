<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="{{url('/assets/')}}/global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">{{Auth::user()->name}}</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- /user menu -->

                <?php 
 $userid = Auth::user()->id;
 $access = DB::table('access_role_users')
     ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
     ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
     ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
     ->where('access_role_users.users_id', $userid)
     ->select('access_name.name')
     ->get();

     $permission = $access->where('name', 'Permission-View')->count();
	 $role = $access->where('name', 'Role-View')->count();

	 $siswa = $access->where('name', 'Siswa-View')->count();
	 $guru = $access->where('name', 'Guru-View')->count();
	 $absensi = $access->where('name', 'Absensi-View')->count();
	 $kelas = $access->where('name', 'Absensi-View')->count();


?>
				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{url('/')}}" class="nav-link <?php if (Request::route()->getName() == 'Home') { echo 'active';} ?>">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
                        <?php if($permission > 0 || $role > 0){?>
						<li class="nav-item nav-item-submenu <?php if (
                                    Request::route()->getName() == 'Permission' ||
                                    Request::route()->getName() == 'Role' 
                                    ) { echo 'nav-item-expanded nav-item-open';} ?>">
							<a href="#" class="nav-link"><i class="icon-lock"></i> <span>Authentication</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{url('/permission')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Permission'
                                    ) { echo 'active';} ?>">
                                Permission</a>
                                </li>
								<li class="nav-item"><a href="{{url('/role')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Role'
                                    ) { echo 'active';} ?>">Group Role</a></li>
								<li class="nav-item"><a href="{{url('/users')}}" class="nav-link">Users</a></li>
							</ul>
						</li>
                        <?php } ?>
						
						
						<!-- /main -->

						<!-- Data -->
						<?php if($siswa > 0 || $kelas > 0 || $guru > 0 || $tahun > 0 ){?>
						<li class="nav-item nav-item-submenu <?php if (
                                    Request::route()->getName() == 'Siswa' ||
									Request::route()->getName() == 'Guru'  ||
									Request::route()->getName() == 'Kelas' ||
									Request::route()->getName() == 'Tahun'
                                    ) { echo 'nav-item-expanded nav-item-open';} ?>">
							<a href="#" class="nav-link"><i class="icon-books"></i> <span>Master</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{url('/siswa')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Siswa'
                                    ) { echo 'active';} ?>">
                                Data Siswa</a>
                                </li>
								<li class="nav-item"><a href="{{url('/guru')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Guru'
                                    ) { echo 'active';} ?>">
                                Data Guru</a>
                                </li>
								<li class="nav-item"><a href="{{url('/kelas')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Kelas'
                                    ) { echo 'active';} ?>">
                                Data Kelas</a>
                                </li>
								<li class="nav-item"><a href="{{url('/tahun')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Tahun'
                                    ) { echo 'active';} ?>">
                                Data Tahun</a>
                                </li>
							</ul>
						</li>
                        <?php } ?>
						<?php if($absensi > 0){?>
						<li class="nav-item nav-item-submenu <?php if (
                                    Request::route()->getName() == 'Absensi' ||
                                    Request::route()->getName() == 'Daftar_Hadir' 
                                    ) { echo 'nav-item-expanded nav-item-open';} ?>">
							<a href="#" class="nav-link"><i class="icon-reading"></i> <span>Transaksi</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="{{url('/absensi')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Absensi'
                                    ) { echo 'active';} ?>">
                               Absensi</a>
                                </li>
								<li class="nav-item"><a href="{{url('/absensi/daftar_hadir')}}" class="nav-link <?php if (
                                    Request::route()->getName() == 'Daftar_Hadir'
                                    ) { echo 'active';} ?>">
                                Daftar Hadir</a>
                                </li>
							</ul>
						</li>
                        <?php } ?>
						


					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
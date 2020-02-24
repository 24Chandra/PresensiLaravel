@extends('backend.template.layout')
@section('PageTitle', 'Absensi')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-lock mr-2"></i> <span class="font-weight-semibold">Data Siswa</span> </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Data Siswa</span>
            </div>

        </div>

        
    </div>
</div>
<!-- /page header -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header header-elements-inline">
						<h5 class="card-title">Master Siswa</h5>
						<div class="header-elements">
                           
	                	</div>
					</div>

                <div class="card-body">
                <form action="" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                            </div>
                            <select class="custom-select" name="kelas" onchange="this.form.submit()">
                            <option value="" >Pilih Kelas</option>
                            @foreach($kelas as $kls)
                                <option <?php if($kls->id_kelas == $kelas_id){echo 'selected';}?> value="{{$kls->id_kelas}}" >{{$kls->nama_group_kelas}} | {{$kls->kelas_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text"  name="search" class="form-control" <?php if($cari != null){?>value="<?= $cari;?>"<?php  } ?> placeholder="Cari NIS atau Nama">
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon contrast-alert">
                <i class="icon-close"></i>
                </div>
                <div class="alert-message">
                <span><strong>Danger!</strong> {{ $error }}.</span>
                </div>
            </div>
            @endforeach       
            @endif
            <div class="table-responsive">
                <table class="table">
                  <thead class="thead-secondary shadow-secondary">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nis</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Tahun Angkatan</th>
                      <th scope="col">Kelas</th>
                      <th class="text-center" scope="col"><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                  $i = ($data->currentpage()-1)* $data->perpage() + 1; 
                  $no = 1;
                foreach($data as $d):
                  $no++;
                ?>
                    <tr>
                      <th scope="row">{{$i++}}</th>
                      <td>{{$d->Nis}}</td>
                      <td>{{$d->nama}}</td>
                      <td>{{$d->tahun}}</td>
                      <td>{{$d->nama_group_kelas}} | {{$d->kelas_name}}</td>
                      <td>
                      <?php if($all_access->where('name','Absensi-Add')->count() > 0){ ?>
                      <a type="button" href="{{url('absensi/hadir/'.$d->Nis)}}" class="btn btn-info btn-xs waves-effect waves-light"><i class="icon-user-check"></i> Hadir</a>
                     
                      <?php } ?>
                      <?php if($d->Nis != 1){
                      if($all_access->where('name','Absensi-Add')->count() > 0){ ?>
                      <button data-toggle="modal" data-target="#tidak{{$d->Nis}}" class="btn btn-warning btn-xs waves-effect waves-light"><i class="icon-user-block"></i> Tidak Hadir</button>
                      
                        <!--End Modal -->
                        <?php if($all_access->where('name','Absensi-Add')->count() > 0){ ?>
                            <div class="modal fade" id="tidak{{$d->Nis}}">
                            <div class="modal-dialog">
                            <div class="modal-content border-secondary">
                                <div class="modal-header bg-secondary">
                                <h5 class="modal-title text-white">  Siswa Tidak Hadir</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action=<?= url('absensi/tidak_hadir'); ?> method="post">
                                    @csrf
                                    <input type="hidden" name="Nis" value="{{$d->Nis}}">
                                    <div class="form-group mb-3 mb-md-2">
									<label class="d-block font-weight-semibold">Keterangan Tidak Hadir</label>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="status" id="sakit" value="sakit">
										<label class="custom-control-label" for="sakit">Sakit</label>
									</div>

									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="status" id="izin" value="izin">
										<label class="custom-control-label" for="izin">Izin</label>
									</div>
                                    <div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="status" id="tk" value="tanpa keterangan">
										<label class="custom-control-label" for="tk">Tanpa Keterangan</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" name="status" id="tl" value="tl">
										<label class="custom-control-label" for="tl">TL</label>
									</div>
									
								</div>
                                   
                                
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-inverse-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-secondary"><i class="fa fa-check-square-o"></i> Save changes</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                                        
                        <?php } ?>
                      <?php } } ?>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
             </div>













                </div>
                <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                    {{ $data->links('pagination') }}
                       
                    </div>
                </div>
                
            </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
<!-- Footer Script -->

@endsection
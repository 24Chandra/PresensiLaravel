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
            <h4><i class="icon-lock mr-2"></i> <span class="font-weight-semibold">Daftar Hadir</span> </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Daftar Hadir</span>
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
						<h5 class="card-title">Daftar Hadir</h5>
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
                            <option value="" >Semua Kelas</option>
                            @foreach($kelas as $kls)
                                <option <?php if($kls->id_kelas == $kelas_id){echo 'selected';}?> value="{{$kls->id_kelas}}" >{{$kls->nama_group_kelas}} | {{$kls->kelas_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Tanggal</label>
                            </div>
                            <select class="custom-select" name="tgl_absen" onchange="this.form.submit()">
                            <option value="" >Semua Tanggal</option>
                            @foreach($tanggal as $tgl)
                                <option <?php if($tgl->tanggal_absen == $tgl_absen){echo 'selected';}?> value="{{$tgl->tanggal_absen}}" >{{date('d F Y', strtotime($tgl->tanggal_absen))}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-3">
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
                      <th scope="col">Status</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Tanggal Absensi</th>
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
                        <?php if($d->status == 1){?>
                            <span class="badge badge-info">Hadir</span>
                        <?php }else{ ?>
                            <span class="badge badge-danger">Tidak Hadir</span>
                        <?php } ?>
                      </td>
                      <td>
                            <?= strtoupper($d->keterangan);?>
                      <td>
                      {{date('d F Y', strtotime($d->tanggal_absen))}} | {{date('H:i:s', strtotime($d->jam_absen))}}
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
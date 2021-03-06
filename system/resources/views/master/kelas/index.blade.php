@extends('backend.template.layout')
@section('PageTitle', 'Role Admin')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-lock mr-2"></i> <span class="font-weight-semibold">Role</span> </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Kelas</span>
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
						<h5 class="card-title">Master Kelas</h5>
						<div class="header-elements">
                            <?php
                            if($all_access->where('name','Kelas-Add')->count() > 0){
                                ?>
                            
                            <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success">Tambah Data</button>
                            <?php } ?>
							
	                	</div>
					</div>

                <div class="card-body">
                <form action="" method="get">
                <div class="row">
                    <div class="col-md-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Sort</label>
                            </div>
                            <select class="custom-select" name="sort" onchange="this.form.submit()">
                                <option value="10" <?php if ($rowpage  == "10") {
                                                                        echo "selected";
                                                                    } ?>>10</option>
                                <option value="20" <?php if ($rowpage  == "20") {
                                                                        echo "selected";
                                                                    } ?>>20</option>
                                <option value="50" <?php if ($rowpage  == "50") {
                                                                        echo "selected";
                                                                    } ?>>50</option>
                                <option value="100 <?php if ($rowpage  == "100") {
                                                                        echo "selected";
                                                                    } ?>">100</option>
                                <option value="99999" <?php if ($rowpage  == "99999") {
                                                                        echo "selected";
                                                                    } ?>>All</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text"  name="search" class="form-control" <?php if($cari != null){?>value="<?= $cari;?>"<?php  } ?> placeholder="some text">
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
                      <th scope="col">Tahun Ajaran</th>
                      <th scope="col">Group Kelas</th>
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
                      <td>{{$d->tahun }}</td>
                      <td>{{$d->nama_group_kelas}}</td>
                      <td>{{$d->kelas_name}}</td>
                      <td width="20%">
                      
                      <?php if($all_access->where('name','Kelas-Edit')->count() > 0){ ?>
                      <button type="button" data-toggle="modal" data-target="#edit{{$d->id_kelas}}" class="btn btn-warning btn-xs waves-effect waves-light"><i class="fa fa-edit"></i> Edit</button>
                      <!-- Modal Edit -->
                      <div class="modal fade" id="edit{{$d->id_kelas}}">
                        <div class="modal-dialog">
                        <div class="modal-content border-secondary">
                            <div class="modal-header bg-secondary">
                            <h5 class="modal-title text-white">  Edit Data</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action=<?= route('Kelas.Update'); ?> method="post">
                                <input type="hidden" name="id" value="{{$d->id_kelas}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">Tahun</span>
                                    </div>
                                    <select id="tahun_id" class="form-control @error('tahun_id') is-invalid @enderror" name="tahunajaran_id">
                                    <option>Pilih Tahun</option>
                                    @foreach($tahunajaran as $item)
                                    <option <?php if ($item->tahun_id == $d->tahun_id){echo 'selected';} ?> value="{{$item->tahun_id}}">{{$item->tahun}}</option>
                                    @endforeach
                                    </select>   
                                </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Group Kelas</span>
                                </div>
                                <select id="tahun_id" class="form-control @error('tahun_id') is-invalid @enderror" name="group_kelas_id">
                                <option>Pilih Group Kelas</option>
                                @foreach($group_kelas as $item)
                                <option <?php if ($item->group_kelas_id == $d->group_kelas_id){echo 'selected';} ?> value="{{$item->group_kelas_id}}">{{$item->nama_group_kelas}}</option>
                                @endforeach
                                </select>  
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Kelas</span>
                                </div>
                                <select type="text" class="form-control @error('agama') is-invalid @enderror" name="kelas_name" >
                                <option >Pilih Kelas</option>
                                <option <?php if ($d->kelas_name == "A"){echo 'selected';} ?> value="A">A</option>
                                <option <?php if ($d->kelas_name == "B"){echo 'selected';} ?> value="B">B</option>
                                <option <?php if ($d->kelas_name == "C"){echo 'selected';} ?> value="C">C</option>
                                <option <?php if ($d->kelas_name == "D"){echo 'selected';} ?> value="D">D</option>
                                <option <?php if ($d->kelas_name == "E"){echo 'selected';} ?> value="E">E</option>
                                </select>
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
                    
                    <!--End Modal -->
                      <?php } ?>
                      <?php if($d->id_kelas != 1){
                      if($all_access->where('name','Kelas-Delete')->count() > 0){ ?>
                      <a href="<?= url('kelas/delete/'.$d->id_kelas);?>" class="btn btn-danger btn-xs waves-effect waves-light"><i class="fa fa-trash"></i> Delete</a>
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
<!--End Modal -->
<?php if($all_access->where('name','Kelas-Add')->count() > 0){ ?>
    <div class="modal fade" id="addModal">
    <div class="modal-dialog">
    <div class="modal-content border-secondary">
        <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">  Tambah Data Siswa</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action=<?= url('kelas/create'); ?> method="post">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Tahun</span>
                </div>
                <select id="tahun_id" class="form-control @error('tahun_id') is-invalid @enderror" name="tahunajaran_id">
                <option>Pilih Tahun</option>
                @foreach($tahunajaran as $item)
                <option value="{{$item->tahun_id}}">{{$item->tahun}}</option>
                @endforeach
                </select>   
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Group Kelas</span>
                  </div>
                  <select id="tahun_id" class="form-control @error('tahun_id') is-invalid @enderror" name="group_kelas_id">
                <option>Pilih Group Kelas</option>
                @foreach($group_kelas as $item)
                <option value="{{$item->group_kelas_id}}">{{$item->nama_group_kelas}}</option>
                @endforeach
                </select>  
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Kelas</span>
                  </div>
                  <select type="text" class="form-control @error('agama') is-invalid @enderror" name="kelas_name" >
                  <option >Pilih Kelas</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  </select>
                </div>
                @error('access_name')
                    <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
                @enderror
                
               
        
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
@endsection


@section('footer')
<!-- Footer Script -->

@endsection
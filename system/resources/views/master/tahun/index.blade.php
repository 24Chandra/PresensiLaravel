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
            <h4><i class="icon-lock mr-2"></i> <span class="font-weight-semibold">Tahun</span> </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Role</span>
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
						<h5 class="card-title">Master Tahun</h5>
						<div class="header-elements">
                            <?php
                            if($all_access->where('name','Tahun-Add')->count() > 0){
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
                      <th scope="col">Tahun</th>
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
                      <td width="20%">
                      
                      <?php if($all_access->where('name','Tahun-Edit')->count() > 0){ ?>
                      <button type="button" data-toggle="modal" data-target="#edit{{$d->tahun_id}}" class="btn btn-warning btn-xs waves-effect waves-light"><i class="fa fa-edit"></i> Edit</button>
                      <!-- Modal Edit -->
                      <div class="modal fade" id="edit{{$d->tahun_id}}">
                        <div class="modal-dialog">
                        <div class="modal-content border-secondary">
                            <div class="modal-header bg-secondary">
                            <h5 class="modal-title text-white">  Edit Data</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action=<?= route('Tahun.Update'); ?> method="post">
                                <input type="hidden" name="id" value="{{$d->tahun_id}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">Tahun</span>
                                    </div>
                                    <input id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{$d->tahun}}">
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
                      <?php if($d->tahun_id != 1){
                      if($all_access->where('name','Tahun-Delete')->count() > 0){ ?>
                      <a href="<?= url('tahun/delete/'.$d->tahun_id);?>" class="btn btn-danger btn-xs waves-effect waves-light"><i class="fa fa-trash"></i> Delete</a>
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
<?php if($all_access->where('name','Tahun-Add')->count() > 0){ ?>
    <div class="modal fade" id="addModal">
    <div class="modal-dialog">
    <div class="modal-content border-secondary">
        <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">  Tambah Data Tahun</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action=<?= url('tahun/create'); ?> method="post">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Tahun</span>
                </div>
                <input id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
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
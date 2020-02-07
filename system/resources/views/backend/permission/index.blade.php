@extends('backend.template.layout')
@section('PageTitle', 'Permission Admin')
@section('header')
<!-- Bagian Header -->

@endsection

@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-lock mr-2"></i> <span class="font-weight-semibold">Permission</span> </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Permission</span>
            </div>

        </div>

        
    </div>
</div>
<!-- /page header -->

<div class="content">

				<!-- Basic tables title -->
				<div class="mb-3">
					<h6 class="mb-0 font-weight-semibold">
						Permission
					</h6>
					<span class="text-muted d-block">Manajemen <code>Permission</code> Akses</span>
				</div>
				<!-- /basic tables title -->

				<!-- Framed card body table -->
				
				<!-- Bordered card body table -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Management Permission</h5>
						<div class="header-elements">
                            <?php
                            if($all_access->where('name','Permission-Add')->count() > 0){
                                ?>
                            
                            <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-success">Tambah Data</button>
                            <?php } ?>
							
	                	</div>
					</div>

					<div class="card-body">
						
                    <form action="" method="get">
                                    <div class="row">
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Sort</label>
                                                </div>
                                                <select class="form-control custom-select" name="rowpage" onchange="this.form.submit()">
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
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                            <input type="text"  name="search" class="form-control" <?php if($cari != null){?>value="<?= $cari;?>"<?php  } ?> placeholder="Cari Berdasarkan RoleName">
                                                <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
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
						<div class="card card-table table-responsive shadow-0 mb-0">
							<table class="table table-bordered">
								<thead>
									<tr>
                                        <th>#</th>
                                        <th>Display Name</th>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
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
                                                        <td>{{$i++}}</td>
                                                        <td>{{$d->display_name}}</td>
                                                        <td>{{$d->name}}</td>
                                                        <td>{{$d->description}}</td>
                                                        <td>
                                                        <?php if($all_access->where('name','Permission-Edit')->count() > 0){ ?>
                                                            <button type="button" data-toggle="modal" data-target="#edit{{$d->name}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                                                        <!-- Modal Edit -->
                                                        <div class="modal fade" id="edit{{$d->name}}">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content border-secondary">
                                                                <div class="modal-header bg-secondary">
                                                                <h5 class="modal-title text-white">  Edit Data</h5>
                                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action=<?= route('Permission.Update'); ?> method="post">
                                                                    <input type="hidden" name="id" value="{{$d->access_id}}">
                                                                    @csrf
                                                                        <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Display Name</span>
                                                                        </div>
                                                                        <input id="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{$d->display_name}}">
                                                                        </div>
                                                                        @error('display_name')
                                                                            <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
                                                                        @enderror
                                                                        <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Access Name</span>
                                                                        </div>
                                                                        <input type="text" id="access_name" class="form-control  @error('access_name') is-invalid @enderror" name="access_name" value="{{$d->name}}">
                                                                        </div>
                                                                        @error('access_name')
                                                                            <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
                                                                        @enderror
                                                                        <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Description</span>
                                                                        </div>
                                                                            <textarea class="form-control  @error('description') is-invalid @enderror" placeholder="Persimision Untuk Tambah User" name="description">{{$d->description}}</textarea>
                                                                        </div>
                                                                    
                                                                
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-inverse-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                                <button type="submit" class="btn btn-secondary"><i class="fa fa-check-square-o"></i> Save changes</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </div><!--End Modal -->
                                                        <?php } ?>
                                                        <?php if($all_access->where('name','Permission-Delete')->count() > 0){ ?>
                                                        <a href="<?= url('permission/delete/'.$d->access_id);?>" class="btn btn-danger btn-xs "><i class="fa fa-trash"></i></a>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                                </tbody>
							</table>
                            <br>
                            <ul class="pagination align-self-end">
                            {{ $data->links('pagination') }}
							</ul>
                            <br>
						</div>
                                 
					</div>
                    
				</div>
				<!-- /bordered card body table -->

			</div>

<!-- Modal -->
<?php if($all_access->where('name','Permission-Add')->count() > 0){ ?>
    <div class="modal fade" id="addModal">
    <div class="modal-dialog">
    <div class="modal-content border-secondary">
        <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">  Tambah Data</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action=<?= url('permission/create'); ?> method="post">
            @csrf
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Display Name</span>
                  </div>
                  <input id="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" placeholder="User">
                </div>
                @error('display_name')
                    <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Access Name</span>
                  </div>
                  <input type="text" id="access_name" class="form-control  @error('access_name') is-invalid @enderror" name="access_name" placeholder="User-Create">
                </div>
                @error('access_name')
                    <p style="color:red;font-size:9px;margin-left:100px;">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Description</span>
                  </div>
                    <textarea class="form-control  @error('description') is-invalid @enderror" placeholder="Persimision Untuk Tambah User" name="description"></textarea>
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
<!--End Modal -->

@endsection


@section('footer')
<!-- Footer Script -->

@endsection
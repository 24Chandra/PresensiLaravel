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
            <h4><i class="icon-lock mr-2"></i> <span class="font-weight-semibold">Role Add</span> </h4>
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
                <div class="card-header bg-dark text-white header-elements-inline">
                    <h6 class="card-title">Create  Role</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                        <a href="{{url('role')}}" class="btn btn-sm btn-square btn-outline-danger waves-effect waves-light m-1">Kembali</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                <form action="{{route('Role.Update')}}" method="post">
                <input type="hidden" name="group_id" value="{{$group->group_id}}">
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Role Data</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Role Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" placeholder="Enter Your Group Name" value="{{$group->name}}">
                        </div>
                    </div>
                    @error('role_name')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea rows="3" cols="3" class="form-control" name="description" placeholder="Default textarea">{{$group->description}}</textarea>
                        </div>
                    </div>
                    
                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Permission</legend>
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="nav-item"><a href="#auth" class="nav-link active" data-toggle="tab">Autentication</a></li>
                        <li class="nav-item"><a href="#data" class="nav-link" data-toggle="tab">Master Data</a></li>
                        <li class="nav-item"><a href="#transaksi" class="nav-link" data-toggle="tab">Transaksi</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="auth">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                    <th style="width:50px; text-align:center;">Menu</th>
                                    <th style="width:75px; text-align:center;">Lihat</th>
                                    <th style="width:75px; text-align:center;">Tambah</th>
                                    <th style="width:75px; text-align:center;">Edit</th>
                                    <th style="width:75px; text-align:center;">Hapus</th>
                                </tr>
                            <thead>
                            <tbody>
                            <tr>
                                <td>Permission</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Permission-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Permission-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Permission-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Permission-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Permission-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Permission-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Permission-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Permission-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                            </tr>
                            <tr>
                                <td>Group Role</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Role-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Role-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Role-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Role-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Role-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Role-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Role-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Role-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                            </tr>
                            <tr>
                                <td>Users</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','User-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','User-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','User-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','User-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','User-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','User-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','User-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','User-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                            </tr>
                        </tbody>
                    </table>
                        </div>

                        <div class="tab-pane fade" id="data">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                    <th style="width:50px; text-align:center;">Menu</th>
                                    <th style="width:75px; text-align:center;">Lihat</th>
                                    <th style="width:75px; text-align:center;">Tambah</th>
                                    <th style="width:75px; text-align:center;">Edit</th>
                                    <th style="width:75px; text-align:center;">Hapus</th>
                                </tr>
                            <thead>
                            <tbody>
                            <tr>
                                <td>Siswa</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Siswa-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Siswa-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Siswa-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Siswa-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Siswa-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Siswa-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Siswa-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Siswa-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                            </tr>
                            <tr>
                                <td>Guru</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Guru-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Guru-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Guru-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Guru-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Guru-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Guru-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Guru-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Guru-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Kelas-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Kelas-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Kelas-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Kelas-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Kelas-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Kelas-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Kelas-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Kelas-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Tahun-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Tahun-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Tahun-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Tahun-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Tahun-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Tahun-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Tahun-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Tahun-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                            </tr>
                        </tbody>
                    </table>
                        </div>
                            <div class="tab-pane fade" id="transaksi">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                                <th style="width:50px; text-align:center;">Menu</th>
                                                <th style="width:75px; text-align:center;">Lihat</th>
                                                <th style="width:75px; text-align:center;">Tambah</th>
                                                <th style="width:75px; text-align:center;">Edit</th>
                                                <th style="width:75px; text-align:center;">Hapus</th>
                                            </tr>
                                        <thead>
                                        <tbody>
                                        <tr>
                                            <td>Absensi</td>
                                            <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Absensi-View')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Absensi-View')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                            <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Absensi-Add')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Absensi-Add')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                            <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Absensi-Edit')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Absensi-Edit')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                            <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$RoleList->where('name','Absensi-Delete')->first()->access_id}}" <?php if($UsedRoles->where('access_id',$RoleList->where('name','Absensi-Delete')->first()->access_id)->first() != null){echo "checked";} ?>></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                    
                </fieldset>
                
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light m-1">Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal -->

@endsection


@section('footer')
<!-- Footer Script -->

@endsection
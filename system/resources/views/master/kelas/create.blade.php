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
                <form action="{{route('Role.Simpan')}}" method="post">
                @csrf
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Role Data</legend>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Role Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" placeholder="Enter Your Group Name">
                        </div>
                    </div>
                    @error('role_name')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea rows="3" cols="3" class="form-control" name="description" placeholder="Default textarea"></textarea>
                        </div>
                    </div>
                    
                </fieldset>
                <fieldset class="mb-3">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Permission</legend>
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="nav-item"><a href="#auth" class="nav-link active" data-toggle="tab">Autentication</a></li>
                        <li class="nav-item"><a href="#data" class="nav-link" data-toggle="tab">Master Data</a></li>
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
                                <td>Akses</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Permission-View')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Permission-Add')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Permission-Edit')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Permission-Delete')->first()->access_id}}"></td>
                            </tr>
                            <tr>
                                <td>Grup Akses</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Role-View')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Role-Add')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Role-Edit')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','Role-Delete')->first()->access_id}}"></td>
                            </tr>
                            <tr>
                                <td>Pengguna</td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','User-View')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','User-Add')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','User-Edit')->first()->access_id}}"></td>
                                <td style="text-align:center;"><input type="checkbox" name="selectedRoles[]" value="{{$group->where('name','User-Delete')->first()->access_id}}"></td>
                            </tr>
                            
                        </tbody>
                    </table>
                        </div>

                        <div class="tab-pane fade" id="data">
                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
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
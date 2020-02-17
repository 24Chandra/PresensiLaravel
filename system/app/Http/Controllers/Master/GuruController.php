<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Role-View')->count() > 0) {
            return view('errors.403');
        }

         //Sorting Data
    $cari = Input::get('search');
    $rowpage = Input::get('sort');
    if ($rowpage == null) {
      $rowpage = 10;
    }

    if ($cari == null) {
      $query = DB::table('guru')->orderBy('NIGN', 'desc')->paginate($rowpage);
    } else {
      $query = DB::table('guru')->where('NIGN', 'LIKE', '%' . $cari . '%')->orwhere('nama', 'LIKE', '%' . $cari . '%')->orderBy('NIGN', 'desc')->paginate($rowpage);
    }
    $query->appends(['search' => $cari, 'sort' => $rowpage]);

    return view('master.guru.index')
        ->with('rowpage', $rowpage)
        ->with('cari', $cari)
        ->with('data', $query)
        ->with('all_access',$access);

    
        
    }

    public function create(Request $req)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

            if (!$access->where('name', 'Guru-Add')->count() > 0) {
                return view('errors.403');
            }$NIGN = $req->NIGN;
            $nama = $req->nama;
            $kelas_id = $req->kelas_id;
            $kelamin = $req->kelamin;
            $agama = $req->agama;
            $alamat = $req->alamat;
            $tanggal_lahir = $req->tanggal_lahir;
            $tempat_lahir = $req->tempat_lahir;
            $NUPTK = $req->NUPTK;
            $NPSN = $req->NPSN;
            $rules =  [
                         'NIGN' => 'required',
                         'nama' => 'required',
                         'agama' => 'required',
                         'alamat' => 'required',
                         'tanggal_lahir' => 'required',
                         'tempat_lahir' => 'required',
                     ];
             $customMessages = [
                 'NIGN.required' => 'Nomor Induk Guru Nasional Diisi',
                 'nama.required' => 'Nama Guru Wajib Diisi',
                 'agama.required' => 'agama Wajib Diisi',
                 'alamat.required' => 'alamat Wajib Diisi',
                 'tanggal_lahir.required' => 'tanggal lahir Wajib Diisi',
                 'tempat_lahir.required' => 'tempat lahir Wajib Diisi',
             ];
            $this->validate($req,$rules,$customMessages);
            $data = [
             'NIGN' => $NIGN,
             'nama' => $nama,
             'kelamin' => $kelamin,
             'agama' => $agama,
             'alamat' => $alamat,
             'tanggal_lahir' => $tanggal_lahir,
             'tempat_lahir' => $tempat_lahir,
             'NUPTK' => $NUPTK,
             'NPSN' => $NPSN,
            ];
    
        //    Proses
        DB::table('guru')->insert($data);
        Alert::success('Menambahkan Data Guru','Berhasil');
        return Redirect::back();
        }


        public function update(Request $req)
        {
            $userid = Auth::user()->id;
            $access = DB::table('access_role_users')
                ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
                ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
                ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
                ->where('access_role_users.users_id', $userid)
                ->select('access_name.name')
                ->get();
    
            if (!$access->where('name', 'Guru-Edit')->count() > 0) {
                return view('errors.403');
            }
    
            $NIGN = $req->NIGN;
            $nama = $req->nama;
            $kelas_id = $req->kelas_id;
            $kelamin = $req->kelamin;
            $agama = $req->agama;
            $alamat = $req->alamat;
            $tanggal_lahir = $req->tanggal_lahir;
            $tempat_lahir = $req->tempat_lahir;
            $NUPTK = $req->NUPTK;
            $NPSN = $req->NPSN;
            $data = [
             'NIGN' => $NIGN,
             'nama' => $nama,
             'kelamin' => $kelamin,
             'agama' => $agama,
             'alamat' => $alamat,
             'tanggal_lahir' => $tanggal_lahir,
             'tempat_lahir' => $tempat_lahir,
            ];
    
                // Chek data
                // dd($data);
                // chek all data
                // dd($req->all());
    
        //    Proses
        // DB::table('siswa')->where('Nis', $Nis)->update($data);
        DB::table('guru')->where('NIGN', $NIGN)->update($data);
        Alert::success('Mengubah data Guru','Berhasil');
        return Redirect::back();
        }
    
        public function delete(Request $req)
        {
            $userid = Auth::user()->id;
            $access = DB::table('access_role_users')
                ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
                ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
                ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
                ->where('access_role_users.users_id', $userid)
                ->select('access_name.name')
                ->get();
    
            if (!$access->where('name', 'Guru-Delete')->count() > 0) {
                return view('errors.403');
            }
    
            DB::table('NIGN')->where('NIGN', $req->id)->delete();
            Alert::success('Terimakasih Anda Berhasil Menghapus Data Guru','Berhasil');
            return Redirect::back();
    }
    
    }
    
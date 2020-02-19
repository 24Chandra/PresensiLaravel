<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class KelasController extends Controller
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
      $query = DB::table('kelas')
      ->join('tahunajaran', 'kelas.tahunajaran_id','=','tahunajaran.tahun_id')
      ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
      ->orderBy('id_kelas', 'desc')->paginate($rowpage);
    } else {
      $query = DB::table('kelas')->where('id_kelas', 'LIKE', '%' . $cari . '%')->orwhere('tahun_ajaran', 'LIKE', '%' . $cari . '%')->orderBy('Nis', 'desc')->paginate($rowpage);
    }
    $query->appends(['search' => $cari, 'sort' => $rowpage]);

    $tahun = DB::table('tahunajaran')
    ->get();
    // dd($tahun);

    


    return view('master.kelas.index')
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

        if (!$access->where('name', 'Siswa-Add')->count() > 0) {
            return view('errors.403');
        }$Nis = $req->Nis;
        $nama = $req->nama;
        $kelas_id = $req->kelas_id;
        $jenis_kelamin = $req->jenis_kelamin;
        $agama = $req->agama;
        $alamat = $req->alamat;
        $tanggal_lahir = $req->tanggal_lahir;
        $tempat_lahir = $req->tempat_lahir;
        $foto = $req->foto;
        $rules =  [
                     'Nis' => 'required',
                     'nama' => 'required',
                     'kelas_id' => 'required',
                     'agama' => 'required',
                     'alamat' => 'required',
                     'tanggal_lahir' => 'required',
                     'tempat_lahir' => 'required',
                     'foto' => 'required',
                 ];
         $customMessages = [
             'Nis.required' => 'Nama Tipe Sewa Wajib Diisi',
             'nama.required' => 'Tipe Sewa ID Wajib Diisi',
             'kelas_id.required' => 'kelas Wajib Diisi',
             'agama.required' => 'agama Wajib Diisi',
             'alamat.required' => 'alamat Wajib Diisi',
             'tanggal_lahir.required' => 'tanggal lahir Wajib Diisi',
             'tempat_lahir.required' => 'tempat lahir Wajib Diisi',
             'foto.required' => 'foto lahir Wajib Diisi',
         ];
        $this->validate($req,$rules,$customMessages);
        $data = [
         'Nis' => $Nis,
         'nama' => $nama,
         'kelas_id' => $kelas_id,
         'jenis_kelamin' => $jenis_kelamin,
         'agama' => $agama,
         'alamat' => $alamat,
         'tanggal_lahir' => $tanggal_lahir,
         'tempat_lahir' => $tempat_lahir,
         'foto' => $foto
        ];

    //    Proses
    DB::table('siswa')->insert($data);
    Alert::success('Menambahkan Data Siswa','Berhasil');
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

        if (!$access->where('name', 'Siswa-Edit')->count() > 0) {
            return view('errors.403');
        }

        $Nis = $req->id;
        $nama = $req->nama;
        $kelas_id = $req->kelas_id;
        $jenis_kelamin = $req->jenis_kelamin;
        $agama = $req->agama;
        $alamat = $req->alamat;
        $tanggal_lahir = $req->tanggal_lahir;
        $tempat_lahir = $req->tempat_lahir;
        $foto = $req->foto;
        $data = [
            'nama' => $nama,
             'kelas_id' => $kelas_id,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'alamat' => $alamat,
            'tanggal_lahir' => $tanggal_lahir,
            'tempat_lahir' => $tempat_lahir,
            'foto' => $foto
           ];

            // Chek data
            // dd($data);
            // chek all data
            // dd($req->all());

    //    Proses
    // DB::table('siswa')->where('Nis', $Nis)->update($data);
    DB::table('siswa')->where('Nis', $Nis)->update($data);
    Alert::success('Mengubah data Siswa','Berhasil');
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

        if (!$access->where('name', 'Siswa-Delete')->count() > 0) {
            return view('errors.403');
        }

        DB::table('siswa')->where('Nis', $req->id)->delete();
        Alert::success('Terimakasih Anda Berhasil Menghapus Data SIswa','Berhasil');
        return Redirect::back();
}

}

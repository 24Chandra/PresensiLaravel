<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use Alert;
use Redirect;

class AbsensiController extends Controller
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

        if (!$access->where('name', 'Absensi-View')->count() > 0) {
            return view('errors.403');
        }
        $kelas = DB::table('kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->get();

        $kelas_id = Input::get('kelas');


        $cari = Input::get('search');
        $rowpage = Input::get('sort');
        if ($rowpage == null) {
        $rowpage = 10;
        }


        // cek absensi = 

        $today = date('Y-m-d');
        $absensi = DB::table('daftar_hadir')->whereDate('tanggal_absen', $today)->get();
      

        $used_nis = [];
        $i = 0;

        foreach($absensi as $abs){
            $used_nis[$i]['Nis'] = $abs->Nis;
            $i++;
        }

       

        


        if ($cari == null && $kelas_id != null) {
            $query = DB::table('siswa')->orderBy('Nis', 'desc')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->where('kelas_id', $kelas_id)
            ->wherenotin('Nis', $used_nis)
            ->paginate($rowpage);
          } else if($cari != null && $kelas_id != null) {
            $query = DB::table('siswa')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->where('Nis', 'LIKE', '%' . $cari . '%')
            ->where('kelas_id', $kelas_id)
            ->wherenotin('Nis', $used_nis)
            ->orwhere('nama', 'LIKE', '%' . $cari . '%')->orderBy('Nis', 'desc')->paginate($rowpage);
          }else{
            $query = DB::table('siswa')->orderBy('Nis', 'desc')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->wherenotin('Nis', $used_nis)
            ->paginate($rowpage);
          }
          $query->appends(['search' => $cari, 'sort' => $rowpage]);


        

          
          return view('transaksi.absen.index',compact('kelas','kelas_id'))
          ->with('rowpage', $rowpage)
          ->with('cari', $cari)
          ->with('data', $query)
          ->with('all_access',$access);
      
    }


    public function hadir(Request $req)
    {
        $data = [
            'Nis' => $req->Nis,
            'status' => '1',
            'keterangan' => 'hadir',
            'petugas' => Auth::user()->name,
            'tanggal_absen' => date('Y-m-d'),
            'jam_absen' => date('H:i:s')
        ];

        DB::table('daftar_hadir')->insert($data);
        Alert::success('Berhasil Menambahkan Daftar Hadir Siswa','Berhasil');
        return Redirect::back();
    }




    public function tidak_hadir(Request $req)
    {
        $data = [
            'Nis' => $req->Nis,
            'status' => '2',
            'keterangan' => $req->status,
            'petugas' => Auth::user()->name,
            'tanggal_absen' => date('Y-m-d'),
            'jam_absen' => date('H:i:s')
        ];

        DB::table('daftar_hadir')->insert($data);
        Alert::success('Berhasil Menambahkan Daftar Hadir Siswa','Berhasil');
        return Redirect::back();
    }

    public function daftar_hadir()
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Absensi-View')->count() > 0) {
            return view('errors.403');
        }
        $kelas = DB::table('kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->get();

        $kelas_id = Input::get('kelas');


        $cari = Input::get('search');

        $rowpage = Input::get('sort');

        if ($rowpage == null) {
            $rowpage = 10;
        }

         //   Ambil Semua Tanggal Absensi

         $tgl_absen = Input::get('tgl_absen');

         $tanggal = DB::table('daftar_hadir')
         ->select('tanggal_absen')
         ->groupBy('tanggal_absen')
         ->get();

        if ($kelas_id != null && $tgl_absen != null && $cari == null) {
            $query = DB::table('daftar_hadir')->orderBy('id', 'desc')
            ->join('siswa','daftar_hadir.Nis','=','siswa.Nis')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->where('kelas_id', $kelas_id)
            ->where('tanggal_absen', $tgl_absen)
            ->paginate($rowpage);

          } else if($kelas_id != null && $tgl_absen == null && $cari == null) {
            $query = DB::table('daftar_hadir')
            ->join('siswa','daftar_hadir.Nis','=','siswa.Nis')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->where('kelas_id', $kelas_id)->paginate($rowpage);
        }else if($kelas_id != null && $tgl_absen == null && $cari != null){
            $query = DB::table('daftar_hadir')
            ->join('siswa','daftar_hadir.Nis','=','siswa.Nis')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->where('daftar_hadir.Nis', 'LIKE', '%' . $cari . '%')
            ->where('kelas_id', $kelas_id)
            ->orwhere('nama', 'LIKE', '%' . $cari . '%')->orderBy('daftar_hadir.id', 'desc')->paginate($rowpage);
        }else if($kelas_id != null && $tgl_absen != null && $cari != null){
            $query = DB::table('daftar_hadir')
            ->join('siswa','daftar_hadir.Nis','=','siswa.Nis')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->where('daftar_hadir.Nis', 'LIKE', '%' . $cari . '%')
            ->where('kelas_id', $kelas_id)
            ->where('tanggal_absen', $tgl_absen)
            ->orwhere('nama', 'LIKE', '%' . $cari . '%')->orderBy('daftar_hadir.id', 'desc')->paginate($rowpage);
        }
          
          else{
            $query = DB::table('daftar_hadir')->orderBy('id', 'desc')
            ->join('siswa','daftar_hadir.Nis','=','siswa.Nis')
            ->join('kelas', 'siswa.kelas_id','=','kelas.id_kelas')
            ->join('group_kelas', 'kelas.group_kelas_id','=','group_kelas.group_kelas_id')
            ->join('tahunajaran','kelas.tahunajaran_id','=','tahunajaran.tahun_id')
            ->paginate($rowpage);
          }
          $query->appends(['search' => $cari, 'sort' => $rowpage]);


       

       

          return view('transaksi.daftar_hadir.index',compact('kelas','kelas_id','tgl_absen'))
          ->with('rowpage', $rowpage)
          ->with('cari', $cari)
          ->with('data', $query)
          ->with('tanggal', $tanggal)
          ->with('all_access',$access);



    }
}

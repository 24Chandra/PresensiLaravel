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

        if (!$access->where('name', 'Kelas-View')->count() > 0) {
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
      $query = DB::table('kelas')->where('id_kelas', 'LIKE', '%' . $cari . '%')->orwhere('tahun_ajaran', 'LIKE', '%' . $cari . '%')->orderBy('id_kelas', 'desc')->paginate($rowpage);
    }
    $query->appends(['search' => $cari, 'sort' => $rowpage]);


    $tahunajaran = DB::table('tahunajaran')
     ->get();

     
    $group_kelas = DB::table('group_kelas')
    ->get();
     //dd($tahunajaran);

    


    return view('master.kelas.index',compact('tahunajaran'),compact('group_kelas'))
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

        if (!$access->where('name', 'Kelas-Add')->count() > 0) {
            return view('errors.403');
        }$tahunajaran_id = $req->tahunajaran_id;
        $group_kelas_id = $req->group_kelas_id;
        $kelas_name = $req->kelas_name;
        $rules =  [
                     'tahunajaran_id' => 'required',
                     'group_kelas_id' => 'required',
                     'kelas_name' => 'required',
                 ];
         $customMessages = [
             'tahunajaran_id.required' => 'Nama Tipe Sewa Wajib Diisi',
             'group_kelas_id.required' => 'Tipe Sewa ID Wajib Diisi',
             'kelas_name.required' => 'kelas Wajib Diisi',
         ];
        $this->validate($req,$rules,$customMessages);
        $data = [
         'tahunajaran_id' => $tahunajaran_id,
         'group_kelas_id' => $group_kelas_id,
         'kelas_name' => $kelas_name
        ];

    //    Proses
    DB::table('kelas')->insert($data);
    Alert::success('Menambahkan Data Kelas','Berhasil');
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

        if (!$access->where('name', 'Kelas-Edit')->count() > 0) {
            return view('errors.403');
        }
        $id_kelas = $req->id_kelas;
        $tahunajaran_id = $req->tahunajaran_id;
        $group_kelas_id = $req->group_kelas_id;
        $kelas_name = $req->kelas_name;
        $data = [
            'tahunajaran_id' => $tahunajaran_id,
            'group_kelas_id' => $group_kelas_id,
            'kelas_name' => $kelas_name
           ];

            // Chek data
            //dd($data);
            // chek all data
            // dd($req->all());

    //    Proses
    DB::table('kelas')->where('id_kelas', $id_kelas)->update($data);
    Alert::success('Perubahan data Kelas telah dilakukan.','Berhasil');
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

        if (!$access->where('name', 'Kelas-Delete')->count() > 0) {
            return view('errors.403');
        }

        DB::table('kelas')->where('id_kelas', $req->id)->delete();
        Alert::success('Terimakasih Anda Berhasil Menghapus Data Kelas','Berhasil');
        return Redirect::back();
}

}

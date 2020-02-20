<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class TahunController extends Controller
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

        if (!$access->where('name', 'Tahun-View')->count() > 0) {
            return view('errors.403');
        }

         //Sorting Data
    $cari = Input::get('search');
    $rowpage = Input::get('sort');
    if ($rowpage == null) {
      $rowpage = 10;
    }

    if ($cari == null) {
      $query = DB::table('tahunajaran')
      ->orderBy('tahun_id', 'desc')->paginate($rowpage);
    } else {
      $query = DB::table('tahunajaran')->where('tahun_id', 'LIKE', '%' . $cari . '%')->orwhere('tahun', 'LIKE', '%' . $cari . '%')->orderBy('tahun_id', 'desc')->paginate($rowpage);
    }
    $query->appends(['search' => $cari, 'sort' => $rowpage]);

    


    return view('master.tahun.index')
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
        }$tahun = $req->tahun;
        $rules =  [
                     'tahun' => 'required',
                 ];
         $customMessages = [
             'tahun.required' => 'Tahun Angkatan Wajib Diisi',
         ];
        $this->validate($req,$rules,$customMessages);
        $data = [
         'tahun' => $tahun
        ];

    //    Proses
    DB::table('tahunajaran')->insert($data);
    Alert::success('Menambahkan Data tahun angkatan','Berhasil');
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
        $tahun_id = $req->tahun_id;
        $tahun = $req->tahun;
        $data = [
            'tahun' => $tahun
           ];

            // Chek data
            //dd($data);
            // chek all data
            // dd($req->all());

    //    Proses
    DB::table('tahunajaran')->where('tahun_id', $tahun_id)->update($data);
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

        if (!$access->where('name', 'Tahun-Delete')->count() > 0) {
            return view('errors.403');
        }

        DB::table('tahunajaran')->where('tahun_id', $req->id)->delete();
        Alert::success('Terimakasih Anda Berhasil Menghapus Data Kelas','Berhasil');
        return Redirect::back();
}

}

<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class SiswaController extends Controller
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
      $query = DB::table('siswa')->orderBy('Nis', 'desc')->paginate($rowpage);
    } else {
      $query = DB::table('siswa')->where('Nis', 'LIKE', '%' . $cari . '%')->orwhere('nama', 'LIKE', '%' . $cari . '%')->orderBy('Nis', 'desc')->paginate($rowpage);
    }
    $query->appends(['search' => $cari, 'sort' => $rowpage]);

    return view('master.siswa.index')
        ->with('rowpage', $rowpage)
        ->with('cari', $cari)
        ->with('data', $query)
        ->with('all_access',$access);

    
        
    }

    public function create()
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
        }
        $RoleAccessName = DB::table('access_name')->get();
        return view('master.siswa.create')->with('group', $RoleAccessName)->with('all_access', $access);
    }


    public function store(Request $req)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Role-Add')->count() > 0) {
            return view('errors.403');
        }

        $rules =  [
            'role_name' => 'required'
        ];
        $customMessages = [
            'role_name.required' => 'Group Name Tidak Boleh Kosong'
        ];
        $this->validate($req, $rules,$customMessages);


        $name = $req->role_name;
        $description = $req->description;
        $selectedRoles = $req->selectedRoles;
        $created_date = Date("Y-m-d h:i:s");
        $created_by = Auth::user()->name;


        $data = [
            'name' => $name,
            'description' => $description,
            'created_date' => $created_date,
            'created_by' => $created_by
        ];
        DB::table('access_role_group')->insert($data);
        $id=DB::table('access_role_group')->orderby('group_id','desc')->first()->group_id;

        // dd($id);
        if($selectedRoles != null){
            foreach($selectedRoles as $d){
                DB::table('access_role')->insert(['group_id' => $id, 'access_id' => $d]);
            }
        }

        Alert::success('Terimakasih Anda Berhasil Menambahkan Role','Berhasil');
         return Redirect::back();
    }


    public function edit(Request $req)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Role-Edit')->count() > 0) {
            return view('errors.403');
        }



        $id = $req->id;
        $UsedRoles = DB::table('access_role')->where('group_id', $id)->get();
        $Group = DB::table('access_role_group')->where('group_id', $id)->first();
        $RoleList = DB::table('access_name')->get();
        return view('backend.role.edit', compact('rusun','Rusun_Id'))
        ->with('RoleList', $RoleList)
        ->with('group', $Group)
        ->with('UsedRoles', $UsedRoles);
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

        if (!$access->where('name', 'Role-Edit')->count() > 0) {
            return view('errors.403');
        }

        $rules =  [
            'role_name' => 'required'
        ];
        $customMessages = [
            'role_name.required' => 'Group Name Tidak Boleh Kosong'
        ];
        $this->validate($req, $rules,$customMessages);


        $name = $req->role_name;
        $description = $req->description;
        $selectedRoles = $req->selectedRoles;
        $created_date = Date("Y-m-d h:i:s");
        $created_by = Auth::user()->name;

        $data = [
            'name' => $name,
            'description' =>$description,
            'modified_by' => $created_by,
            'modified_date' => $created_date
        ];


        // dd($selectedRoles);

        try{
            $u =  DB::table('access_role_group')->where('group_id', $req->group_id)->update($data);
            DB::table('access_role')->where(['group_id' => $req->group_id])->delete();
            if($selectedRoles != null){
                foreach($selectedRoles as $d){
                    DB::table('access_role')->insert(['group_id' => $req->group_id, 'access_id' => $d]);
                }
            }

            Alert::success('Terimakasih Anda Berhasil Mengubah Role','Berhasil');
             return Redirect::back();
        }catch (\Exception $e) {
            Alert::error('Terjadi Kesalahan saat menyimpan data ', 'Gagal !')->persistent('Close');
            return Redirect::back()->withErrors('Gagal Menyimpan Perubahan');
        }
    }




    public function delete(Request $request)
    {
        $userid = Auth::user()->id;
        $access = DB::table('access_role_users')
            ->join('access_role_group', 'access_role_users.group_id', '=', 'access_role_group.group_id')
            ->join('access_role', 'access_role_group.group_id', '=', 'access_role.group_id')
            ->join('access_name', 'access_role.access_id', '=', 'access_name.access_id')
            ->where('access_role_users.users_id', $userid)
            ->select('access_name.name')
            ->get();

        if (!$access->where('name', 'Role-Delete')->count() > 0) {
            return view('errors.403');
        }

        $id = $request->id;
        DB::table('access_role')->where('group_id', $id)->delete();
        DB::table('access_role_group')->where('group_id', $id)->delete();
        Alert::success('Berhasil Menghapus data', 'Berhasil !');
        return Redirect::back();
    }

}

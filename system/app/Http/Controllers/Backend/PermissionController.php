<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Alert;
use Redirect;
use Illuminate\Support\Facades\Input;

class PermissionController extends Controller
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
    $rowpage = Input::get('rowpage');
    if ($rowpage == null) {
      $rowpage = 10;
    }

    if ($cari == null) {
        $query = DB::table('access_name')->orderBy('access_id', 'desc')->paginate($rowpage);
      } else {
        $query = DB::table('access_name')->where('display_name', 'LIKE', '%' . $cari . '%')->orwhere('name', 'LIKE', '%' . $cari . '%')->orderBy('access_id', 'desc')->paginate($rowpage);
      }
      $query->appends(['search' => $cari, 'rowpage' => $rowpage]);

      
          return view('backend.permission.index',compact('rusun','Rusun_Id'))
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
  
          if (!$access->where('name', 'Permission-Add')->count() > 0) {
              return view('errors.403');
          }
  
         $display = $req->display_name;
         $access_name = $req->access_name;
         $description = $req->description;
         $rules =  [
                      'display_name' => 'required',
                      'access_name' => 'required',
                  ];
          $customMessages = [
              'display_name.required' => 'Display Name Tidak Boleh Kosong',
              'access_name.required' => 'Access Name Tidak Boleh Kosong'
          ];
         $this->validate($req,$rules,$customMessages);
  
      //    View
         $data = [
          'display_name' => $display.' View',
          'name' => $access_name.'-View',
          'description' => $description,
          'created_by' => Auth::user()->name,
          'created_date' => date('Y-m-d H:i:s')
         ];
  
      //    Proses
     $view = DB::table('access_name')->insert($data);
     if($view){
      $data2 = [
          'display_name' => $display.' Add',
          'name' => $access_name.'-Add',
          'description' => $description,
          'created_by' => Auth::user()->name,
          'created_date' => date('Y-m-d H:i:s')
         ];
  
      //    Proses
     $add = DB::table('access_name')->insert($data2);
      if($add){
          $data3 = [
              'display_name' => $display.' Edit',
              'name' => $access_name.'-Edit',
              'description' => $description,
              'created_by' => Auth::user()->name,
              'created_date' => date('Y-m-d H:i:s')
          ];
  
          //    Proses
      $edit = DB::table('access_name')->insert($data3);
      if($edit){
          $data4 = [
              'display_name' => $display.' Delete',
              'name' => $access_name.'-Delete',
              'description' => $description,
              'created_by' => Auth::user()->name,
              'created_date' => date('Y-m-d H:i:s')
             ];
      
          //    Proses
          DB::table('access_name')->insert($data4);
         }
      }
     }
     
  
      Alert::success('Menambahkan Permission','Berhasil');
      return redirect('permission');
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

        if (!$access->where('name', 'Permission-Edit')->count() > 0) {
            return view('errors.403');
        }

        $display = $req->display_name;
       $access_name = $req->access_name;
       $description = $req->description;
       $id = $req->id;

        $data = [
            'display_name' => $display,
            'name' => $access_name,
            'description' => $description,
            'modified_by' => Auth::user()->name,
            'modified_date' => date('Y-m-d H:i:s')
           ];




        DB::table('access_name')
        ->where('access_id', $id)
        ->update($data);
        Alert::success('Mengubah Permission','Berhasil');
    return redirect('permission');
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

        if (!$access->where('name', 'Permission-Delete')->count() > 0) {
            return view('errors.403');
        }

        DB::table('access_name')->where('access_id', $req->id)->delete();
        Alert::success('Terimakasih Anda Berhasil Menghapus Permission','Berhasil');
         return Redirect::back();
    }
}

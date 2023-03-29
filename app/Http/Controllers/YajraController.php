<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Logfile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class YajraController extends Controller
{

    public function ajax(Request $request){
        if($request->ajax()){
            $u=Logfile::query();

            return DataTables::of($u)
//                ->addColumn('action', function($admin) {
//                    return'<a href="'.route('users.edit', $admin->id).'" class="btn btn-primary">Edit</a>';
//                })
//                ->rawColumns(["action"])

                ->editColumn('status', function ($row) {
//                    return $row->status ? 'active' : 'inactive';
                  if($row->status==1){
                      return 'active';
                  }else{
                      return 'inactive';
                  }

                })
                ->make(true);

        }
        return view('homepage');
    }
}


//$query=Admin::query();
//
//$query->where('first_name', '=', 'Hasin');
//
//
//return DataTables::of($query)->make(true);

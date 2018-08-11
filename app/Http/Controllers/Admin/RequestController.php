<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\RequestSparepart;
use App\User;
use App\Sparepart;

class RequestController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        
        $datas = DB::table('request_spareparts')
        ->leftJoin('users', 'users.nik', '=', 'request_spareparts.nik')
        ->select('request_spareparts.no_request', 'users.name', 'request_spareparts.status', 'request_spareparts.status_request','request_spareparts.id')
        ->groupBy('request_spareparts.no_request')
        ->get();
        return view('admin.request.index', compact('datas'));
    }

    public function edit($id)
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }

        $request_spareparts = DB::table('request_spareparts')
        ->leftJoin('users', 'users.nik', '=', 'request_spareparts.nik')
        ->leftJoin('mesins', 'mesins.id', '=', 'request_spareparts.mesin_id')
        ->select('request_spareparts.no_request', 'request_spareparts.jumlah', 'request_spareparts.date as tgl', 'users.name', 'users.nik', 'mesins.nama', 'request_spareparts.status', 'request_spareparts.status_request','request_spareparts.id')
        ->where('request_spareparts.id','=',$id)
        ->first();

        $listSpareparts = DB::table('spareparts')
        ->leftJoin('request_spareparts', 'request_spareparts.kode_part', '=', 'spareparts.kode_part')
        ->select('spareparts.kode_part', 'spareparts.nama_part','request_spareparts.jumlah')
        ->where('request_spareparts.no_request','=',$request_spareparts->no_request)
        ->get();
        
        return view('admin.request.edit', compact('spareparts','request_spareparts','listSpareparts'));
    }

    public function update($id, Request $request){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $data = RequestSparepart::where('no_request', $id)->get();
        DB::table('request_spareparts')
        ->where('no_request', $data[0]['no_request'])
        ->update(['status' => $request->get('status')]);

        if($request->get('status') == 'Accept'){
            for ($i=0; $i < count($data); $i++) {
                $getPart = Sparepart::where('kode_part', $data[$i]['kode_part'])->first();
                $getPart->stok = $getPart->stok - $data[$i]['jumlah'];
                $getPart->save();
            }
        } 

        alert()->success('Updated','Successfully');
        return redirect('/admin/request');
    }

    public function print($id){
        // $request_spareparts = RequestSparepart::where('id','=',$id)->first();
        $request_spareparts = DB::table('request_spareparts')
        ->leftJoin('users', 'users.nik', '=', 'request_spareparts.nik')
        ->leftJoin('mesins', 'mesins.id', '=', 'request_spareparts.mesin_id')
        ->select('request_spareparts.no_request', 'request_spareparts.date as tgl', 'users.name', 'users.nik', 'mesins.nama', 'request_spareparts.status', 'request_spareparts.status_request','request_spareparts.id')
        ->where('request_spareparts.id','=',$id)
        ->first();

        $listSpareparts = DB::table('spareparts')
        ->leftJoin('request_spareparts', 'request_spareparts.kode_part', '=', 'spareparts.kode_part')
        ->select('spareparts.kode_part', 'spareparts.nama_part','request_spareparts.jumlah')
        ->where('request_spareparts.no_request','=',$request_spareparts->no_request)
        ->get();
        // dd($listSpareparts);
        return view('admin.request.print', compact('request_spareparts','listSpareparts'));
    }

}

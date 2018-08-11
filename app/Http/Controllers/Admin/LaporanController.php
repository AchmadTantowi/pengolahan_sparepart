<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RequestSparepart;
use Auth;
use DB;

class LaporanController extends Controller
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
        return view('admin.laporan.index');
    }

    public function print(Request $request){
        $from = $request->get('start_date');
        $to = $request->get('end_date');
        $reports = DB::table('request_spareparts')
        ->leftJoin('users', 'users.nik', '=', 'request_spareparts.nik')
        ->leftJoin('mesins', 'mesins.id', '=', 'request_spareparts.mesin_id')
        ->select('request_spareparts.no_request','request_spareparts.status_request', 'users.name as nama_karyawan', 'mesins.nama as nama_mesin')
        ->whereBetween('date', [$from, $to])
        ->groupBy('request_spareparts.no_request')
        ->get();

        // $reports = RequestSparepart::whereBetween('date', [$from, $to])->get();
        return view('admin.laporan.print', compact('reports'));
    }

    

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\RequestSparepart;
use DB;

class HistoryPeminjamanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role != "mekanik"){
            abort(404);
        }
        $lists = RequestSparepart::where('nik', Auth::user()->nik)
        ->groupBy('no_request')
        ->get();
        return view('admin.history_peminjaman.index', compact('lists'));
    }

    public function lihatPeminjaman($id)
    {
        if(Auth::user()->role != "mekanik"){
            abort(404);
        }

        $request_spareparts = DB::table('request_spareparts')
        ->leftJoin('users', 'users.nik', '=', 'request_spareparts.nik')
        ->leftJoin('mesins', 'mesins.id', '=', 'request_spareparts.mesin_id')
        ->select('request_spareparts.no_request', 'request_spareparts.jumlah', 'request_spareparts.date as tgl', 'users.name', 'users.nik', 'mesins.nama', 'request_spareparts.status', 'request_spareparts.status_request','request_spareparts.id')
        ->where('users.nik','=',Auth::user()->nik)
        ->where('request_spareparts.id','=',$id)
        ->first();

        $listSpareparts = DB::table('spareparts')
        ->leftJoin('request_spareparts', 'request_spareparts.kode_part', '=', 'spareparts.kode_part')
        ->select('spareparts.kode_part', 'spareparts.nama_part','request_spareparts.jumlah')
        ->where('request_spareparts.no_request','=',$request_spareparts->no_request)
        ->get();
        
        return view('admin.history_peminjaman.lihat', compact('spareparts','request_spareparts','listSpareparts'));
    }

    

}

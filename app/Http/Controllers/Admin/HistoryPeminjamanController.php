<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\RequestSparepart;

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

    

}

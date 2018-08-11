<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\RequestSparepart;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role == "mekanik"){
            $jumlahRequest = RequestSparepart::where('nik', Auth::user()->nik)->count();
            $jumlahRequestAccept = RequestSparepart::where('nik', Auth::user()->nik)->where('status', 'Accept')->count();
            $jumlahRequestAwaiting = RequestSparepart::where('nik', Auth::user()->nik)->where('status', 'Awaiting')->count();
            $jumlahRequestCancel = RequestSparepart::where('nik', Auth::user()->nik)->where('status', 'Canceled')->count();
        } else {
            $jumlahRequest = RequestSparepart::count();
            $jumlahRequestAccept = RequestSparepart::where('status', 'Accept')->count();
            $jumlahRequestAwaiting = RequestSparepart::where('status', 'Awaiting')->count();
            $jumlahRequestCancel = RequestSparepart::where('status', 'Canceled')->count();
        }

        return view('admin.dashboard.index', compact('jumlahRequest', 'jumlahRequestAccept', 'jumlahRequestAwaiting', 'jumlahRequestCancel'));
    }

    

}

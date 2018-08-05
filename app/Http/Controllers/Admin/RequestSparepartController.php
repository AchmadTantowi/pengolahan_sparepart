<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Sparepart;
use App\Mesin;
use App\RequestSparepart;

class RequestSparepartController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNextRequestNumber()
    {
        $format = 'REQ-';
        $lastRequest = RequestSparepart::orderBy('created_at', 'desc')->first();
        if (!$lastRequest)
            $number = 0;
        else 
            $number = substr($lastRequest->no_request, 4);
            // dd($number);
        return $format . sprintf('%05d', intval($number) + 1);
    }

    public function index()
    {
        if(Auth::user()->role != "mekanik"){
            abort(404);
        }
        
        $parts = Sparepart::get();
        $mesins = Mesin::get();
        $no_request = $this->getNextRequestNumber();
        return view('admin.request_sparepart.index', compact('parts', 'mesins', 'no_request'));
    }

    public function simpan(Request $request){
        if($request->ajax()){
            $kode_part = $request->kode_part;
            for($i = 0;$i < count($kode_part);$i++){
                $workOrder = RequestSparepart::create([
                    'no_request' => $request->no_request,
                    'nik' => Auth::user()->nik,
                    'kode_part' => $kode_part[$i],
                    'mesin_id' => $request->kode_mesin,
                    'status_request' => $request->status_request,
                    'jumlah' => $request->jumlah_barang[$i],
                    'status' => 'Awaiting',
                    'date' => date('Y-m-d')
                ]);
            }

    		return response()->json(['return'=>'ok']);
    	}
    }

   

}

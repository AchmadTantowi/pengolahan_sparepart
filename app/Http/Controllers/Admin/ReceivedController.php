<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\ReceivedPart;
use App\Supplier;
use App\Sparepart;
use DB;

class ReceivedController extends Controller
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
        // $datas = ReceivedPart::get();
        $datas = DB::table('received_parts')
        ->leftJoin('suppliers', 'received_parts.supplier_id', '=', 'suppliers.id')
        ->leftJoin('spareparts', 'received_parts.kode_part', '=', 'spareparts.kode_part')
        ->select('received_parts.id','received_parts.no_invoice', 'spareparts.nama_part', 'suppliers.nama', 'received_parts.jml_barang')
        ->groupBy('received_parts.no_invoice')
        ->get();

        return view('admin.received.index', compact('datas'));
    }

    public function getNextInvoiceNumber()
    {
        $date = date('Ymd');
        $format = 'INV-';
        $lastOrder = ReceivedPart::orderBy('created_at', 'desc')->first();
        if (!$lastOrder)
            $number = 0;
        else 
            $number = substr($lastOrder->no_invoice, 4);
            // dd($number);
        return $format . sprintf('%03d', intval($number) + 1);
    }

    public function add()
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        
        $no_invoice = $this->getNextInvoiceNumber();
        $parts = Sparepart::get();
        $suppliers = Supplier::get();
        return view('admin.received.add', compact('no_invoice','parts','suppliers'));
    }

    public function save(Request $request){
        if($request->ajax()){
            $kode_part = $request->kode_part;
            for($i = 0;$i < count($kode_part);$i++){
                $received = ReceivedPart::create([
                    'no_invoice' => $request->no_invoice,
                    'kode_part' => $kode_part[$i],
                    'supplier_id' => $request->supplier,
                    'jml_barang' => $request->jumlah_barang[$i]
                ]);

                $getPart = Sparepart::where('kode_part', $kode_part[$i])->first();
                $getPart->stok = $getPart->stok + $request->jumlah_barang[$i];
                $getPart->save();
            }

    		return response()->json(['return'=>'ok']);
    	}
    }

    public function print($id){
        // $request_spareparts = RequestSparepart::where('id','=',$id)->first();
        $received_spareparts = DB::table('received_parts')
        ->leftJoin('suppliers', 'suppliers.id', '=', 'received_parts.supplier_id')
        ->select('received_parts.no_invoice', 'suppliers.nama as nama_supplier', 'received_parts.created_at as tgl_terima')
        ->where('received_parts.id','=',$id)
        ->first();

        $listSpareparts = DB::table('spareparts')
        ->leftJoin('received_parts', 'received_parts.kode_part', '=', 'spareparts.kode_part')
        ->select('spareparts.kode_part', 'spareparts.nama_part')
        ->where('received_parts.no_invoice','=',$received_spareparts->no_invoice)
        ->get();
        // dd($listSpareparts);
        return view('admin.received.print', compact('received_spareparts', 'listSpareparts'));
    }

}

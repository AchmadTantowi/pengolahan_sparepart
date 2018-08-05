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
        ->select('received_parts.no_invoice', 'spareparts.nama_part', 'suppliers.nama', 'received_parts.jml_barang')
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
        $this->validate($request, [
            'kode_part' => 'required',
            'supplier' => 'required',
            'jumlah_barang' => 'required',
        ]);

        $received = ReceivedPart::create([
            'no_invoice' => $request->get('no_invoice'),
            'kode_part' => $request->get('kode_part'),
            'supplier_id' => $request->get('supplier'),
            'jml_barang' => $request->get('jumlah_barang')
          ]);
        if($received){
            alert()->success('Success','Saved');
            return redirect('/admin/received');
        }
    }

   

}

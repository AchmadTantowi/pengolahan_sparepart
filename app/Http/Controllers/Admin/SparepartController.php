<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Sparepart;

class SparepartController extends Controller
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
        $spareparts = Sparepart::get();
        return view('admin.sparepart.index', compact('spareparts'));
    }

    public function getNextPartNumber()
    {
        $date = date('Ymd');
        $format = 'PRT-';
        $lastPart = Sparepart::orderBy('created_at', 'desc')->first();
        if (!$lastPart)
            $number = 0;
        else 
            $number = substr($lastPart->kode_part, 4);
            // dd($number);
        return $format . sprintf('%03d', intval($number) + 1);
    }

    public function add()
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        return view('admin.sparepart.add');
    }

    public function save(Request $request){
        $this->validate($request, [
            // 'kode_part' => 'required|unique:spareparts',
            'nama_part' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        $sparepart = Sparepart::create([
            'kode_part' => $this->getNextPartNumber(),
            'nama_part' => $request->get('nama_part'),
            'stok' => $request->get('stok'),
            'harga' => $request->get('harga')
          ]);
        if($sparepart){
            alert()->success('Success','Saved');
            return redirect('/admin/sparepart');
        }
    }

    public function edit($id)
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $sparepart = Sparepart::where('id', $id)->first();
        
        return view('admin.sparepart.edit', compact('sparepart'));
    }

    public function update($id, Request $request){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        // dd($id);
        $data = Sparepart::find($id);
        $data->nama_part = $request->get('nama_part');
        $data->stok = $request->get('stok');
        $data->harga = $request->get('harga');
       
        $data->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/sparepart');
    }

    public function delete($id){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $data = Sparepart::find($id);
        $data->delete();
        if($data){
            alert()->success('Deleted','Successfully');
            return redirect('/admin/sparepart');
        }
    }

}

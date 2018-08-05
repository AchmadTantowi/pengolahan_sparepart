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

    public function add()
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        return view('admin.sparepart.add');
    }

    public function save(Request $request){
        $this->validate($request, [
            'kode_part' => 'required|unique:spareparts',
            'nama_part' => 'required',
            'stok' => 'required',
            'harga' => 'required'
        ]);

        $sparepart = Sparepart::create([
            'kode_part' => $request->get('kode_part'),
            'nama_part' => $request->get('nama_part'),
            'stok' => $request->get('stok'),
            'harga' => $request->get('harga')
          ]);
        if($sparepart){
            alert()->success('Success','Saved');
            return redirect('/admin/sparepart');
        }
    }

}

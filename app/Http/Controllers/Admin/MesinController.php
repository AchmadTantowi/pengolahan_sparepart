<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Mesin;

class MesinController extends Controller
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
        $mesins = Mesin::get();
        return view('admin.mesin.index', compact('mesins'));
    }

    public function add()
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        return view('admin.mesin.add');
    }

    public function save(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        $mesin = Mesin::create([
            'nama' => $request->get('nama'),
            'keterangan' => $request->get('keterangan')
          ]);
        if($mesin){
            alert()->success('Success','Saved');
            return redirect('/admin/mesin');
        }
    }

}

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

    public function edit($id)
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $mesin = Mesin::where('id', $id)->first();
        
        return view('admin.mesin.edit', compact('mesin'));
    }

    public function update($id, Request $request){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        // dd($id);
        $data = Mesin::find($id);
        $data->nama = $request->get('nama');
        $data->keterangan = $request->get('keterangan');
       
        $data->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/mesin');
    }

    public function delete($id){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $data = Mesin::find($id);
        $data->delete();
        if($data){
            alert()->success('Deleted','Successfully');
            return redirect('/admin/mesin');
        }
    }

}

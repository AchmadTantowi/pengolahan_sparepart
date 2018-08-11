<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Supplier;

class SupplierController extends Controller
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
        $suppliers = Supplier::get();
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function add()
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        return view('admin.supplier.add');
    }

    public function save(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $supplier = Supplier::create([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
            'telepon' => $request->get('telepon')
          ]);
        if($supplier){
            alert()->success('Success','Saved');
            return redirect('/admin/supplier');
        }
    }

    public function edit($id)
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $supplier = Supplier::where('id', $id)->first();
        
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update($id, Request $request){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        // dd($id);
        $data = Supplier::find($id);
        $data->nama = $request->get('nama');
        $data->alamat = $request->get('alamat');
        $data->telepon = $request->get('telepon');
       
        $data->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/supplier');
    }

    public function delete($id){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $data = Supplier::find($id);
        $data->delete();
        if($data){
            alert()->success('Deleted','Successfully');
            return redirect('/admin/supplier');
        }
    }

}

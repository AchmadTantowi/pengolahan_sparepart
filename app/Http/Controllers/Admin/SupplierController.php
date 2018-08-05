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

}

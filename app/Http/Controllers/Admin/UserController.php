<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
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
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function add()
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        return view('admin.user.add');
    }

    public function save(Request $request){
        $this->validate($request, [
            'nik' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'nik' => $request->get('nik'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'divisi' => 'mekanik',
            'role' => 'mekanik'
          ]);
        if($user){
            alert()->success('Success','Saved');
            return redirect('/admin/user');
        }
    }

    public function edit($id)
    {
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $users = User::where('id', $id)->first();
        
        return view('admin.user.edit', compact('users'));
    }

    public function update($id, Request $request){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        // dd($id);
        $data = User::find($id);
        $data->nik = $request->get('nik');
        $data->name = $request->get('name');
        $data->email = $request->get('email');
       
        $data->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/user');
    }

    public function delete($id){
        if(Auth::user()->role != "admin"){
            abort(404);
        }
        $user = User::find($id);
        $user->delete();
        if($user){
            alert()->success('Deleted','Successfully');
            return redirect('/admin/user');
        }
    }

}

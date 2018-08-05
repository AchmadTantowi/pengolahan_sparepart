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
            'password' => 'required',
            'divisi' => 'required'
        ]);

        $user = User::create([
            'nik' => $request->get('nik'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'divisi' => $request->get('divisi'),
            'role' => 'mekanik'
          ]);
        if($user){
            alert()->success('Success','Saved');
            return redirect('/admin/user');
        }
    }

}

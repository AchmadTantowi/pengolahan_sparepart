<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // if(Auth::user()->role != "admin"){
        //     abort(404);
        // }
        return view('admin.dashboard.index');
    }

    

}

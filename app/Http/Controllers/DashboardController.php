<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Role;
use Auth;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role->name == 'Admin'){
            return redirect()->route('admin.index');
        }

        return view('dashboard.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\Role;
use Auth;
use App\Cart;


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

        $user = User::find(Auth::user()->id);
        $cart = Cart::where('user_id', $user->id)->get();

        return view('dashboard.index')->withCart($cart);
    }
}

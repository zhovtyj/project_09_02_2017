<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserInfo;
use Auth;
use Session;

class RegisterStep2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.register2');
    }

    public function store(Request $request){
        $this->validate($request, array(
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'company'         => 'max:255',
            'phone'           => 'max:255',
            'country'         => 'required|max:255',
            'address1'        => 'required|max:255',
            'address2'        => 'max:255',
            'city'            => 'required|max:255',
            'state'           => 'max:255',
            'postcode'        => 'required|max:255',
        ));

        $user = User::find(Auth::user()->id);

        $userInfo = New UserInfo;

        $userInfo->user()->associate($user);
        $userInfo->first_name = $request->first_name;
        $userInfo->last_name = $request->last_name;
        $userInfo->company = $request->company;
        $userInfo->phone = $request->phone;
        $userInfo->country = $request->country;
        $userInfo->address1 = $request->address1;
        $userInfo->address2 = $request->address2;
        $userInfo->city = $request->city;
        $userInfo->state = $request->state;
        $userInfo->postcode = $request->postcode;

        $userInfo->save();

        Session::flash('success', 'Information stored successfully.');

        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Auth;
use App\User;
use App\Cart;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(100);
        return view('service.index')->withServices($services)->withCart($this->cart());
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('service.show')->withService($service)->withCart($this->cart());
    }

    private function cart(){
        $user = User::find(Auth::user()->id);
        $cart = Cart::where('user_id', $user->id)->get();
        return($cart);
    }
}

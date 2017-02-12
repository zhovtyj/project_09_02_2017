<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Service;
use Auth;

class CartController extends Controller
{
    public function addToCartAjax(Request $request){

        $user = User::find(Auth::user()->id);
        $service = Service::find($request->id);
        $cart = New Cart;

        $cart->user()->associate($user);
        $cart->service()->associate($service);
        $cart->price = $service->price;
        $cart->count = 1;

        $cart->save();

        return($service->name.' added to cart');
    }
}

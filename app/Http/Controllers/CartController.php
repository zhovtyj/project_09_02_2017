<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Service;
use Auth;
use Session;

class CartController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $cart = Cart::where('user_id', $user->id)->get();
        return view('cart.index')->withCart($cart);
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        Session::flash('success', 'Service was deleted from the cart!');

        return redirect()->route('cart.index');
    }
    public function addToCartAjax(Request $request){

        $user = User::find(Auth::user()->id);
        $service = Service::find($request->id);
        $cart = New Cart;

        $cart->user()->associate($user);
        $cart->service()->associate($service);
        $cart->price = $service->price;
        $cart->count = 1;

        $cart->save();

        return($service);
    }
}

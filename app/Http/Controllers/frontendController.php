<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class frontendController extends Controller
{
    public function toDetails($id)
    {
    	return view('frontend.itemDetail');
    }

    public function addToCart(Request $request)
    {
    	Cart::add(['id' => '1', 'name' => 'product_name', 'qty' => 1, 'price' => 20000]);

    	return redirect()->back()->with('message', 'Your Food has successfully added!!!');
    }

    public function cartList()
    {
    	$carts = Cart::content();

    	return view('frontend.cartList')->with('carts', $carts);
    }

    public function removeCart($rowId)
    {
    	Cart::remove($rowId);

    	return redirect()->back()->with('message', 'Your Food has successfully deleted!!!');
    }

    public function checkoutCart()
    {
    	Cart::destroy();

    	return redirect()->route('frontend.home');
    }

    public function updateCart(Request $request)
    {
        $cart = Cart::get($request->rowId);
        $qty = $cart->qty + $request->qty;
        Cart::update($request->rowId, $qty);

        $carts = Cart::content();
        $total = Cart::total();
        
        return response([
            'message' => 'Your Food has successfully updated!!!',
            'carts' => $carts,
            'total' => $total
        ], 200);
    }
}

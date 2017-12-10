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

    	$cart = Cart::content();

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

    	return redirect()->back()->with('message', 'Your Food has successfully Deleted!!!');
    }

    public function checkoutCart()
    {
    	Cart::destroy();

    	return redirect()->route('frontend.home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Menu;
use App\Models\Food;

class frontendController extends Controller
{
    public function toDetails($id)
    {
        $menu = Menu::findOrFail($id);
        $suggest = Menu::get()->except(['id' => $id]);
    	return view('frontend.itemDetail')->with('menu', $menu)->with('suggests', $suggest);
    }

    public function addToCart(Request $request)
    {
        $menu = Menu::findOrFail($request->product_id);
        Cart::add([
            'id' => $menu->id,
            'name' => $menu->name,
            'price' => $menu->price,
            'qty' => 1,
            'options' => ['cover' => $menu->cover]
        ]);

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

    public function toCustom()
    {
        $rice = Food::where('category_id', '=', '1')->get();
        $beefs = Food::where('category_id', '=', '2')->get();
        $chickens = Food::where('category_id', '=', '3')->get();
        $seafoods = Food::where('category_id', '=', '4')->get();
        $veges = Food::where('category_id', '=', '5')->get();
        $sides = Food::where('category_id', '=', '6')->get();

        $custom = [
            "rices" => $rice,
            "beefs" => $beefs,
            "chickens" => $chickens,
            "seafoods" => $seafoods,
            "vegetables" => $veges,
            "side_dishes" => $sides,
        ];

        return view('frontend.custom')->with('custom', $custom);
    }

    public function storeCustom(Request $request)
    {
        dd($request->all());
    }
}

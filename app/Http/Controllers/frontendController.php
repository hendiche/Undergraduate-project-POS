<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Models\Menu;
use App\Models\Food;
use App\Models\Guest;
use App\Models\Purchase;
use App\Helpers\Enums\PurchaseType;
use App\Helpers\Enums\PurchaseStatus;

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
            'options' => [
                'cover' => $menu->cover,
                'type' => 'menu'
                ]
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
    	return view('frontend.checkout');
    }

    public function checkoutStore(Request $request)
    {
        $cart = Cart::content();
        $total = 0;
        foreach($cart as $item) {
            $total += ($item->price * $item->qty);
        }
        if (!Auth::check()) {
            $guest = new Guest();
            $guest->name = $request->name;
            $guest->phone = $request->phone;
            $guest->address = $request->address;
            $guest->save();
        }
        $purchase = new Purchase();
        $purchase->total = $total;
        $purchase->number = $this->generateRandomString();
        $purchase->status = PurchaseStatus::getString(0);
        if (Auth::check()) {
            $purchase->type = PurchaseType::getString(0);
            $purchase->user_id = Auth::id();
        } else {
            $purchase->type = PurchaseType::getString(1);
            $purchase->guest_id = $guest->id;
        }
        if ($purchase->save()) {
            foreach($cart as $item) {
                if ($item->options->type == 'menu') {
                    $purchase->menus()->attach($item->id, ['quantity' => $item->qty, 'subtotal' => ($item->price * $item->qty)]);
                } else if ($item->options->type == 'custom') {

                }
            }
            Cart::destroy();
            return redirect()->route('frontend.home');
        }
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

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
    }
}

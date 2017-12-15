<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Models\Menu;
use App\Models\Food;
use App\Models\Guest;
use App\Models\Purchase;
use App\Models\Custom;
use App\Helpers\Enums\PurchaseType;
use App\Helpers\Enums\PurchaseStatus;
use Illuminate\Support\Facades\Validator;

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
        if (!Auth::check()) {
            Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required'
            ])->validate();
            $guest = new Guest();
            $guest->name = $request->name;
            $guest->phone = $request->phone;
            $guest->address = $request->address;
            $guest->save();
        }
        $cart = Cart::content();
        $total = 0;
        foreach($cart as $item) {
            $total += ($item->price * $item->qty);
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
                    $purchase->customs()->attach($item->id, ['quantity' => $item->qty, 'subtotal' => ($item->price * $item->qty)]);
                }
            }
            Cart::destroy();
            return redirect()->route('frontend.history.detail', ['id' => $purchase->id])
                ->with('message', 'Your purchase has successfully!!!, Our admin will process it.');
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

    public function toHistory()
    {
        $purchases = Purchase::where('type', '=', PurchaseType::getString(0))
            ->where('user_id', '=', Auth::id())
            ->get();
        return view('frontend.history')->with('histories', $purchases);
    }

    public function historyDetail($historyId) 
    {
        $purchase = Purchase::findOrFail($historyId);

        return view('frontend.historyDetail')->with('detail', $purchase);
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
        $total = 0;
        foreach($request->foods as $item) {
            if ((int)$item['qty'] > 0) {
                $food = Food::findOrFail($item['value']);
                $subtotal = (int)$item['qty'] * $food->price;
                $total += $subtotal;
            }
        }
        if ($total == 0) {
            return back()->withInput()->with('error', 'Please add some quantity to your food!!!');
        }
        $custom = new Custom();
        $custom->total = $total;
        if ($custom->save()) {
            foreach($request->foods as $item) {
                if ((int)$item['qty'] > 0) {
                    $food = Food::findOrFail($item['value']);
                    $custom->foods()->attach($item['value'], ['quantity' => $item['qty'], 'subtotal' => ((int)$item['qty'] * $food->price)]);
                }
            }
        }

        Cart::add([
            'id' => $custom->id,
            'name' => 'Custom Menu',
            'price' => $custom->total,
            'qty' => 1,
            'options' => [
                'cover' => 'no_img_custom.jpg',
                'type' => 'custom'
                ]
        ]);

        return redirect()->route('frontend.menu')->with('message', 'Your Custom Menu has successfully added to your cart!!!');
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

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Money\Money;

class CartController extends Controller
{
    public function store(Request $request){
        $product = Product::findOrFail($request->product_id);
        Cart::add($request->product_id, $product->title, $request->quantity, Money::EUR($product->price));

        return redirect()->back()->with('msg','Added');
    }

    public function all(){
        $carts = Cart::content();
        return view('test', compact('carts'));
    }

    public function update(Request $request){
        $rowId = $request->row_id;
        $quantity = $request->quantity;
        Cart::update($rowId, $quantity);
        return redirect()->back()->with('msg','Cart Updated!!');
    }

    public function remove(Request $request){
        Cart::remove($request->row_id);
        return redirect()->back()->with('msg','Cart Removed!!');
    }

    public function view(){

    }
}

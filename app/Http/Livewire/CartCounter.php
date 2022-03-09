<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_counter' => 'render'];
    public function render()
    {
        $cartCounter = Cart::content()->count();
        return view('livewire.cart-counter', compact('cartCounter'));
    }
}

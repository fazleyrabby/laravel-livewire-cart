<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartsTable extends Component
{
    protected $listeners = ['cart_table' => 'refreshCartData'];

    public $carts;
    public $updatedQty = [];

    public function mount(){
       $this->setData();
    }

    public function refreshCartData(){
        $this->setData();
    }

    public function render()
    {
        return view('livewire.carts-table');
    }

    public function update($rowId){
        Cart::update($rowId, $this->updatedQty[$rowId]);
        $this->emit('cart_counter');
        $this->emit('cart_table');
        $this->emit('cart_qty');
        
        $this->emit('updated', [
            'msg' => 'Cart Updated!',
            'type' => 'success'
        ]);
    }

    public function remove($rowId){
        Cart::remove($rowId);
        $this->emit('cart_counter');
        $this->emit('cart_table');
        $this->emit('updated', [
            'msg' => 'Item Removed from Cart!',
            'type' => 'danger'
        ]);
    }

    public function setData(){
        $this->carts = Cart::content()->toArray();
        
        foreach($this->carts as $cart){
            $this->updatedQty[$cart['rowId']] = $cart['qty'];
        }
    }
}

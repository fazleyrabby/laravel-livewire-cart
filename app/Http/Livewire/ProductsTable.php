<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Money\Money;
use Cart;

class ProductsTable extends Component
{
    public $products;
    public array $quantity = [];
   

    public function mount(){
        $this->products = Product::all();
        foreach($this->products as $product){
            $this->quantity[$product->id] = 1;
        }
    }

    public function hydrated(){
        dd(session('msg'));
    }

    public function render()
    {
        return view('livewire.products-table');
    }

    public function addToCart($product_id){
        $product = Product::findOrFail($product_id);
        Cart::add($product_id, $product->title, $this->quantity[$product_id], Money::EUR($product->price));
        $this->emit('cart_counter');
        $this->emit('cart_table');
        $this->emit('cart_qty');
        // $this->dispatchBrowserEvent('updated', [
        //     'msg' => 'New product added to cart!',
        //     'type' => 'success'
        // ]);

        $this->emit('updated', [
            'msg' => 'New product added to cart!',
            'type' => 'success'
        ]);
    }

    public function clearAllCart()
    {
        Cart::destroy();
        $this->emit('cart_counter');
        $this->emit('cart_table');
        $this->emit('cart_qty');
        
        $this->emit('updated',[
            'msg' => 'All Item Cart Clear Successfully !',
            'type' => 'danger'
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];

    public function render()
    {
        return view('livewire.cart');
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        $this->cart[] = ['id' => $product->id, 'name' => $product->name, 'price' => $product->price];
    }
}

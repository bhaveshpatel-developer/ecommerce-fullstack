<?php

namespace App\Livewire;

use Livewire\Component;

class Checkout extends Component
{
    public $customer_name, $email, $quantity, $product_id;

    public function render()
    {
        return view('livewire.checkout');
    }

    public function placeOrder()
    {
        Order::create([
            'customer_name' => $this->customer_name,
            'email' => $this->email,
            'quantity' => $this->quantity,
            'product_id' => $this->product_id,
        ]);
        session()->flash('success', 'Order placed successfully!');
    }
}

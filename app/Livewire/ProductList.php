<?php

namespace App\Livewire;

use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        return  view('livewire.product-list', [
            'products' => Product::when($this->category_id, function ($query) {
            return $query->whereHas('categories', function ($q) {
                $q->where('id', $this->category_id);
            });
        })->paginate(9),
        ]);
    }
}

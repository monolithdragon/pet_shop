<?php

namespace App\Http\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(12);
        
        return view('pages.shop', [
            'products' => $products
        ]);
    }
}

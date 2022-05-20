<?php

namespace App\Http\Components;

use App\Models\Product;
use Livewire\Component;

class PopularProducts extends Component
{
    public function render()
    {
        $products = Product::inRandomOrder()->limit(4)->get();

        return view('pages.popular-products', [
            'products' => $products
        ]);
    }
}

<?php

namespace App\Http\Components;

use Livewire\Component;
use App\Models\Product;

class ProductDetails extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        $related_products = Product::where('category_id', $this->product->category_id)->inRandomOrder()->limit(5)->get();
        return view('pages.product-details', [
            'product' => $this->product,
            'related_products' => $related_products
        ]);
    }
}

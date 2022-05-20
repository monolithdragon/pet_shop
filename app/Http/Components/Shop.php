<?php

namespace App\Http\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

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

    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        Session::flash('success_message', 'Item added to cart');
        return redirect()->route('petzone.cart');
    }
}

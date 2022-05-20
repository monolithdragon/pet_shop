<?php

namespace App\Http\Components;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class ShoppingCart extends Component
{
    public function render()
    {
        return view('pages.shopping-cart');
    }

    public function incrementQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1; 
        if ($qty > $product->model->quantity)
            $qty = $product->model->quantity;
        Cart::update($rowId, $qty);
    }

    public function decrementQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1; 
        if ($qty < 1)
            $qty = 1;
        Cart::update($rowId, $qty);
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Session::flash('success_message', 'Item has been removed');
    }

    public function destroyAll()
    {
        Cart::destroy();
        Session::flash('success_message', 'All items have been removed');
    }


}

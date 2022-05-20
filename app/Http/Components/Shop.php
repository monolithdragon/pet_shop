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

    public $sorting;
    public $pageSize;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pageSize = 12;
    }
    
    public function render()
    {
        $products = $this->sorting();
        
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

    private function sorting()
    {
        switch ($this->sorting) {
            case 'popularity':
                # code...
                break;
            case 'rating':
                # code...
                break;
            case 'date':
                return Product::orderBy('created_at', 'DESC')->paginate($this->pageSize);
            case 'price':
                return Product::orderBy('price', 'ASC')->paginate($this->pageSize);
            case 'price-desc':
                return Product::orderBy('price', 'DESC')->paginate($this->pageSize);
            
            default:
                return Product::paginate($this->pageSize);
        }

        return [];
    }
}

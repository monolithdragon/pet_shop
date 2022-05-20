<?php

namespace App\Http\Components;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class Shop extends Component
{
    use WithPagination;

    public $sorting;
    public $pageSize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = 'default';
        $this->pageSize = 12;
        $this->category_slug = $category_slug;
    }
    
    public function render()
    {
        $products = $this->sorting();
        $categories = Category::all();
        $category_name = Category::where('slug', $this->category_slug)->first()->name;
        
        return view('pages.shop', [
            'products' => $products,
            'categories' => $categories,
            'category_name' => $category_name
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
        $category = Category::where('slug', $this->category_slug)->first();

        switch ($this->sorting) {
            case 'popularity':
                # code...
                break;
            case 'rating':
                # code...
                break;
            case 'date':
                return Product::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
            case 'price':
                return Product::where('category_id', $category->id)->orderBy('price', 'ASC')->paginate($this->pageSize);
            case 'price-desc':
                return Product::where('category_id', $category->id)->orderBy('price', 'DESC')->paginate($this->pageSize);
            
            default:
                return Product::where('category_id', $category->id)->paginate($this->pageSize);
        }

        return [];
    }
}

<?php

use App\Http\Components\About;
use App\Http\Components\Checkout;
use App\Http\Components\Contact;
use App\Http\Components\Home;
use App\Http\Components\Shop;
use App\Http\Components\ShoppingCart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class);
Route::get('/about', About::class);
Route::get('/contact', Contact::class);
Route::get('/shop', Shop::class)->name('pet_shop.shop');
Route::get('/cart', ShoppingCart::class)->name('pet_shop.cart');
Route::get('/checkout', Checkout::class)->name('pet_shop.checkout');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

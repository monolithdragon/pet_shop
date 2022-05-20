<?php

use App\Http\Components\About;
use App\Http\Components\Admin\AdminDashboard;
use App\Http\Components\Checkout;
use App\Http\Components\Contact;
use App\Http\Components\Home;
use App\Http\Components\ProductDetails;
use App\Http\Components\Shop;
use App\Http\Components\ShoppingCart;
use App\Http\Components\User\UserDashboard;
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
Route::get('/shop', Shop::class)->name('petzone.shop');
Route::get('/cart', ShoppingCart::class)->name('petzone.cart');
Route::get('/checkout', Checkout::class)->name('petzone.checkout');
Route::get('/product/{product}', ProductDetails::class)->name('product.details');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboard::class)->name('user.dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
});

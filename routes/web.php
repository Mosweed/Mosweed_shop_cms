<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PDFController;
use App\Livewire\CheckoutPages\Checkout;
use App\Livewire\CheckoutPages\Register;
use App\Livewire\OrderPages\OrderDetails;
use App\Livewire\OrderPages\OrderHistory;
use App\Livewire\ProductsPages\Productdetails;
use App\Livewire\ProductsPages\Products;
use App\Livewire\ShopCart\ShopCartItems;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/', Products::class)->name('products');

Route::get('/product/{id}', Productdetails::class)->name('product.show');

Route::get('shoppingcart', ShopCartItems::class)->name('cart');

Route::get('/checkout', Checkout::class)->name('checkout');

Route::get('/login_register', function () {
    return view('auth.login_register');
})->name('login_register');

Route::get('/checkout/register', Register::class)->name('checkout.register');
Route::get('/checkout/check/{id}', [CheckoutController::class, 'check'])->name('checkout check');

Route::get('/successfully_paid', function () {
    return view('successfully_paid');
})->name('successfully_paid');

Route::get('/successfully_placed', function () {
    return view('successfully_placed');
})->name('successfully_placed');

Route::get('viewpdf/{id}', [PDFController::class, 'viewpdf'])->name('viewpdf');

Route::middleware('auth')->group(function () {

    Route::get('/user/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::get('/orders', OrderHistory::class)->name('order-history');
    Route::get('/orders/{id}', OrderDetails::class)->name('order-details');

    Route::get('orders/pdf/{id}', [PDFController::class, 'index'])->name('pdf');
});

Route::post('/register', [RegisterController::class, 'create'])->name('register');

require __DIR__.'/errors.php';
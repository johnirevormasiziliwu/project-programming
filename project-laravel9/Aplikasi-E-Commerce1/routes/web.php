<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrasiController;
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

Route::get('/home', function() {
    return view('home.index');
});

Route::get('/', function () {
    return redirect(route('list_product'));
})->name('home');



Route::get('/products', [ProductController::class, 'index'])->name('list_product');



Route::middleware(['admin'])->group(function () {

    // Route untuk Products
    Route::get('/create', [ProductController::class, 'create'])->name('create_product');

    Route::post('/store', [ProductController::class, 'store'])->name('store_product');

    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit_product');

    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update_product');

    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('delete_product');
    // End to product
});



Route::middleware(['auth'])->group(function () {



    Route::get('/detail/{product}', [ProductController::class, 'show'])->name('show_product');

    // Route Cart 
    Route::get('/show_cart', [CartController::class, 'show_cart'])->name('show_cart');

    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');

    Route::put('/update_cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');

    Route::delete('/delete_cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
    // End Route Cart



    // Route Order
    Route::post('/order_checkout', [OrderController::class, 'checkout'])->name('checkout');

    Route::get('/order', [OrderController::class, 'index'])->name('list_order');

    Route::get('/show_order/{order}', [OrderController::class, 'show_order'])->name('show_order');

    Route::post('/sumbit_payment/{order}', [OrderController::class, 'sumbit_payment_receipt'])->name('sumbit_payment_order');

    Route::post('/confirm_payment/{order}', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
    // End Route Order



    // Route Profile
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile')->middleware('auth');

    Route::get('/edit', [ProfileController::class, 'edit_profile'])->name('edit_profile');

    Route::post('/update', [ProfileController::class, 'update_profile'])->name('update_profile');
    // End Profile

});


Route::middleware(['guest'])->group(function () {

    // Login user
    Route::get('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/login_verify', [LoginController::class, 'authenticate'])->name('login_verify');


    // Registrasi user
    Route::get('/register', [RegistrasiController::class, 'index'])->name('register')->middleware('guest');

    Route::post('/register_verify', [RegistrasiController::class, 'store'])->name('register_verify');
    // End Registrasi

});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// End Login
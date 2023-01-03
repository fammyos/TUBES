<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\cartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [GuestController::class, 'index'])->name('welcome');
Route::get('/all-product', [GuestController::class, 'indexProduct'])->name('product.guest');
Route::get('/detail-product/{id}', [GuestController::class, 'detailProduct'])->name('detail.product');

Route::get('/cart', [cartController::class, 'index'])->name('cart');
Route::post('/add-cart', [cartController::class, 'create'])->name('add.cart');
Route::post('/update-cart', [cartController::class, 'update'])->name('update.cart');
Route::get('/delete-cart/{id}', [cartController::class, 'destroy'])->name('delete.cart');

Route::get('about-us', [GuestController::class, 'about'])->name('about.us');

Route::get('/checkout',[CheckOutController::class, 'index'])->name('checkout');
Route::get('/province/{id}/cities', [CheckOutController::class, 'getCities']);
Route::post('/Checkout/submit', [CheckOutController::class, 'submit'])->name('checkout-submit');
// Route::post('/Checkout/shipping', 'checkoutController@checkOut')->name('ongkir');

Route::get('/success-transaction', [GuestController::class, 'thanksPage'])->name('thanks');

Route::post('/check-shipping', [CheckOutController::class, 'getCost'])->name('get.cost');
Route::post('/checkout/shipping', [CheckOutController::class, 'checkOut'])->name('ongkir');

Auth::routes();
Route::group(['middleware' => 'admin'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product-create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product-update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/product-show', [ProductController::class, 'show'])->name('product.show');

    // Product Image
    Route::get('/product-img', [ProductImageController::class, 'index'])->name('product.img');
    Route::get('/product-img-create', [ProductImageController::class, 'create'])->name('product.img.create');
    Route::post('/product-img-store', [ProductImageController::class, 'store'])->name('product.img.store');
    Route::get('/product-img-edit/{id}', [ProductImageController::class, 'edit'])->name('product.img.edit');
    Route::post('/product-img-update/{id}', [ProductImageController::class, 'update'])->name('product.img.update');
    Route::get('/product-img-delete/{id}', [ProductImageController::class, 'destroy'])->name('product.img.delete');

    // Product Category
    Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('product.category');
    Route::get('/product-category-create', [ProductCategoryController::class, 'create'])->name('product.category.create');
    Route::post('/product-category-store', [ProductCategoryController::class, 'store'])->name('product.category.store');
    Route::get('/product-category-edit/{id}', [ProductCategoryController::class, 'edit'])->name('product.category.edit');
    Route::post('/product-category-update/{id}', [ProductCategoryController::class, 'update'])->name('product.category.update');
    Route::get('/product-category-delete/{id}', [ProductCategoryController::class, 'destroy'])->name('product.category.delete');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user.update');

    // Transaction
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::get('/transaction-detail/{id}', [TransactionController::class, 'show'])->name('transaction.detail');
});

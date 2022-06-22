<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\WelcomeController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/shop', [WelcomeController::class, 'shop'])->name('shop');
Route::get('/wishlist', [WelcomeController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [WelcomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [WelcomeController::class, 'checkout'])->name('checkout');

Route::get('/sign-in', [WelcomeController::class, 'SignIn'])->name('auth.sign-in');
Route::get('/sign-up', [WelcomeController::class, 'SignUp'])->name('auth.sign-up');


Auth::routes();

Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', 'Admin\FrontendController@index');
                                //without calling class name -> 'use App\Http\....'
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@store');
    Route::post('edit-category','Admin\CategoryController@edit');
});

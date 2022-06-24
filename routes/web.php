<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\CategoryController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/blank', [WelcomeController::class, 'blank'])->name('blank');

Auth::routes();

Route::get('/sign-in', [WelcomeController::class, 'SignIn'])->name('auth.sign-in');
Route::get('/sign-up', [WelcomeController::class, 'SignUp'])->name('auth.sign-up');

Route::middleware(['auth','isCustomer'])->group(function(){
    Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
    Route::get('/shop', [WelcomeController::class, 'shop'])->name('shop');
    Route::get('/wishlist', [WelcomeController::class, 'wishlist'])->name('wishlist');
    Route::get('/cart', [WelcomeController::class, 'cart'])->name('cart');
    Route::get('/checkout', [WelcomeController::class, 'checkout'])->name('checkout');

});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', 'Admin\FrontendController@index');
                                //without calling class name -> 'use App\Http\....'
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@store');
    Route::get('edit-prod/{id}',[CategoryController::class,'edit']);//update-category
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    
    Route::get('products', 'Admin\ProductController@index');
    Route::get('add-products','Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@store');
    Route::post('edit-product','Admin\ProductController@edit');

    
    
});

Route::middleware(['auth','isOwner'])->group(function(){
    Route::resource('/owner',OwnerController::class);
});


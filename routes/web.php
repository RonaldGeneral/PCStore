<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/front');
});

Route::view('/front', 'front/pages/cart');
Route::view('/front/cart', 'front/pages/cart');
Route::view('/front/checkout', 'front/pages/checkout');
Route::view('/front/contact', 'front/pages/contact');
Route::view('/front/product-details', 'front/pages/product-details');
Route::view('/front/home', 'front/pages/home');
Route::view('/front/login', 'front/pages/login');
Route::view('/front/profile', 'front/pages/profile');
Route::view('/front/signup', 'front/pages/signup');
<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/front');
});

Route::view('/front', 'front/pages/cart');
Route::view('/front/cart', 'front/pages/cart');
Route::view('/front/checkout', 'front/pages/checkout');
Route::view('/front/contact', 'front/pages/contact');
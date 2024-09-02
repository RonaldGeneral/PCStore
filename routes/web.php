<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/front');
});

Route::view('/front', 'front/pages/cart');
Route::view('/front/cart', 'front/pages/cart');
Route::view('/front/checkout', 'front/pages/checkout');
Route::view('/front/contact', 'front/pages/contact');
Route::view('/front/shop', 'front/pages/product-catalog');
Route::view('/front/product', 'front/pages/product-details');
Route::view('/front/product-details', 'front/pages/product-details');
Route::view('/front/home', 'front/pages/home');
Route::view('/front/login', 'front/pages/login');
Route::view('/front/profile', 'front/pages/profile');
Route::view('/front/signup', 'front/pages/signup');
Route::view('/front/deliveryStatus', 'front/pages/deliveryStatus');
Route::view('/front/forgotPassword', 'front/pages/forgotPassword');
Route::view('/front/newPassword', 'front/pages/newPassword');
Route::view('/front/orderHistory', 'front/pages/orderHistory');



Route::view('/admin/customer-details', 'admin/pages/customer-details');
Route::view('/admin/customer-page', 'admin/pages/customer-page');
Route::view('/admin/log-record', 'admin/pages/log-record');
Route::view('/admin/login', 'admin/pages/login');
Route::view('/admin/profile', 'admin/pages/profile');
Route::view('/admin/staff-details', 'admin/pages/staff-details');
Route::view('/admin/staff-page', 'admin/pages/staff-page');

Route::view('/admin/order-details', 'admin/pages/order-details');
Route::view('/admin/order-page', 'admin/pages/order-page');
Route::view('/admin/product-details', 'admin/pages/product-details');

Route::get('/admin/product-page', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/product-page/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/admin/product-details/{product}', [ProductController::class, 'view'])->name('products.view');
Route::post('/admin/product-page', [ProductController::class, 'create'])->name('products.create');
Route::put('/admin/product-details/{product}/edit', [ProductController::class, 'edit_details'])->name('products.edit_details');
Route::put('/admin/product-details/{product}/attr', [ProductController::class, 'edit_attrs'])->name('products.edit_attrs');
Route::delete('/admin/product-page', [ProductController::class, 'destroy'])->name('products.destroy');


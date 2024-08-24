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



<?php

use App\Http\Controllers\CustLoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/front');
});

//Route::view('/front', 'front/pages/cart');
Route::view('/front/cart', 'front/pages/cart');
Route::view('/front/checkout', 'front/pages/checkout');
Route::view('/front/contact', 'front/pages/contact');
Route::get('/front/shop', [ProductController::class, 'catalog'])->name('front.catalog');
Route::get('/front/product/{product}', [ProductController::class, 'viewProduct'])->name('front.viewProduct');


Route::get('/front', [CustomerController::class,'index'])->name('front.home');
Route::get('/front/login', [CustLoginController::class,'index'])->name('front.login');
Route::get('/front/signup', [CustLoginController::class,'signUp'])->name('front.signup');
Route::get('/front/forgot-password', [CustLoginController::class,'forgotPassword'])->name('front.forgot_pw');
Route::get('/front/new-password', [CustLoginController::class,'newPassword'])->name('front.new_pw');

Route::get('/front/profile', [CustomerController::class,'profile'])->name('front.profile');
Route::get('/front/delivery-status', [CustomerController::class,'deliveryStatus'])->name('front.delivery_stat');
Route::get('/front/order-history', [CustomerController::class,'orderHistory'])->name('front.order_hist');

Route::post('/create-account', [CustLoginController::class,'createAccount'])->name('create-account');
Route::post('/front/login', [CustLoginController::class,'login'])->name('customer.login');
Route::post('/front/logout', [CustLoginController::class, 'logout'])->name('customer.logout');
Route::post('/reset-password', [CustLoginController::class,'resetPassword']);
Route::post('/verify-pin', [CustLoginController::class,'verifyPIN'])->name('verify_pin');
Route::post('/change-password', [CustLoginController::class,'changePassword'])->name('change_pw');
Route::post('/update-profile', [CustomerController::class,'updateProfile'])->name('update_profile');



Route::get('/admin/customer-details/{customer}', [AdminCustomerController::class, 'view'])->name('customers.view');
Route::get('/admin/customer-page', [AdminCustomerController::class, 'index'])->name('customers.index');
Route::get('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('/admin/profile', [AdminStaffController::class, 'profile'])->name('admin.profile');
Route::get('/admin/staff-details', [AdminStaffController::class, 'view'])->name('admins.view');
Route::get('/admin/staff-page', [AdminStaffController::class, 'index'])->name('admins.index');
Route::get('/admin/log-record', [AdminStaffController::class, 'index'])->name('admin.log-record');

Route::get('/admin/order-details/{order}', [OrderController::class, 'view'])->name('orders.view');
Route::get('/admin/order-page', [OrderController::class, 'index'])->name(name: 'orders.index');
Route::get('/admin/order-page/search', [OrderController::class, 'search'])->name('orders.search');
Route::delete('/admin/order-page', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::get('/admin/product-page', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/product-page/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/admin/product-details/{product}', [ProductController::class, 'view'])->name('products.view');
Route::post('/admin/product-page', [ProductController::class, 'create'])->name('products.create');
Route::put('/admin/product-details/{product}/edit', [ProductController::class, 'edit_details'])->name('products.edit_details');
Route::put('/admin/product-details/{product}/attr', [ProductController::class, 'edit_attrs'])->name('products.edit_attrs');
Route::delete('/admin/product-page', [ProductController::class, 'destroy'])->name('products.destroy');


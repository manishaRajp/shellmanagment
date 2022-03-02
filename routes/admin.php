<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Order;
use App\Http\Controllers\Admin\OrderDetailsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



// Admin Login //
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', [LoginController::class, 'LoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


// Admin Dashboard //
Route::group(['middleware' => 'auth:admin'], function () {
Route::get('dashboard', [DashboardController::class, 'view'])->name('dashboard');
Route::get('/profile', [DashboardController::class, 'profileview'])->name('profile_view');
Route::post('/profile-update', [DashboardController::class, 'profileupdate'])->name('profile_update');


// Product Module //
Route::resource('product',ProductController::class);
Route::post('product-index', [ProductController::class, 'index'])->name('index_product');
// Route::get('product-edit', [ProductController::class, 'edit'])->name('edit_product');
Route::post('product-update', [ProductController::class, 'update'])->name('update_product');
Route::get('product-delete', [ProductController::class, 'destroy'])->name('delete_product');



// order Module 
Route::resource('order',Order::class);

// order-details Module 
Route::resource('order-details',OrderDetailsController::class);


// User Module 
Route::resource('user',UserController::class);
 });
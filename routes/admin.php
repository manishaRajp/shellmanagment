<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
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

// Route::get('dashboard', function () {
//     return view('admin.dashboard.index');
// });
// Route::get('login', function () {
//     return view('admin.dashboard.login');
// });


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

 });
<?php

use App\Contracts\CustomerContract;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('custm-register', [CustomerController::class, 'Register']);
Route::post('custm-login', [CustomerController::class, 'Login']);



Route::group(['middleware' => 'auth:api'], function () {
    Route::post('order-placed', [CustomerController::class, 'order']);
    Route::get('order-details', [CustomerController::class, 'OrderDetails']);
});
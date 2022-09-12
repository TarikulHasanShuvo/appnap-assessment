<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

//Authenticate Routes
Route::middleware('auth:api')->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::get('check-token', 'checkToken');
        Route::post('logout', 'logout');
    });


    // Category Routes
    Route::get('categories', [CategoryController::class, 'index']);


    // Products Routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index');
        Route::post('product', 'store');
        Route::post('product/{id}', 'update');
        Route::delete('product/{id}', 'destroy');
    });
});

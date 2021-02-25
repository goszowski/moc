<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    ProductsController,
};

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

// Авторизація
Route::group(['prefix'=>'auth', 'as'=>'auth.'], function() {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::group(['middleware'=>['auth:api']], function() {

    // Продукти
    Route::group(['prefix'=>'products', 'as'=>'products'], function() {

        // Доступні продукти
        Route::get('available', [ProductsController::class, 'available'])->name('available');
    });
});
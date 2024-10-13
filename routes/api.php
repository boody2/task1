<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Middleware\ApiAdmin;
use App\Http\Middleware\ApiAuth;
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


Route::post('login', [AuthApiController::class, 'login']);
Route::group(['middleware' => [ApiAuth::class]], function () {
    Route::group(['middleware' => [ApiAdmin::class]], function () {
        Route::resource('client', ClientController::class);
        Route::resource('invoice', InvoiceController::class);
    });
    Route::resource('invoice', InvoiceController::class)->only([
        'index',
        'update',
        'show'
    ]);
    Route::post('logout', [AuthApiController::class, 'logout']);
});

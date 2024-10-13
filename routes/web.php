<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InvoiceController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[AuthController::class,'cover'] )->name('cover');
Route::get('/login',[AuthController::class,'login_page'] )->name('login');
Route::post('/login',[AuthController::class,'login'] )->name('login');


Route::middleware(['auth','admin'])->group(function () {
    Route::resource('employee', EmployeeController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::resource('client', ClientController::class);
    Route::resource('history', HistoryController::class);

});
Route::middleware(['auth'])->group(function () {
    Route::resource('invoice', InvoiceController::class);
    Route::resource('client', ClientController::class);;
    Route::get('/profile',[AuthController::class,'profile'] )->name('profile');
    Route::put('/update_profile/{user}',[AuthController::class,'update_profile'] )->name('update_profile');
    Route::post('/logout',[AuthController::class,'logout'] )->name('logout');
});


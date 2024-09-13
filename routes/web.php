<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MerchantAuthController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Merchant Auth
Route::get('/merchant/register', [MerchantAuthController::class, 'showRegisterForm'])->name('merchant.register');
Route::post('/merchant/register', [MerchantAuthController::class, 'register']);
Route::get('/merchant/login', [MerchantAuthController::class, 'showLoginForm'])->name('merchant.login');
Route::post('/merchant/login', [MerchantAuthController::class, 'login']);
Route::post('/merchant/logout', [MerchantAuthController::class, 'logout'])->name('merchant.logout');

Route::middleware(['auth:merchant'])->prefix('merchant')->group(function () {
    Route::get('/dashboard', function () {
        return view('merchants.dashboard');
    })->name('merchant.home');

    Route::get('/profile', [MerchantController::class, 'edit'])->name('merchant.profile');
    Route::put('/profile', [MerchantController::class, 'update'])->name('merchant.update');

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menu/{id}/destroy', [MenuController::class, 'destroy'])->name('menus.destroy');

    Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
});

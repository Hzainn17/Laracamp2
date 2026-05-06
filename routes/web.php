<?php

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Socialite
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'googleCallback'])->name('user.login.google.callback');


Route::middleware('auth')->group(function () {
    // checkout
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');

    // dashboard
    Route::get('dashboard-user', [HomeController::class, 'dashboard'])->name('dashboard.user');
});

require __DIR__.'/auth.php';

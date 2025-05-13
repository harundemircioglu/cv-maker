<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanFeatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');
});

Route::prefix('plan')->middleware(['auth', 'role:super-admin|admin'])->name('plan.')->group(function () {
    Route::get('/', [PlanController::class, 'index'])->name('index');

    Route::prefix('feature')->name('feature.')->group(function () {
        Route::get('/', [PlanFeatureController::class, 'index'])->name('index');
        Route::post('/store', [PlanFeatureController::class, 'store'])->name('store');
        Route::post('/update/{id}', [PlanFeatureController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [PlanFeatureController::class, 'destroy'])->name('destroy');
    });
});

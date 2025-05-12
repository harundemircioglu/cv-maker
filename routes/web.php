<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanFeatureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('plan.index');
});

Route::prefix('plan')->middleware(['auth', 'role:super-admin|admin'])->name('plan.')->group(function () {
    Route::get('/', [PlanController::class, 'index'])->name('index');

    Route::prefix('feature')->name('feature.')->group(function () {
        Route::get('/', [PlanFeatureController::class, 'index'])->name('index');
    });
});

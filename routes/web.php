<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\WorkExperienceController;
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

Route::prefix('resume')->name('resume.')->middleware(['auth'])->group(function () {
    Route::post('/store', [ResumeController::class, 'store'])->middleware('check.usage:cv_downloads')->name('store');
    Route::post('/update/{id}', [ResumeController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [ResumeController::class, 'destroy'])->name('destroy');

    Route::prefix('certificate')->name('certificate.')->group(function () {
        Route::post('/store/{resumeId}', [CertificateController::class, 'store'])->middleware('check.usage:certificates')->name('store');
        Route::post('/update/{id}', [CertificateController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [CertificateController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('education')->name('education.')->group(function () {
        Route::post('/store/{resumeId}', [EducationController::class, 'store'])->middleware('check.usage:educations')->name('store');
        Route::post('/update/{id}', [EducationController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [EducationController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('language')->name('language.')->group(function () {
        Route::post('/store/{resumeId}', [LanguageController::class, 'store'])->middleware('check.usage:languages')->name('store');
        Route::post('/update/{id}', [LanguageController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [LanguageController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('project')->name('project.')->group(function () {
        Route::post('/store/{resumeId}', [ProjectController::class, 'store'])->middleware('check.usage:projects')->name('store');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [ProjectController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('reference')->name('reference.')->group(function () {
        Route::post('/store', [ReferenceController::class, 'store'])->middleware('check.usage:references')->name('store');
        Route::post('/update/{id}', [ReferenceController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [ReferenceController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('work-experience')->name('workExperience.')->group(function () {
        Route::post('/store/{resumeId}', [WorkExperienceController::class, 'store'])->middleware('check.usage:work_experiences')->name('store');
        Route::post('/update/{id}', [WorkExperienceController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [WorkExperienceController::class, 'destroy'])->name('destroy');
    });
});

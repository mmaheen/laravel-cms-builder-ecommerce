<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EditPageController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");


Route::middleware('guest')->group(function () {
    Route::get('/{token}/register', [AuthController::class, 'showRegistrationForm'])->name('registration.form');
    Route::post('/{token}/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/create/registration/token', [AuthController::class, 'createToken'])->name('create.registration.token');
});

Route::get('/edit-page', [EditPageController::class, 'index'])->name('edit.page');
Route::post('/edit-page/nav/update', [EditPageController::class, 'updateHeader'])->name('update.header');
Route::post('/edit-page/hero/update', [EditPageController::class, 'updateHero'])->name('update.hero');
Route::post('/edit-page/feature/update', [EditPageController::class, 'updateFeature'])->name('update.feature');
Route::delete('/feature/{index}', [EditPageController::class, 'destroyFeature'])->name('feature.destroy');

Route::post('/edit-page/overview/update', [EditPageController::class, 'updateOverview'])->name('update.overview');

Route::get('/test', [EditPageController::class, 'test']);
<?php

use App\Http\Controllers\Backend\EditPageController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get('/edit-page', [EditPageController::class, 'index'])->name('edit.page');
Route::post('/edit-page/nav/update/title', [EditPageController::class, 'updateHeaderTitle'])->name('update.header-title');
Route::post('/edit-page/hero/update/title', [EditPageController::class, 'updateHero'])->name('update.hero');

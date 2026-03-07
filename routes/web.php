<?php

use App\Http\Controllers\Backend\EditPageController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get('/edit-page', [EditPageController::class, 'index'])->name('edit.page');
Route::post('/edit-page/nav/update', [EditPageController::class, 'updateHeader'])->name('update.header');
Route::post('/edit-page/hero/update', [EditPageController::class, 'updateHero'])->name('update.hero');
Route::post('/edit-page/feature/update', [EditPageController::class, 'updateFeature'])->name('update.feature');
Route::delete('/feature/{index}', [EditPageController::class, 'destroyFeature'])->name('feature.destroy');

Route::post('/edit-page/overview/update', [EditPageController::class, 'updateOverview'])->name('update.overview');

Route::get('/test', [EditPageController::class, 'test']);
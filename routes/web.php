<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EditPageController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/product/page/{product}", [HomeController::class, "productPageShow"])->name("product.page.show");
Route::post('/order/{id}', [HomeController::class, 'order'])->name('order');

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


    Route::get('/products', [DashboardController::class, 'productIndex'])->name('product.index');

    //PAGE
    Route::get('/page/create', [DashboardController::class, 'createPage'])->name('page.create');
    Route::post('/page/create', [DashboardController::class, 'storePage'])->name('product.store');
    Route::get('/edit-page/{id}', [EditPageController::class, 'edit'])->name('edit.page');

    //ORDER
    Route::get('/order/list', [DashboardController::class, 'orders'])->name('order.list');
    Route::get('/order/{order}/status/{status}', [DashboardController::class, 'updateOrderStatus'])->name('order.status.update');

    // COMPONENT UPDATE
    Route::post('/update/component/nav/{id}', [EditPageController::class, 'updateHeader'])->name('update.header');
    Route::post('/update/component/hero/{id}', [EditPageController::class, 'updateHero'])->name('update.hero');
    Route::post('/update/component/feature/{id}', [EditPageController::class, 'updateFeature'])->name('update.feature');
    Route::delete('/feature/{index}/{product}', [EditPageController::class, 'destroyFeature'])->name('feature.destroy');
    Route::post('/update/component/overview/{id}', [EditPageController::class, 'updateOverview'])->name('update.overview');
});



Route::get('/test', [EditPageController::class, 'test']);
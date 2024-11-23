<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\QrCodeController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/index', 'index');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



    Route::middleware('auth')->group(function () {

        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/add-menu', [MenuController::class, 'create'])->name('menu.create');
        Route::get('menu-details/{id}', [MenuController::class, 'details'])->name('menu.details');
        Route::post('/added-menu', [MenuController::class,'store'])->name('menu.store');
        Route::post('/add-catagory', [CategoryController::class,'store'])->name('category.store');
        Route::post('/menu-items', [MenuItemController::class,'store'])->name('menu_item.store');

        Route::get('/qr-code', function () {
            return view('get-qr');
        })->name('qr.form');

        Route::post('/qr-code/generate', [QrCodeController::class, 'generate'])->name('qr.generate');

    });

require __DIR__.'/auth.php';

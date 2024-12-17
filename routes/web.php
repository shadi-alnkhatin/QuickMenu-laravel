<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;



Route::view('/', 'welcome');
Route::view('/index', 'index');
Route::get('/customer-menu/{menuId}/{categoryId?}', function ($menuId, $categoryId=null ) {
    return view('customer_menu', [
        'menuId' => $menuId,
        'categoryId' => $categoryId
    ]);
});
Route::Post('/order',[OrderController::class, 'store'])->name('order.store')->withoutMiddleware(VerifyCsrfToken::class);

Route::get('dashboard', [AdminController::class,'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::view('pricing', 'pricing')
    ->name('pricing');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    Route::post('stripe/webhook', [StripeWebhookController::class,'handleWebhook'])->name('cashier.webhook')->withoutMiddleware(VerifyCsrfToken::class);



    Route::middleware('auth')->group(function () {




        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/add-menu', [MenuController::class, 'create'])->name('menu.create');
        Route::get('menu-details/{id}', [MenuController::class, 'details'])->name('menu.details');
        Route::post('/added-menu', [MenuController::class,'store'])->name('menu.store');
        Route::post('/add-catagory', [CategoryController::class,'store'])->name('category.store');
        Route::post('/menu-items', [MenuItemController::class,'store'])->name('menu_item.store');

        Route::get('/qr-code/{url}',[QrCodeController::class,'index'])->name('qr.form');

        Route::get('/checkout/{plan}', [CheckoutController::class, 'index'])->name('checkout');

        Route::post('/qr-code/generate/{url}', [QrCodeController::class, 'generate'])->name('qr.generate');
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::view('/admin','admin');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/subscribers',[SubscriptionController::class, 'index'])->name('subscribers.index');
        Route::view('/messages','contact-admin')->name('contact-admin');
    });


require __DIR__.'/auth.php';

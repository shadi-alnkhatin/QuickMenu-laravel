<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckSubscription;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;



Route::view('/', 'welcome')->name('home');
Route::view('/index', 'index');
Route::get('/customer-menu/{menuId}/{categoryId?}', function ($menuId, $categoryId=null ) {
    $menuDetails=Menu::find($menuId);
    return view('customer_menu', [
        'menu' => $menuDetails,
        'menuId' => $menuId,
        'categoryId' => $categoryId
    ]);
})->name('customer_menu');
Route::Post('/order',[OrderController::class, 'store'])->name('order.store')->withoutMiddleware(VerifyCsrfToken::class);


    Route::view('pricing', 'pricing')
    ->name('pricing');


    Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    Route::post('stripe/webhook', [StripeWebhookController::class,'handleWebhook'])->name('cashier.webhook')->withoutMiddleware(VerifyCsrfToken::class);

    Route::get('/checkout/{plan}', [CheckoutController::class, 'index'])->name('checkout')->middleware(['auth']);


    Route::middleware(['auth', CheckSubscription::class])->group(function () {

        Route::get('dashboard', [AdminController::class,'index'])
        ->middleware(['verified'])
        ->name('dashboard');
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/add-menu', [MenuController::class, 'create'])->name('menu.create');
        Route::get('menu-details/{id}', [MenuController::class, 'details'])->name('menu.details');
        Route::post('/added-menu', [MenuController::class,'store'])->name('menu.store');
        Route::post('/add-catagory', [CategoryController::class,'store'])->name('category.store');
        Route::post('/menu-items', [MenuItemController::class,'store'])->name('menu_item.store');

        Route::get('/qr-code/{url}',[QrCodeController::class,'index'])->name('qr.form');


        Route::post('/qr-code/generate/{url}', [QrCodeController::class, 'generate'])->name('qr.generate');

        Route::get('/orders', [OrderController::class, 'viewOrders'])->name('orders.index');
        Route::get('/edit-menu/{id}',[MenuController::class, 'edit'])->name('edit_menu.index');
        Route::put('/update-menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/delete-menu/{id}',[MenuController::class, 'destroy'])->name('menu.delete');
        Route::get('/edit-menu-items/{id}', [MenuItemController::class, 'edit']);
        Route::put('/update-menu-item/{id}', [MenuItemController::class, 'update']);

        Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
        Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('categories.update');

        Route::get('/contact', [ContactController::class, 'show'])->name('contact');
        Route::post('/submit-contact', [ContactController::class,'store'])->name('contact.store');

    });

    Route::middleware(['role:admin'])->group(function () {
        Route::view('/admin','admin');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/subscribers',[SubscriptionController::class, 'index'])->name('subscribers.index');
        Route::get('/messages',[ContactController::class,'index'])->name('contact-admin');
    });


require __DIR__.'/auth.php';

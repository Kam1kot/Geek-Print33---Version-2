<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::get('/about-us', [MainController::class, 'about_us'])->name('main.about_us');

// Роуты продуктов
Route::prefix('products')->name('products.')->group( function () {
    Route::get('/', Product\IndexController::class)->name('index');
    Route::get('/show/{id}', Product\ShowController::class)->name('show');
});

// Роуты корзины
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/',[CartController::class, 'index'])->name('index');

    Route::post('/add', [CartController::class, 'add_to_cart'])->name('add');
    Route::post('/add-from-wishlist/{rowId}', [CartController::class, 'add_to_cart_from_wishlist'])->name('add.from.wishlist');

    Route::put('/increase-quantity/{rowId}',[CartController::class, 'increase_cart_quantity'])->name('qty.increase');
    Route::put('/decrease-quantity/{rowId}',[CartController::class, 'decrease_cart_quantity'])->name('qty.decrease');

    Route::delete('/remove/{rowId}', [CartController::class, 'remove_item'])->name('item.remove');
    Route::delete('/clear', [CartController::class, 'empty_cart'])->name('destroy');
});

// Роуты вишлиста
Route::prefix(prefix: 'wishlist')->name('wishlist.')->group(function () {
    Route::get('/',[WishlistController::class, 'index'])->name('index');
    Route::post('/add', [WishlistController::class, 'add_to_wishlist'])->name('add');
    Route::delete('/remove/{rowId}', [WishlistController::class, 'remove_item'])->name('item.remove');
    Route::delete('/clear', [WishlistController::class, 'empty_wishlist'])->name('destroy');
});

Route::get('/search', [MainController::class, 'search'])->name('main.search');

Route::get('/delivery', [MainController::class, 'delivery'])->name('main.delivery');

Route::get('/contacts', [MainController::class, 'contacts'])->name('main.contacts');

Route::post('/set-cookie-consent', function (Request $request) {
    $cookieConsent = $request->input('cookie_consent');
    session()->put('cookie_consent', $cookieConsent);
    return response()->json(['status' => 'success']);
})->name('set.cookie.consent');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [ProfileController::class, 'edit'])->name('dashboard.edit');
//     Route::patch('/dashboard', [ProfileController::class, 'update'])->name('dashboard.update');
//     Route::delete('/dashboard', [ProfileController::class, 'destroy'])->name('dashboard.destroy');
// });

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GrowerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/* Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }
    return redirect()->back();
}); */

Route::resources([
    'adresses' => AdressController::class,
    'deposits' => DepositController::class,
    'growers' => GrowerController::class,
    'orders' => OrderController::class,
    'ordersdetails' => OrderDetailController::class,
    'products' => ProductController::class,
    'productsImages' => ProductImageController::class,
]);


Route::get('/', function () {
    return view('welcome');
})->middleware(['guest'])->name('home');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

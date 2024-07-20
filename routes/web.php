<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdressController;
use App\Models\Categorie;
use App\Models\SellUnit;
use App\Models\ProductImage;
use App\Models\Deposit;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GrowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Models\Product;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/show_deposits', [HomeController::class, 'show_deposits'])->name('show_deposits');
Route::get('/order.today', [HomeController::class, 'today_deals'])->name('order.today');
Route::get('/category/{id_cat}', [HomeController::class, 'show_product_by_category'])->name('product_by_category');

Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/empty', [CartController::class, 'empty'])->name('cart.empty');




Route::get('/product.show/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $categories = Categorie::all();
    $sellUnits = SellUnit::all();
    $images = ProductImage::all();
    return view('home.show_product', compact('product', 'categories', 'sellUnits', 'images'));
})->name('product.show');

Route::get('/deposit/{id}', function ($id) {
    if ($id)
        $deposit = Deposit::findOrFail($id);

    $products = Product::all()->where('deposit_id', $id);
    $categories = Categorie::all();
    $deposits = Deposit::all();
    $sellUnits = SellUnit::all();
    $images = ProductImage::all();
    return view('welcome', compact('products', 'categories', 'sellUnits', 'images', 'deposits', 'deposit'));
})->name('deposit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

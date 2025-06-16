<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Http\Controllers\{
    ProductController,
    CartController,
    TransactionController,
    BuyController,
    CheckoutController,
    DashboardController,
    Auth\LoginController,
    Auth\RegisterController
};

// Public Routes
Route::get('/', function () {
    $products = Product::all();
    return view('home', compact('products'));
});
Route::get('/purchase-success', function () {
    return view('purchase-success');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/admin', fn () => redirect()->route('login'));
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Buy Route
Route::get('/buy/{id}', [BuyController::class, 'show'])->name('buy.show');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Product Management
    Route::resource('products', ProductController::class);

    // Cart & Checkout
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::post('/checkout', [TransactionController::class, 'store'])->name('checkout.store');
    Route::post('/checkout/{id}', [CheckoutController::class, 'store'])->name('checkout');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});

// Optional admin-only protection
Route::middleware(['auth', 'is_admin'])->group(function () {
    // Admin-only dashboard (if separate)
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::middleware('can:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::resource('categories', CategoryController::class);
        Route::resource('books', BookController::class);
        Route::get('transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
        Route::patch('transactions/{transaction}/approve', [TransactionController::class, 'approve'])->name('admin.transactions.approve');
        Route::patch('transactions/{transaction}/return', [TransactionController::class, 'markAsReturned'])->name('admin.transactions.return');
    });

    // User Routes
    Route::middleware('can:user')->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');
        
        Route::get('/books', [BookController::class, 'userIndex'])->name('user.books');
        Route::post('/books/{book}/borrow', [TransactionController::class, 'borrow'])->name('user.borrow');
        Route::get('/my-transactions', [TransactionController::class, 'myTransactions'])->name('user.transactions');
    });
});

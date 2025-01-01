<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/landing', function () {
    return Inertia::render('Landing');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return Inertia::render('Essay');
    })->name('dashboard');
    Route::prefix('accounts')->group(function (){
        Route::get('/', [AccountController::class, 'index'])->name('accounts.index');
        Route::get('/saving', [AccountController::class, 'saving'])->name('accounts.saving');
        Route::get('/checking', [AccountController::class, 'checking'])->name('accounts.checking');
        Route::get('/loan', [AccountController::class, 'loan'])->name('accounts.loan');
    });
    Route::prefix('loans')->group(function (){
        Route::get('/',  [LoanController::class, 'index'])->name('loans.index');
    });
    Route::prefix('payments')->group(function (){
        Route::get('/', [PaymentController::class, 'index'])->name('payments.index');
    });
    Route::prefix('transactions')->group(function (){
        Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
    });
    Route::prefix('settings')->group(function (){
        Route::get('/', [UserController::class, 'settings'])->name('users.settings');
    });
});
Route::prefix('transactions')->group(function (){
    Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
});
require __DIR__.'/auth.php';

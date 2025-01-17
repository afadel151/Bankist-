<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users',function (){
    return Client::all();
});
Route::middleware(['auth'])->group( function (){

    Route::prefix('clients')->group(function ()  {
        Route::get('/', [UserController::class, 'clients']);
        Route::prefix('{id}')->group(function ()  {
            Route::get('/', [ClientController::class, 'profile']);
            Route::get('/deposit', [ClientController::class, 'deposit']);
        });
    });
    Route::prefix('loans')->group(function ()  {
        Route::get('/', [UserController::class, 'loans']);
        Route::get('/update-status', [UserController::class, '']);
    });
    
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

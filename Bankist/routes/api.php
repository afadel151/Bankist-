<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('/api')->group(function (){
    Route::prefix('transactions')->group(function(){
        Route::post('add', [TransactionController::class, 'add'])->name('transactions.add');
    });
    Route::prefix('payments')->group(function(){
        Route::post('add',[PaymentController::class, 'add']);
    });
  
    Route::prefix('cards')->group(function(){
        Route::post('/delete',[CardController::class, 'delete']);
        Route::post('/request',[CardController::class, 'request']);
        Route::post('lock',[CardController::class, 'lock']);
        Route::post('unfreeze',[CardController::class, 'unfreeze']);
        Route::post('edit',[CardController::class, 'edit']);
    });
    Route::prefix('accounts')->group(function(){
        Route::post('/add',[AccountController::class, 'add']);
        Route::post('/edit',[AccountController::class, 'edit']);
        Route::post('/delete',[AccountController::class, 'delete']);
    });
    Route::prefix('machines')->group(function(){
        Route::get('/get_machine', [MachineController::class, 'get']);
    });
    Route::prefix('refunds')->group(function(){
        Route::post('/add', [RefundController::class, 'add']);
        Route::get('/',[RefundController::class, 'get_refunds']);
    });
    Route::prefix('deposits')->group(function(){
        Route::post('add',[DepositController::class, 'add']);
        Route::get('/',[DepositController::class, 'get_deposits']);
    });
    Route::prefix('withdrawals')->group(function(){
        Route::post('add',[WithdrawalController::class, 'add']);
        Route::get('/',[WithdrawalController::class, 'get']);
    });
})->middleware('auth');
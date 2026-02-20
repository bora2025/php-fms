<?php

use App\Http\Controllers\BudgetManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatementViewController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/budget-management', [BudgetManagementController::class, 'index'])->name('budget.management');
    Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdrawal');
    Route::get('/statement', [StatementViewController::class, 'index'])->name('statement');
});

require __DIR__.'/auth.php';

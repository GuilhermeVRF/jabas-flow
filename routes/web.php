<?php

use Illuminate\Support\Facades\Route;

// Auth Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/storeUser', [UserController::class, 'store'])->name('user.store');
Route::get('/verifyEmail', [VerifyEmailController::class, 'index'])->name('user.verifyEmailView');
Route::post('/verifyEmailCode', [VerifyEmailController::class, 'verifyEmailCode'])->name('user.verifyEmailCode');
Route::post('/resendEmailCode', [VerifyEmailController::class, 'resendEmailCode'])->name('user.resendEmailCode');
Route::post('/login', [LoginController::class, 'login'])->name('user.login');

// Auth Middleware
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/budget/create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('/budget/store', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('/budget/edit/{id}', [BudgetController::class, 'edit'])->name('budget.edit');
    Route::put('/budget/update/{id}', [BudgetController::class, 'update'])->name('budget.update');
    Route::get('/budget/show/{id}', [BudgetController::class, 'show'])->name('budget.show');
});

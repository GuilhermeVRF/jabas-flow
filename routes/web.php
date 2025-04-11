<?php

use Illuminate\Support\Facades\Route;

// Auth Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\RecurrenceController;

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
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/recurrences', [RecurrenceController::class, 'index'])->name('recurrence.index');
    Route::get('/recurrence/edit/{id}', [RecurrenceController::class, 'edit'])->name('recurrence.edit');
    Route::put('/recurrence/update/{id}', [RecurrenceController::class, 'update'])->name('recurrence.update');
    Route::get('/graphs', [GraphController::class, 'index'])->name('graph.index');
    Route::get('/graphs/income-x-expense', [GraphController::class, 'generateIncomeXExpenseGraph'])->name('graph.income-x-expense');
    Route::get('/graphs/income-evolution', [GraphController::class, 'generateIncomeEvolutionGraph'])->name('graph.income-evolution');
    Route::get('/graphs/expense-evolution', [GraphController::class, 'generateExpenseEvolutionGraph'])->name('graph.expense-evolution');
});

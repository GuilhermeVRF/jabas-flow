<?php

use Illuminate\Support\Facades\Route;

// Auth Controllers
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);

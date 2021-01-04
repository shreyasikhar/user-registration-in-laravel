<?php

// https://dev.to/sujithjr/laravel-custom-authentication-system-4e1a
// Blog for user registration
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Show register page and login page
Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::get('/register', [RegistrationController::class, 'show'])->name('register')->middleware('guest');

// Register and login user
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegistrationController::class, 'register']);

// Protected routes - allow only logged in users
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::get('/forgot', [UserController::class, 'forgotPassword']);
Route::post('/forgot', [UserController::class, 'getEmail']);

Route::get('/reset/{token}', [UserController::class, 'resetPassword']);
Route::post('/reset/{token}', [UserController::class, 'submitResetPassword']);

Route::get('/', function () {
    return view('welcome');
});

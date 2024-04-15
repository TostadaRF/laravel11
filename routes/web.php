<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;


/* Rutas de autenticación */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('dashboard');
Route::get('/management', [HomeController::class, 'management'])->name('management');


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/verification', [UserController::class, 'verification'])->name('users.verification');
Route::post('/users/verify', [UserController::class, 'verify'])->name('users.verify');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
    Route::resource('users', UserController::class)->except(['create', 'store']);
    Route::resource('cars', CarController::class);
    Route::resource('properties', PropertyController::class);
});
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/',[AuthController::class,'login_page'])->name('login.index');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/registeration',[AuthController::class,'register_page'])->name('register.index');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/verification',[MessageController::class,'verification_page'])->name('code.verification');
Route::post('/verification',[MessageController::class,'verify_code'])->name('verify.code');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

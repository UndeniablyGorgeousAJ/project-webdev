<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('auth.index');
});

// View
Route::get('/', [StudentsController::class, 'myWelcomeView'])->name('std.myWelcomeView');

// for create, update and delete AKJBCDHJEB
Route::post('/create', [StudentsController::class, 'createNewStd'])->name('std.createNew');
Route::put('/update/{id}', [StudentsController::class, 'update'])->name('std.update');
Route::delete('/delete/{id}', [StudentsController::class, 'destroy'])->name('std.delete');

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');
// REGISTRATION
Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('auth.userRegister');

Route::middleware([AuthCheck::class])->group(function () {
    // View
    Route::get('/students', [StudentsController::class, 'myWelcomeView'])->name('std.myWelcomeView');
    // Create
    Route::post('/create', [StudentsController::class, 'createNewStd'])->name('std.createNew');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
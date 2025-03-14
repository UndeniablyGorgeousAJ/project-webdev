<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// View
Route::get('/', [StudentsController::class, 'myWelcomeView'])->name('std.myWelcomeView');

// Create, UPDATE AND DELETE
Route::post('/create', [StudentsController::class, 'createNewStd'])->name('std.createNew');
Route::put('/update/{id}', [StudentsController::class, 'update'])->name('std.update');
Route::delete('/delete/{id}', [StudentsController::class, 'destroy'])->name('std.delete');

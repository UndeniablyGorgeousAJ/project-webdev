<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

// View
Route::get('/', [StudentsController::class, 'myWelcomeView'])->name('std.myWelcomeView');

// Create, UPDATE AND DELETE
Route::post('/create', [StudentsController::class, 'createNewStd'])->name('std.createNew');
Route::post('/update/{id}', [StudentsController::class, 'updateStudent'])->name('std.update');
Route::post('/delete/{id}', [StudentsController::class, 'deleteStudent'])->name('std.delete');

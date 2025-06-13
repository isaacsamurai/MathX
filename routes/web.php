<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');;

Route::post('/generate-exercises', [\App\Http\Controllers\MainController::class, 'generateExercises'])->name('generateExercises');;

Route::get('/print-exercises', [\App\Http\Controllers\MainController::class, 'printExercises'])->name('printExercises');;

Route::get('/export-exercises', [\App\Http\Controllers\MainController::class, 'exportExercise'])->name('exportExercises');;

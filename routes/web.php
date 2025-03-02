<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/add', [BlogController::class, 'add']);
    Route::post('/create', [BlogController::class, 'store']);
    Route::get('/detail/{id}', [BlogController::class, 'show']);
    Route::get('/edit/{id}', [BlogController::class, 'edit']);
    Route::patch('/update/{id}', [BlogController::class, 'update']);
    Route::get('/delete/{id}', [BlogController::class, 'destroy']);
});

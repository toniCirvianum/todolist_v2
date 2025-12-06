<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);

//Rutes per crear categories
Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');
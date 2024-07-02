<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;


Route::group(
  ['middleware' => 'web'],
  function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  }
);

Route::group(
  ['middleware' => 'auth', redirect('/')],
  function () {
    Route::get('/task', [TaskController::class, 'index']);
    Route::post('/task', [TaskController::class, 'addTask']);
    Route::delete('/task/{id}', [TaskController::class, 'deleteTask']);
    Route::get('/edit/{id}', [TaskController::class, 'editTask']);
    Route::put('/update/{id}', [TaskController::class, 'updateTask'])->name('update');
  }
);

Route::get('/test', [TestController::class, 'index']);
Route::get('/alltasks', [TaskController::class, 'allTask']);

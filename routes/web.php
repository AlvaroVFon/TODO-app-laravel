<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::group(
    ['middleware' => 'web'],
    function () {
        Route::get('/', [TaskController::class, 'index']);
        Route::post('/task', [TaskController::class, 'addTask']);
        Route::delete('/task/{id}', [TaskController::class, 'deleteTask']);
        Route::get('/edit/{id}', [TaskController::class, 'editTask']);
        Route::put('/update', [TaskController::class, 'updateTask']);
    }
);


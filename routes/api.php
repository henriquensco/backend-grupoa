<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('tasks')->group(function ($route) {
    $route->get('/', [TaskController::class, 'listTasks']);
    $route->post('/create', [TaskController::class, 'createTask']);
    $route->put('/update', [TaskController::class, 'updateTask']);
    $route->delete('/delete', [TaskController::class, 'deleteTask']);
});
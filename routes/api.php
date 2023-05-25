<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    $router->post('login', [AuthController::class, 'login']);
    $router->post('logout', [AuthController::class, 'logout']);
    $router->post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'api', 'prefix' => 'tasks'], function ($router) {
    $router->get('/', [TaskController::class, 'listTasks']);
    $router->get('/{uuid}', [TaskController::class, 'getTaskByUuid']);
    $router->post('/create', [TaskController::class, 'createTask']);
    $router->put('/update/{uuid}', [TaskController::class, 'updateTask']);
    $router->delete('/delete/{uuid}', [TaskController::class, 'deleteTask']);
});

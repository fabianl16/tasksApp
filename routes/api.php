<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WeatherController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);

Route::post('weather', [WeatherController::class, 'getWeather']);

Route::group(['middleware' => 'auth:api'], function(){
    // Route::get('user', function(Request $request) {
    //     return $request->user();
    // });
    //Authenticacion
    Route::post('register', [AuthController::class, 'register']);
    Route::get('check-token', [AuthController::class, 'checkToken']);
    Route::post('logout', [AuthController::class, 'logout']);

    //Tareas
    Route::post('tasks', [TaskController::class, 'create']);
    Route::get('tasks', [TaskController::class, 'index']);
    Route::get('tasks/{id}', [TaskController::class, 'show']);
    Route::put('tasks/{id}', [TaskController::class, 'update']);
    Route::delete('tasks/{id}', [TaskController::class, 'destroy']);
});


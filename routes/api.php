<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);

Route::apiResources([
    'carreras' => App\Http\Controllers\CarreraController::class,
    'facultades' => App\Http\Controllers\FacultadController::class,
    'personal' => App\Http\Controllers\PersonalController::class,
    'personas' => App\Http\Controllers\PersonaController::class,
    'users' => App\Http\Controllers\UserController::class,

]);

<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test-user', [UsersController::class,'testUser']);
Route::get('/users', [UsersController::class,'index']);
Route::get('/users/{id}', [UsersController::class,'view']);
Route::post('/users', [UsersController::class,'create']);
Route::put('/users/{id}', [UsersController::class,'edit']);
Route::delete('/users/{id}',[UsersController::class,'delete']);
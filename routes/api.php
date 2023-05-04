<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PetController;
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
Route::get('/categories',[CategoryController::class, 'indexApi']);
Route::get('/orders',[OrderController::class, 'indexApi']);
Route::get('/pets',[PetController::class, 'indexApi']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

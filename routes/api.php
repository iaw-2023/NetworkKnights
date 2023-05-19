<?php

use App\Http\Controllers\Api\APICategoryController;
use App\Http\Controllers\Api\APIOrderController;
use App\Http\Controllers\Api\APIPetController;
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
Route::get('/categories', [APICategoryController:: class, 'index']);
Route::get('/categories/show/{id}', [APICategoryController:: class, 'show']);

Route::get('/orders',[APIOrderController::class, 'index']);

Route::get('/pets',[APIPetController::class, 'index']);
Route::get('/pets/show/{id}',[APIPetController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

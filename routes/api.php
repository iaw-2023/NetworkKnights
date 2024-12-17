<?php

use App\Http\Controllers\Api\APICategoryController;
use App\Http\Controllers\Api\APIOrderController;
use App\Http\Controllers\Api\APIPetController;
use App\Http\Controllers\Api\APIMercadoPagoController;
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
Route::get('/categories/{id}', [APICategoryController:: class, 'show']);

Route::post('/orders',[APIOrderController::class, 'store']);

Route::get('/pets',[APIPetController::class, 'index']);
Route::get('/pets/{id}',[APIPetController::class, 'show']);
Route::get('/pets/category/{categoryName}',[APIPetController::class,'getPetsByCategory']);

Route::post('/donacion',[APIMercadoPagoController::class, 'pago']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

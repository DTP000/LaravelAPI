<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\ProductApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/category/{category}', [CategoryApiController::class, 'get']);
Route::get('/category', [CategoryApiController::class, 'findID']);
Route::post('/categories', [CategoryApiController::class, 'store']);
Route::put('/categories/{category}', [CategoryApiController::class, 'update']);
Route::delete('/categories/{category}', [CategoryApiController::class, 'destroy']);

Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/find/{name}', [ProductApiController::class, 'find']);
Route::get('/product/{product}', [ProductApiController::class, 'get']);
Route::get('/product', [ProductApiController::class, 'findID']);
Route::get('/products/filter', [ProductApiController::class, 'filter']);
Route::get('/products/hot', [ProductApiController::class, 'hot']);
Route::post('/products', [ProductApiController::class, 'store']);
Route::put('/products/{product}', [ProductApiController::class, 'update']);
Route::delete('/products/{product}', [ProductApiController::class, 'destroy']);

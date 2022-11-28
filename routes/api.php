<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;


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

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/beverages', [MenuController::class, 'getBeverages']);
Route::get('/menu/foods', [MenuController::class, 'getFoods']);
Route::get('/menu/{id}', [MenuController::class, 'show']);

Route::get('/cart/{user_id}', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::put('/cart/{cart_id}', [CartController::class, 'update']);
Route::delete('/cart/{cart_id}', [CartController::class, 'destroy']);
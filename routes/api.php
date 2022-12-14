<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;


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
Route::get('/menu/beverages/paginated', [MenuController::class, 'getBeveragesPaginations']);
Route::get('/menu/beverages/search/{param}', [MenuController::class, 'searchBeveragesMenu']);
Route::get('/menu/beverages/category', [MenuController::class, 'searchCategoryBeveragesMenu']);
Route::get('/menu/beverages/{search}/category', [MenuController::class, 'searchCategoryBeveragesMenu']);
Route::get('/menu/filter', [MenuController::class, 'filterMenuData']);
Route::get('/menu/foods', [MenuController::class, 'getFoods']);
Route::get('/menu/foods/paginated', [MenuController::class, 'getFoodsPaginations']);
Route::get('/menu/foods/search/{param}', [MenuController::class, 'searchFoodsMenu']);
Route::get('/menu/{id}', [MenuController::class, 'show']);

Route::get('/cart/{user_id}', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::put('/cart/{cart_id}', [CartController::class, 'update']);
Route::delete('/cart/{cart_id}', [CartController::class, 'destroy']);

Route::post('/order', [OrderController::class, 'store']);

Route::post('/order_detail', [OrderDetailController::class, 'store']);
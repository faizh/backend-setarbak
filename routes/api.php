<?php

use App\Http\Controllers\AdminController;
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

Route::group(['prefix' => 'menu'], function() {
    Route::get('/', [MenuController::class, 'index']);
    Route::get('/beverages', [MenuController::class, 'getBeverages']);
    Route::get('/beverages/paginated', [MenuController::class, 'getBeveragesPaginations']);
    Route::get('/beverages/search/{param}', [MenuController::class, 'searchBeveragesMenu']);
    Route::get('/beverages/category', [MenuController::class, 'searchCategoryBeveragesMenu']);
    Route::get('/beverages/{search}/category', [MenuController::class, 'searchCategoryBeveragesMenu']);
    Route::get('/filter', [MenuController::class, 'filterMenuData']);
    Route::get('/foods', [MenuController::class, 'getFoods']);
    Route::get('/foods/paginated', [MenuController::class, 'getFoodsPaginations']);
    Route::get('/foods/search/{param}', [MenuController::class, 'searchFoodsMenu']);
    Route::get('/{id}', [MenuController::class, 'show']);
});

Route::group(['prefix' => 'cart'], function() {
    Route::get('/{user_id}', [CartController::class, 'index']);
    Route::post('', [CartController::class, 'store']);
    Route::put('/{cart_id}', [CartController::class, 'update']);
    Route::delete('/{cart_id}', [CartController::class, 'destroy']); 
});

Route::group(['prefix' => 'order'], function () {
    Route::post('/', [OrderController::class, 'store']);
});

Route::group(['prefix' => 'order_detail'], function () {
    Route::post('/', [OrderDetailController::class, 'store']);  
});

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [AdminController::class, 'getUsers']);
        Route::get('/{id}', [AdminController::class, 'getUser']);
        Route::put('/{id}', [AdminController::class, 'updateUser']);
        Route::delete('/{id}', [AdminController::class, 'destroyUser']);
        Route::post('/', [AdminController::class, 'storeUser']);
    });

    Route::group(['prefix' => 'products'], function() {
       Route::get('/', [AdminController::class, 'getProducts']); 
       Route::get('/{productId}', [AdminController::class, 'getProduct']);
       Route::post('/', [AdminController::class, 'storeProduct']);
       Route::put('/{productId}', [AdminController::class, 'updateProduct']);
       Route::delete('/{productId}', [AdminController::class, 'destroyProduct']);
    });

    Route::group(['prefix' => 'orders'], function () {
       Route::get('/', [AdminController::class, 'getOrders']);
       Route::get('/{orderId}', [AdminController::class, 'getOrder']);
       Route::delete('/{orderId}', [AdminController::class, 'destroyOrder']);
    });

    Route::get('/roles', [AdminController::class, 'getRoles']);
    Route::get('/categories', [AdminController::class, 'getCategories']);
    Route::get('/sub_categories/{categoryId}', [AdminController::class, 'getSubCategories']);
});
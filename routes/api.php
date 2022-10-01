<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
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


Route::group(['middleware' => 'auth:sanctum'], function (){

    Route::get('/products', [ProductsController::class,'index']);
    Route::get('/products/show', [ProductsController::class,'show']);
    Route::post('/products', [ProductsController::class,'store']);
    Route::post('/products/update', [ProductsController::class,'update']);
    
});



Route::post('/login', [AuthController::class,'authenticate']);
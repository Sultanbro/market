<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/category',[CategoryController::class,'getCategory']);
    Route::get('/order/user/{user_id}',[OrderController::class,'orderUser']);
});
Route::get('/add/{id}',[CartController::class,'add']);
Route::post('/update',[CartController::class,'update']);
Route::delete('/remove/{id}',[CartController::class,'remove']);
Route::resource('/order',OrderController::class);

Route::get('/product',[ProductController::class,'productFilter']);

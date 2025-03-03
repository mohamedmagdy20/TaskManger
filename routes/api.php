<?php

use App\Http\Controllers\AuthController;
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

Route::post('/login',[AuthController::class,'login']);
Route::post('/regsiter',[AuthController::class,'register']);

Route::group(['middleware'=>'auth:sanctum'],function(){

    Route::group(['controller'=>AuthController::class],function()
    {
        Route::delete('logout','logout');
    });
});
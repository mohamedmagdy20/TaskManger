<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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
        Route::get('users','all');
        Route::delete('logout','logout');
    });

    Route::group(['controller'=>TaskController::class,'prefix'=>'tasks'],function()
    {
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/','store');
        Route::put('/{id}','update');
        Route::delete('/{id}','delete');
    });
});
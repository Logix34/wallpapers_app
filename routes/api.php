<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WallpaperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//*******   Public Routes
Route::post('signup',[UserController::class,'signup']);
Route::post('login',[UserController::class,'postLogin']);
Route::post('/forget',[UserController::class,'forgetPassword']);
Route::post('/change/password',[UserController::class,'changePassword']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    //Protected Routes//
    Route::post('/logout',[UserController::class,'logout']);
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('category/randomWallpapers',[WallpaperController::class,'index']);
    Route::get('/wallpapersByCategory',[WallpaperController::class,'wallpapersByCategory']);
});

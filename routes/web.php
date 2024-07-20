<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\WallpaperController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//Public Routes//
Route::view('login', 'login')->name('login');
Route::post('login', [AdminController::class, 'postLogin'])->name('postLogin');


//Protected Routes//
Route::group(['middleware' => 'auth'], function() {
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

                                            //Begin:: Category Routes Section//
    Route::get('/categories',[CategoriesController::class,'index'])->name('Category');
    Route::post('category/add', [CategoriesController::class,'store'])->name('storecategory');
    Route::get('category/edit/{id}', [CategoriesController::class,'edit'])->name('showcategory');
    Route::post('category/update', [CategoriesController::class,'update'])->name('updatecategory');
    Route::get('category/delete/{id}', [CategoriesController::class,'destroy'])->name('deletecategory');
                                          //end:: Category Routes Section//
});
Route::group(['middleware' => 'auth'], function() {
    //Begin:: Category wallpapers Routes Section//
    Route::get('/wallpaper',[WallpaperController::class,'index'])->name('Wallpaper');
    Route::post('/wallpaper/add', [WallpaperController::class, 'store'])->name('Add_Wallpaper');
    Route::get('/wallpaper/edit/{id}', [WallpaperController::class,'edit'])->name('showWallpaper');
    Route::post('wallpaper/update', [WallpaperController::class,'update'])->name('updateWallpaper');
    Route::get('wallpaper/delete/{id}', [WallpaperController::class,'destroy'])->name('deleteWallpaper');




});



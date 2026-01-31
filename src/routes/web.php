<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

Route::get('/products',[ProductController::class,'index']);
Route::get('/products/search',[ProductController::class,'search']);
Route::get('/products/register',[ProductController::class,'create']);
Route::post('/products/register',[ProductController::class,'store']);
Route::post('/products/detail',[ProductController::class,'edit']);
Route::patch('/products/{:productId}/update',[ProductController::class,'update']);
Route::delete('/products/delete', [ProductController::class, 'destroy']);

// 画像アップロード用画面
Route::post('/image',[ImageController::class,'store']);
Route::get('/image',[ImageController::class,'create']);


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
    return view('welcome');
});

<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\UserController;
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
Route::middleware(['auth:sanctum','psikolog'])->group(function() {
    Route::post('/article/add', [ArticleController::class,'store']);
    Route::put('/article/ubah/{id}', [ArticleController::class,'update']);
    Route::get('/article/user/{userID}',[ArticleController::class,'getArticleUser']);
});
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/logout',[UserController::class,'logout']);
});

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('/metode/add', [MetodePembayaranController::class,'store']);
Route::get('/metode', [MetodePembayaranController::class,'index']);
Route::get('/psikolog',[PsikologController::class,'index']);
Route::get('/category',[CategoryController::class,'index']);
Route::post('/category/add', [CategoryController::class,'store']);
Route::get('/article', [ArticleController::class,'index']);



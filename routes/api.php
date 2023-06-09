<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentarController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\SesiWaktuController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'psikolog'])->group(function () {
    Route::post('/article/add', [ArticleController::class, 'store']);
    Route::put('/article/ubah/{id}', [ArticleController::class, 'update']);
    Route::delete('/article/{id}', [ArticleController::class, 'delete']);

    Route::get('/article/user/{userID}', [ArticleController::class, 'getArticleUser']);
    Route::get('/sesi-waktu/{userID}', [SesiWaktuController::class, 'index']);

    Route::post('/sesi-waktu/add', [SesiWaktuController::class, 'store']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/community/', [CommunityController::class, 'index']);

    Route::post('/community/add', [CommunityController::class, 'store']);
    Route::get('/commentar/{id}', [CommentarController::class, 'index']);

    Route::post('/commentar/add/{id}', [CommentarController::class, 'store']);

    Route::post('/commentar/add/{id}', [CommentarController::class, 'store']);


});
Route::middleware(['auth:sanctum', 'pengguna'])->group(function () {
    Route::post('/pemesanan/add/', [PemesananController::class, 'store']);
    Route::get('/invoice/', [PemesananController::class, 'index']);


});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('/metode/add', [MetodePembayaranController::class, 'store']);
Route::get('/metode', [MetodePembayaranController::class, 'index']);
Route::get('/psikolog', [PsikologController::class, 'index']);
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/add', [CategoryController::class, 'store']);
Route::get('/article', [ArticleController::class, 'index']);

<?php

use App\Http\Controllers\Api\UserContoller;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaApiController;
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
// Auth
Route::prefix('auth')->group(function () {
    Route::controller(UserContoller::class)->group(function () {
        Route::post('verif', 'verif');
        Route::post('register', 'register')->middleware('auth:sanctum');
        Route::post('logout', 'logout')->middleware('auth:sanctum');
    });
});
Route::resource('user', UserContoller::class)->middleware(['auth:sanctum', 'role:2']);
Route::resource('profile', ProfileController::class)->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('admin')->group(function () {
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth:api');

});

Route::prefix('admin')->middleware('auth:api','role:admin')->group(function () {
    Route::get('/user', [AdminController::class, 'index']);
    Route::get('/user/{id}', [AdminController::class, 'show']);
});

Route::prefix('admin')->middleware('auth:api','role:admin,humas')->group(function () {
    Route::post('/berita/create', [BeritaApiController::class, 'store']);
    Route::post('/berita/{id}', [BeritaApiController::class, 'update']);
    Route::delete('/berita/{id}', [BeritaApiController::class, 'destroy']);
});

Route::get('/berita', [BeritaApiController::class, 'index']);
Route::get('/berita/{id}', [BeritaApiController::class, 'show']);

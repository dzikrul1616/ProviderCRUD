<?php

use App\Http\Controllers\Api\UserContoller;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Admin\UserController;
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
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:api');

    // Route::middleware(['auth:admin', 'admin'])->group(function () {
    //     // your admin routes here
    //     Route::post('/logout',  [UserController::class, 'logout']);
    // });
});

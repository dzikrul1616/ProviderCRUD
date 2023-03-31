<?php

use App\Http\Controllers\Api\UserContoller;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
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
Route::get('users', [AuthController::class, 'getUser']);
// Auth
Route::post('beritas', [BeritaController::class, 'store']);
Route::get('beritas', [BeritaController::class, 'index']);
Route::delete('beritas/{id}', [BeritaController::class, 'destroy']);

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

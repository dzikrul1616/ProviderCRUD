<?php

use App\Http\Controllers\Api\UserContoller;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
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
// Auth user
Route::get('users', [AuthController::class, 'getUser']);
Route::post('cek_login', [AuthController::class, 'auth']);
Route::get('users/{id}', [AuthController::class, 'getUserById']);

//deletediadmin
Route::delete('delete/{id}', [AuthController::class, 'deleteadmin']);


Route::post('penjemputan/{id}', [UserContoller::class, 'update_penjemputan']);
Route::post('verified/{id}', [UserContoller::class, 'update_verified']);


// berita
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


Route::prefix('admin')->group(function () {
    Route::post('/register', [AdminAuthController::class, 'register']);
     Route::post('/login', [AdminAuthController::class, 'login']);
     Route::post('/logout', [AdminAuthController::class, 'logout']);
    // Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth:api');

    // Route::middleware(['auth:admin', 'admin'])->group(function () {
    //     // your admin routes here
    //     Route::post('/logout',  [UserController::class, 'logout']);
    // });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

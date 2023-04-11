<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
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
Route::get('/inklusi', function () {
    return view('inner');
});
Route::controller(BeritaController::class)->group(function () {
    Route::get('detail-berita/{id}', 'details');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/post-register', 'storeRegister');
    Route::post('cek_login', 'auth');
});
Route::get('auth/google', [UserContoller::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [UserContoller::class, 'handleGoogleCallback']);

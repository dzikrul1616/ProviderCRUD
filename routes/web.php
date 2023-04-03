<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserContoller;
use App\Http\Controllers\AuthController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login');
    Route::get('/register', 'register');
    Route::post('/post-register', 'storeRegister');
    Route::post('cek_login', 'auth');
});
Route::get('auth/google', [UserContoller::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [UserContoller::class, 'handleGoogleCallback']);

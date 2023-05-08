<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\pendidikanController;


Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::get('users/{id}', 'getUserById');
    Route::post('users', 'store');
    Route::post('users/{id}', 'update');
    Route::delete('users/{id}', 'deleteadmin');
});
Route::delete('delete/{id}', [PekerjaanController::class, 'deletePekerjaan']);
Route::get('pekerjaan/{user_id}', [PekerjaanController::class, 'getPekerjaByUserId']);
Route::get('pendidikan', [pendidikanController::class, 'getPendidikan']);
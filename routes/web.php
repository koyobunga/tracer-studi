<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Alumni;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index']);
Route::post('signin/auth', [LoginController::class, 'signin']);

Route::middleware(Admin::class)->group(function(){
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/signout', [LoginController::class, 'signout']);
    Route::resource('admin/info', InfoController::class);
    Route::resource('/admin/alumni', AlumniController::class);
    Route::resource('admin/user', UserController::class);
});

Route::middleware(Alumni::class)->group(function(){
    Route::get('alumni', [PenggunaController::class, 'index']);
    Route::get('alumni/profile', [PenggunaController::class, 'profile']);
    Route::get('alumni/signout', [LoginController::class, 'signout']);
});

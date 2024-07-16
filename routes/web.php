<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Alumni;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index']);
Route::post('signin/auth', [LoginController::class, 'signin']);

Route::middleware(Admin::class)->group(function(){
    Route::get('admin', [AdminController::class, 'index']);
    Route::get('admin/signout', [LoginController::class, 'signout']);
    Route::get('admin/laporan', [AdminController::class, 'laporan']);
    Route::get('admin/laporan/print', [AdminController::class, 'laporan_print']);
    Route::resource('admin/info', InfoController::class);
    Route::resource('/admin/alumni', AlumniController::class);
    Route::resource('admin/user', UserController::class);
    
    Route::resource('admin/pesan', PesanController::class);
    
});

Route::middleware(Alumni::class)->group(function(){
    Route::get('alumni', [PenggunaController::class, 'index']);
    Route::get('alumni/profile', [PenggunaController::class, 'profile']);
    Route::post('alumni/profile/foto', [PenggunaController::class, 'profile_foto']);
    Route::put('alumni/profile/post', [PenggunaController::class, 'profile_post']);
    Route::get('alumni/show/{alumni:id}', [PenggunaController::class, 'show']);
    
    Route::get('alumni/pesan', [PenggunaController::class, 'pesan']);
    Route::post('alumni/pesan/post', [PenggunaController::class, 'pesan_post']);
    
    Route::resource('alumni/riwayat', RiwayatController::class);
    Route::get('alumni/signout', [LoginController::class, 'signout']);
});

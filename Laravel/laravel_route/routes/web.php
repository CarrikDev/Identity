<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/', '/home');

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/data', [SiswaController::class, 'getData']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit']);
Route::put('/siswa/{siswa}', [SiswaController::class, 'update']);
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy']);

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.admin_home');
});

Route::middleware(['role:siswa'])->group(function () {
    Route::get('/pengaduan', [JurusanController::class, 'insert_pengaduan']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

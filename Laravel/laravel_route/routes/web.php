<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/data_siswa', [App\Http\Controllers\HomeController::class, 'data_siswa'])->name('admin.data_siswa');
Route::get('/input_data_siswa', [App\Http\Controllers\HomeController::class, 'input_data_siswa'])->name('admin.input_data_siswa');

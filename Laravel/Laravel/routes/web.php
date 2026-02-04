<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ComplainController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/store', [SiswaController::class, 'store']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/data_siswa', [SiswaController::class, 'index'])->name('data_siswa');
Route::get('/input_data', [SiswaController::class, 'create'])->name('input_data');
Route::post('/store_siswa', [SiswaController::class, 'store_siswa'])->name('store_siswa');

// Routes untuk Jurusan
Route::get('/data_jurusan', [JurusanController::class, 'index'])->name('data_jurusan');
Route::get('/input_jurusan', [JurusanController::class, 'create'])->name('input_jurusan');
Route::post('/store_jurusan', [JurusanController::class, 'store'])->name('store_jurusan');

Route::get('/input_pengaduan', [HomeController::class, 'input_pengaduan'])->name('admin.insert_pengaduan');
Route::post('/store_pengaduan', [HomeController::class, 'store_pengaduan'])->name('admin.store_pengaduan');

Route::get('/admin', function () {return view('admin.tes');})->name('admin.page');

Route::get('/list_aspirasi', [ComplainController::class, 'index'])->name('admin.list_aspirasi');
// Gunakan PUT agar sesuai dengan @method('PUT') di view
Route::put('/update_aspirasi/status/{id}', [ComplainController::class, 'status'])->name('admin.update_status');

Route::post('/update_aspirasi/feedback/{id}', [ComplainController::class, 'feedback'])->name('admin.feedback');

Route::post('/aspirasi/{id}/reject', [AspirasiController::class, 'reject'])
    ->name('aspirasi.reject');

// Menggunakan Route Name
Route::get('/detail_aspirasi/{id}', [HomeController::class, 'detail_aspirasi'])->name('aspirasi.detail');

Route::get('/laporan_aspirasi', [HomeController::class, 'laporan_aspirasi'])->name('admin.Laporan');

Route::get('/history_siswa', [ComplainController::class, 'history'])->name('admin.history');

// Route::get('/list_aspirasi', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.list_aspirasi');

// Route::get('/Siswa/create', [SiswaController::class, 'create']);
// Route::post('/Siswa', [SiswaController::class, 'store']);


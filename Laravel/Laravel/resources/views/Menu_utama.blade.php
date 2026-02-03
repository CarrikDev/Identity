@extends('adminlte::page')

@section('title', 'Selamat Datang')

@section('content_header')
<div class="text-center mb-4">
    <h1 class="font-weight-bold text-primary">
        <i class="fas fa-school mr-2"></i>
        Selamat Datang
    </h1>
    <p class="text-muted">
        Sistem Informasi Manajemen Sekolah
    </p>
</div>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card card-outline card-primary shadow-lg">
            <div class="card-body text-center py-5">

                <i class="fas fa-users fa-4x text-primary mb-4"></i>

                <h3 class="font-weight-bold mb-3">
                    Aplikasi Data Siswa
                </h3>

                <p class="text-muted px-4">
                    Aplikasi ini digunakan untuk mengelola data siswa sekolah,
                    mulai dari melihat data siswa, menambahkan data baru,
                    hingga pengelolaan jurusan dan pengaduan.
                </p>

                <a href="/Home" class="btn btn-primary btn-lg mt-4 px-5">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk ke Aplikasi
                </a>

            </div>
        </div>

        <div class="alert alert-info mt-4 text-center shadow-sm">
            <i class="fas fa-info-circle mr-1"></i>
            Pastikan Anda memiliki hak akses sebelum masuk ke sistem.
        </div>

    </div>
</div>
@stop

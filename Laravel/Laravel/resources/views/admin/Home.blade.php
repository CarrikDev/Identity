@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<div class="text-center mb-4">
    @can("isSiswa")
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-home mr-2"></i>
        Dashboard Siswa
    </h2>
    <p class="text-muted">
        Selamat datang di Dashboard Siswa
    </p>
    @endcan
    @can("isAdmin")
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-home mr-2"></i>
        Dashboard Admin
    </h2>
    <p class="text-muted">
        Selamat datang di Dashboard Admin
    </p>
    @endcan
</div>
@stop

@section('content')
@can('isSiswa')
<div class="row">
    {{-- INPUT DATA SISWA --}}
    <div class="col-md-6">
        <div class="small-box bg-primary shadow-lg">
            <div class="inner">
                <h4 class="font-weight-bold">Input Data Siswa</h4>
                <p>Tambahkan data siswa baru</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="/input_data" class="small-box-footer font-weight-bold">
                Tambah Data <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- INPUT JURUSAN --}}
    <div class="col-md-6">
        <div class="small-box bg-success shadow-lg">
            <div class="inner">
                <h4 class="font-weight-bold">Input Jurusan</h4>
                <p>Kelola & tambahkan jurusan</p>
            </div>
            <div class="icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <a href="/input_jurusan" class="small-box-footer font-weight-bold">
                Tambah Jurusan <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</div>

<div class="row mt-3">

    {{-- INPUT PENGADUAN --}}
    <div class="col-md-12">
        <div class="small-box bg-warning shadow-lg">
            <div class="inner">
                <h4 class="font-weight-bold">Input Pengaduan</h4>
                <p>Sampaikan aspirasi atau keluhan sarana sekolah</p>
            </div>
            <div class="icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <a href="/input_pengaduan" class="small-box-footer font-weight-bold">
                Buat Pengaduan <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</div>

<div class="alert alert-info mt-4 shadow-sm">
    <i class="fas fa-info-circle mr-1"></i>
    Gunakan dashboard ini untuk mengelola data siswa, jurusan, dan pengaduan sekolah.
</div>
@endcan
@can("isAdmin")
<div class="row">
    {{-- INPUT DATA SISWA --}}
    <div class="col-md-12">
        <div class="small-box bg-primary shadow-lg">
            <div class="inner">
                <h4 class="font-weight-bold">List Aspirasi</h4>
                <p>Lihat dan kelola aspirasi siswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-list"></i>
            </div>
            <a href="/list_aspirasi" class="small-box-footer font-weight-bold">
                Lihat Aspirasi <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row mt-3">

    {{-- INPUT PENGADUAN --}}
    <div class="col-md-12">
        <div class="small-box bg-warning shadow-lg">
            <div class="inner">
                <h4 class="font-weight-bold">Laporan Data Kategori</h4>
                <p>Lihat laporan data kategori</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <a href="/laporan_aspirasi" class="small-box-footer font-weight-bold">
                Lihat Laporan <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</div>

<div class="alert alert-info mt-4 shadow-sm">
    <i class="fas fa-info-circle mr-1"></i>
    Gunakan dashboard ini untuk mengelola List Aspirasi, Detail, dan Laporan.
</div>
@endcan
@stop

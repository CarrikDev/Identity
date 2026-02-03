@extends('adminlte::page')

@section('title', 'Input Jurusan')

@section('content_header')
<div class="text-center mb-4">
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-layer-group mr-2"></i>
        Input Data Jurusan
    </h2>
    <p class="text-muted mb-0">
        Form penambahan data jurusan sekolah
    </p>
</div>
@stop

@section('content')

<div class="card shadow-sm">
    {{-- HEADER CARD --}}
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 font-weight-bold">
            <i class="fas fa-edit mr-2"></i>
            Form Input Jurusan
        </h5>
    </div>

    {{-- BODY --}}
    <div class="card-body px-4 py-4">
        <form action="{{ route('store_jurusan') }}" method="POST">
            @csrf

            {{-- KODE JURUSAN --}}
            <div class="form-group">
                <label class="font-weight-bold">
                    <i class="fas fa-code mr-1 text-primary"></i>
                    Kode Jurusan
                </label>
                <input type="text"
                       name="kode_jurusan"
                       class="form-control form-control-lg @error('kode_jurusan') is-invalid @enderror"
                       placeholder="Contoh: RPL, AKL, TKJ"
                       value="{{ old('kode_jurusan') }}"
                       required>
                @error('kode_jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- NAMA JURUSAN --}}
            <div class="form-group">
                <label class="font-weight-bold">
                    <i class="fas fa-graduation-cap mr-1 text-primary"></i>
                    Nama Jurusan
                </label>
                <input type="text"
                       name="nama_jurusan"
                       class="form-control form-control-lg @error('nama_jurusan') is-invalid @enderror"
                       placeholder="Contoh: Rekayasa Perangkat Lunak"
                       value="{{ old('nama_jurusan') }}"
                       required>
                @error('nama_jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    </div>

    {{-- FOOTER --}}
    <div class="card-footer d-flex justify-content-between align-items-center bg-light">
        <a href="{{ route('data_jurusan') }}" class="btn btn-outline-secondary btn-lg">
            <i class="fas fa-arrow-left mr-1"></i>
            Kembali
        </a>

        <button type="submit" class="btn btn-primary btn-lg px-4">
            <i class="fas fa-save mr-1"></i>
            Simpan Jurusan
        </button>
    </div>
        </form>
</div>

{{-- INFO --}}
<div class="alert alert-info mt-3 shadow-sm">
    <i class="fas fa-info-circle mr-1"></i>
    Pastikan kode jurusan <b>unik</b> dan nama jurusan ditulis lengkap.
</div>

@stop
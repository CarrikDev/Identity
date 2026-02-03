@extends('adminlte::page')

@section('title', 'Input Data Siswa')

@section('content_header')
<div class="text-center mb-4">
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-user-plus mr-2"></i>
        Input Data Siswa
    </h2>
    <p class="text-muted mb-0">
        Form penambahan data siswa sekolah
    </p>
</div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card card-outline card-primary shadow-sm">

            {{-- HEADER --}}
            <div class="card-header bg-white">
                <h4 class="mb-0 font-weight-bold">
                    <i class="fas fa-edit mr-2 text-primary"></i>
                    Form Input Siswa
                </h4>
            </div>

            {{-- BODY --}}
            <div class="card-body px-4">

                <form action="{{ route('store_siswa') }}" method="POST">
                    @csrf

                    {{-- NIS --}}
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="fas fa-id-card mr-1 text-secondary"></i>
                            NIS
                        </label>
                        <input type="text"
                               name="nis"
                               class="form-control form-control-lg"
                               placeholder="Masukkan NIS siswa"
                               required>
                    </div>

                    {{-- NAMA --}}
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="fas fa-user mr-1 text-secondary"></i>
                            Nama Lengkap
                        </label>
                        <input type="text"
                               name="nama"
                               class="form-control form-control-lg"
                               placeholder="Masukkan nama lengkap siswa"
                               required>
                    </div>

                    {{-- KELAS --}}
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="fas fa-school mr-1 text-secondary"></i>
                            Kelas
                        </label>
                        <select name="kelas" class="form-control form-control-lg" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>

                    {{-- JURUSAN --}}
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="fas fa-layer-group mr-1 text-secondary"></i>
                            Jurusan
                        </label>
                        <select name="jurusan" class="form-control form-control-lg" required>
                            <option value="">-- Pilih Jurusan --</option>

                            @if(isset($jurusans) && $jurusans->count() > 0)
                                @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->kode_jurusan }}">
                                        {{ $jurusan->kode_jurusan }} - {{ $jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            @else
                                <option value="RPL">RPL</option>
                                <option value="AKT">AKT</option>
                                <option value="MP">MP</option>
                                <option value="TKJ">TKJ</option>
                            @endif
                        </select>

                        <small class="text-muted">
                            <i class="fas fa-plus-circle"></i>
                            <a href="{{ route('input_jurusan') }}">Tambah Jurusan Baru</a>
                        </small>
                    </div>

            </div>

            {{-- FOOTER --}}
            <div class="card-footer d-flex justify-content-between bg-light">
                <a href="{{ route('data_siswa') }}" class="btn btn-outline-secondary btn-lg">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>

                <button type="submit" class="btn btn-primary btn-lg px-4">
                    <i class="fas fa-save mr-1"></i> Simpan Data
                </button>
            </div>

                </form>
        </div>

        <div class="alert alert-info mt-4 shadow-sm">
            <i class="fas fa-info-circle mr-1"></i>
            Pastikan data siswa diisi dengan benar dan lengkap.
        </div>

    </div>
</div>

@stop

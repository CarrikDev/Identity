@extends('adminlte::page')

@section('title', 'Data Siswa')

@section('content_header')
<div class="text-center mb-4">
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-users mr-2"></i>
        Data Siswa
    </h2>
    <p class="text-muted mb-0">
        Daftar seluruh siswa yang terdaftar di sekolah
    </p>
</div>
@stop

@section('content')

{{-- ALERT --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle mr-1"></i>
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card shadow-sm">

    {{-- HEADER --}}
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 font-weight-bold">
            <i class="fas fa-user-graduate mr-2"></i>
            Tabel Data Siswa
        </h5>

        <a href="/input_data" class="btn btn-dark btn-sm">
            <i class="fas fa-plus-circle mr-1"></i>
            Tambah Data
        </a>
    </div>

    {{-- BODY --}}
    <div class="card-body px-4">

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">NIS</th>
                        <th>Nama Siswa</th>
                        <th width="10%">Kelas</th>
                        <th width="15%">Jurusan</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($siswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <span class="badge badge-secondary px-3 py-2">
                                    {{ $item->nis }}
                                </span>
                            </td>

                            <td class="text-left font-weight-bold">
                                {{ $item->nama_siswa }}
                            </td>

                            <td>
                                <span class="badge badge-info px-3 py-2">
                                    {{ $item->kelas }}
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-success px-3 py-2">
                                    {{ $item->jurusan }}
                                </span>
                            </td>

                            <td>
                                <a href="#" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted py-4">
                                <i class="fas fa-info-circle"></i>
                                Belum ada data siswa
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    {{-- FOOTER --}}
    <div class="card-footer bg-light">
        <i class="fas fa-info-circle text-primary"></i>
        Data siswa digunakan untuk keperluan administrasi sekolah.
    </div>
</div>

@stop

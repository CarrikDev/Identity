@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<div class="text-center mb-4">
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-file-alt mr-2"></i>
        Laporan Data Kategori
    </h2>
    <p class="text-muted">
        sistem informasi manajemen
    </p>
</div>
@stop

@section('content')
<div class="container mt-5">

    <!-- CARD LAPORAN -->
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Daftar Kategori</h5>
        </div>

        <div class="card-body">

            <!-- TOMBOL -->
            <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">
                    Total Data: <strong>{{ $kategoris->count() }}</strong>
                </span>
                <button onclick="window.print()" class="btn btn-outline-primary btn-sm">
                    🖨️ Cetak
                </button>
            </div>

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Kategori</th>
                            <th width="180">Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoris as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td class="text-center">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Data belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="text-center text-muted mt-4">
        <small>© {{ date('Y') }} Laporan Sistem</small>
    </div>

</div>

@stop

@section('style')
    <style>
        body {
            background: #f4f6f9;
        }
        .card-header {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            color: white;
        }
    </style>
@stop
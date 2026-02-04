@extends('adminlte::page')

@section('title', 'History Pengaduan')

@section('content_header')
<div class="text-center mb-4">
    <h1 class="font-weight-bold text-primary mb-2">
        <i class="fas fa-clipboard-list mr-2"></i>
        History Pengaduan
    </h1>
    <h5 class="text-secondary">
        Daftar seluruh pengaduan sarana sekolah yang pernah Anda kirim
    </h5>
</div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-11">

        <div class="card card-outline card-primary shadow">
            <div class="card-header bg-white">
                <h4 class="mb-0 font-weight-bold">
                    <i class="fas fa-history mr-2 text-primary"></i>
                    Riwayat Pengaduan Sarana Sekolah
                </h4>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0">
                        <thead class="bg-primary text-white">
                            <tr class="text-center">
                                <th style="width: 25%">Judul Pengaduan</th>
                                <th style="width: 15%">Kategori</th>
                                <th style="width: 15%">Status</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($complaints as $complaint)
                            <tr>
                                {{-- JUDUL --}}
                                <td class="font-weight-bold">
                                    {{ $complaint->title }}
                                </td>

                                {{-- KATEGORI --}}
                                <td class="text-center font-weight-bold">
                                    <span class="badge badge-info px-3 py-2">
                                        {{ $complaint->category->nama_kategori }}
                                    </span>
                                </td>

                                {{-- STATUS --}}
                                <td class="text-center font-weight-bold">
                                    @if($complaint->status == 'Baru')
                                        <span class="badge badge-warning px-3 py-2">
                                            <i class="fas fa-clock mr-1"></i> BARU
                                        </span>
                                    @elseif($complaint->status == 'Diproses')
                                        <span class="badge badge-primary px-3 py-2">
                                            <i class="fas fa-sync mr-1"></i> DIPROSES
                                        </span>
                                    @elseif($complaint->status == 'Selesai')
                                        <span class="badge badge-success px-3 py-2">
                                            <i class="fas fa-check mr-1"></i> SELESAI
                                        </span>
                                    @else
                                        <span class="badge badge-secondary px-3 py-2">
                                            {{ strtoupper($complaint->status) }}
                                        </span>
                                    @endif
                                </td>

                                {{-- DESKRIPSI --}}
                                <td style="font-size: 16px;">
                                    {{ $complaint->description ?? 'Belum ada deskripsi pengaduan.' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <h4 class="text-muted">
                                        <i class="fas fa-inbox mr-2"></i>
                                        Belum Ada History Pengaduan
                                    </h4>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="card-footer bg-light">
                <h6 class="mb-0">
                    <i class="fas fa-info-circle mr-1 text-primary"></i>
                    Data ini menampilkan seluruh pengaduan yang telah dikirim oleh pengguna.
                </h6>
            </div>
        </div>

    </div>
</div>

@stop

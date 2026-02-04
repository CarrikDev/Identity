@extends('adminlte::page')

@section('title', 'Detail Pengaduan Siswa')

@section('content_header')
    <h3 class="text-center font-weight-bold">
        <i class="fas fa-file-alt mr-1"></i> Detail Pengaduan Siswa
    </h3>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">

        {{-- FORM DETAIL PENGADUAN --}}
        <div class="card card-info card-outline shadow-sm">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-info-circle mr-1"></i> Data Pengaduan: <strong>{{ $aspirasi->user->name }}</strong>
                </h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Judul Pengaduan</label>
                    <input type="text" value="{{ $aspirasi->title }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Pengaduan</label>
                    <textarea class="form-control" rows="4" readonly>{{ $aspirasi->description }}</textarea>
                </div>
                
                @if($aspirasi->image)
                <div class="form-group">
                    <label>Lampiran Foto</label><br>
                    <img src="{{ asset('storage/' . $aspirasi->image) }}" class="img-fluid rounded border" style="max-height: 300px">
                </div>
                @endif
            </div>
        </div>

        {{-- UPDATE STATUS --}}
        <div class="card card-warning card-outline shadow-sm mt-3">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-sync-alt mr-1"></i> Ubah Status Pengaduan
                </h5>
            </div>
            <div class="card-body">
                <!-- Pastikan action ini sesuai dengan route update kamu -->
                <form method="POST" action="{{ route('admin.update_status', $aspirasi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Status Pengaduan</label>
                        <select name="status" class="form-control">
                            <option value="baru" {{ $aspirasi->status == 'baru' ? 'selected' : '' }}>Baru</option>
                            <option value="diproses" {{ $aspirasi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $aspirasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Update Status
                    </button>
                    <a href="/aspirasi" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>

        {{-- FEEDBACK (Jika ingin disimpan ke tabel terpisah) --}}
        <div class="card card-primary card-outline shadow-sm mt-3">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-comment-dots mr-1"></i> Umpan Balik
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.feedback', $aspirasi->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Pesan Feedback</label>
                        <textarea name="feedback" class="form-control" rows="4"
                            placeholder="Tulis umpan balik untuk siswa...">{{ $aspirasi->feedback ? $aspirasi->feedback->message : '' }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane mr-1"></i> Kirim Feedback
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@stop

@section('css')
<style>
    label { font-weight: 600; }
    .card-title { font-weight: bold; }
</style>
@stop

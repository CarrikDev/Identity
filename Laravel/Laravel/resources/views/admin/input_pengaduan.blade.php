@extends('adminlte::page')

@section('title', 'Form Pengaduan')

@section('content_header')
<div class="text-center mb-4">
    <h2 class="font-weight-bold text-primary mb-1">
        <i class="fas fa-bullhorn mr-2"></i>
        Form Pengaduan Sarana Sekolah
    </h2>
    <p class="text-muted mb-2">
        Sampaikan aspirasi atau pengaduan terkait fasilitas sekolah
    </p>

    <span class="badge badge-primary px-3 py-2">
        <i class="fas fa-edit mr-1"></i> Form Aktif
    </span>
</div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card card-outline card-primary shadow-sm">

            {{-- HEADER --}}
            <div class="card-header bg-white">
                <h4 class="mb-0 font-weight-bold">
                    <i class="fas fa-clipboard-list mr-2 text-primary"></i>
                    Isi Aspirasi / Pengaduan
                </h4>
            </div>

            <form method="POST" action="{{ route('admin.store_pengaduan') }}">
                @csrf

                {{-- BODY --}}
                <div class="card-body px-4">

                    {{-- KATEGORI --}}
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="fas fa-list mr-1 text-secondary"></i>
                            Kategori Pengaduan
                        </label>
                        <select name="category_id"
                                class="form-control form-control-lg"
                                required>
                            <option value="" selected disabled>-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">
                            Pilih kategori sesuai jenis pengaduan
                        </small>
                    </div>

                    {{-- JUDUL --}}
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="fas fa-heading mr-1 text-secondary"></i>
                            Judul Pengaduan
                        </label>
                        <input type="text"
                               name="title"
                               class="form-control form-control-lg"
                               placeholder="Contoh: Kursi kelas rusak"
                               required>
                        <small class="text-muted">
                            Gunakan judul singkat dan jelas
                        </small>
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="form-group">
                        <label class="font-weight-bold">
                            <i class="fas fa-align-left mr-1 text-secondary"></i>
                            Deskripsi Lengkap
                        </label>
                        <textarea name="description"
                                  rows="5"
                                  class="form-control form-control-lg"
                                  placeholder="Jelaskan secara detail kondisi sarana yang ingin diadukan..."
                                  required></textarea>
                        <small class="text-muted">
                            Sertakan lokasi dan kondisi agar mudah ditindaklanjuti
                        </small>
                    </div>

                </div>

                {{-- FOOTER --}}
                <div class="card-footer d-flex justify-content-between bg-light">
                    <button type="reset" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-undo mr-1"></i> Reset
                    </button>

                    <button type="submit" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-paper-plane mr-1"></i> Kirim Pengaduan
                    </button>
                </div>

            </form>
        </div>

        {{-- INFO --}}
        <div class="alert alert-info mt-4 shadow-sm">
            <i class="fas fa-info-circle mr-1"></i>
            Pastikan pengaduan diisi dengan jelas agar dapat segera ditindaklanjuti oleh admin.
        </div>

    </div>
</div>

@stop

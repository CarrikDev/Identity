@extends('layout.app')

@section('content')
<div class="container-fluid px-4">
    <div class="row justify-content-center">
        <div class="col-xl-11 mt-4">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="mb-1">Data Siswa</h3>
                    <small class="text-muted">Daftar siswa yang terdaftar</small>
                </div>

                <a href="/input_data_siswa" class="btn btn-success">
                    <i class="fas fa-user-plus mr-1"></i> Tambah Siswa
                </a>
            </div>

            {{-- Empty state --}}
            <div id="empty-state"
                 class="card border-0 shadow-sm {{ $data->isEmpty() ? '' : 'd-none' }}">
                <div class="card-body text-center py-5 text-muted">
                    <i class="fas fa-users-slash fa-4x mb-3"></i>
                    <h5>Data siswa belum tersedia</h5>
                    <p class="mb-0">Gunakan tombol <b>Tambah Siswa</b> untuk mulai.</p>
                </div>
            </div>

            {{-- Grid siswa --}}
            <div class="row g-3" id="siswa-container">
                @foreach($data as $siswa)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">

                            {{-- Body --}}
                            <div class="card-body d-flex flex-column justify-content-between h-100">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center"
                                                 style="width:40px;height:40px;">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="ml-3">
                                                <h6 class="mb-0">{{ $siswa->nama }}</h6>
                                                <small class="text-muted">NIS {{ $siswa->nis }}</small>
                                            </div>
                                        </div>
                                        <span class="badge badge-info px-3 py-2">Aktif</span>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted">Kelas</small>
                                        <div class="font-weight-bold">{{ $siswa->kelas }}</div>
                                    </div>
                                </div>

                                {{-- Footer dengan tombol Edit & Hapus --}}
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-sm btn-primary mr-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="/siswa/{{ $siswa->id }}" method="POST" onsubmit="return confirm('Hapus siswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let lastVersion = null;

function renderSiswa(data) {
    const container = document.getElementById('siswa-container');
    const emptyState = document.getElementById('empty-state');

    if (data.length === 0) {
        container.innerHTML = '';
        emptyState.classList.remove('d-none');
        return;
    }

    emptyState.classList.add('d-none');

    let html = '';
    data.forEach((siswa) => {
        html += `
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:40px;height:40px;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h6 class="mb-0">${siswa.nama}</h6>
                                        <small class="text-muted">NIS ${siswa.nis}</small>
                                    </div>
                                </div>
                                <span class="badge badge-info px-3 py-2">Aktif</span>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">Kelas</small>
                                <div class="font-weight-bold">${siswa.kelas}</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="/siswa/${siswa.id}/edit" class="btn btn-sm btn-primary mr-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="/siswa/${siswa.id}" method="POST" onsubmit="return confirm('Hapus siswa ini?')">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        `;
    });

    container.innerHTML = html;
}

function loadSiswa() {
    fetch('/siswa/data')
        .then(res => res.json())
        .then(renderSiswa);
}

function checkUpdate() {
    fetch('/siswa/version')
        .then(res => res.text())
        .then(version => {
            if (lastVersion !== version) {
                lastVersion = version;
                loadSiswa();
            }
        });
}

setInterval(checkUpdate, 3000);
checkUpdate();
</script>
@endpush

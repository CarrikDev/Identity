@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <form action="/siswa/{{ $siswa->id }}" method="post">
                @csrf
                @method('PUT')
                <x-adminlte-card title="Edit Data Siswa" theme="cyan" theme-mode="outline"
                    class="elevation-3" body-class="bg-gray" header-class="bg-light"
                    footer-class="bg-gray border-top rounded border-light"
                    icon="fas fa-lg fa-solid fa-user-edit" collapsible removable maximizable>

                    <x-adminlte-input name="nama" placeholder="Masukkan Nama Siswa" value="{{ $siswa->nama }}" />
                    <x-adminlte-input name="nis" type="number" placeholder="Masukkan NIS Siswa" value="{{ $siswa->nis }}" />
                    <x-adminlte-input name="kelas" placeholder="Masukkan Kelas Siswa" value="{{ $siswa->kelas }}" />
                    {{-- Dropdown Jurusan --}}
                    <x-adminlte-select name="jurusan_id">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                        </x-slot>
                        <option value="" style="background-color: rgb(170, 170, 170); color: white;" disabled>-- Pilih Jurusan --</option>
                        @foreach($jurusan as $j)
                            <option value="{{ $j->id }}" {{ $siswa->jurusan_id == $j->id ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                        @endforeach
                    </x-adminlte-select>

                    <x-slot name="footerSlot">
                        <x-adminlte-button class="d-flex ml-auto" theme="primary" label="Update"
                            icon="fas fa-save" type="submit" />
                    </x-slot>
                </x-adminlte-card>
            </form>
        </div>
    </div>
</div>
@endsection
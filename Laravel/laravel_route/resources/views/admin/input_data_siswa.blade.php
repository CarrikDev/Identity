@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <form action="/siswa" method="post">
                @csrf
                <x-adminlte-card title="Input Data Siswa" theme="cyan" theme-mode="outline"
                    class="elevation-3" body-class="bg-gray" header-class="bg-light"
                    footer-class="bg-gray border-top rounded border-light"
                    icon="fas fa-lg fa-solid fa-up-right-from-square" collapsible removable maximizable>
                    {{-- <x-slot name="toolsSlot">
                        <select class="custom-select w-auto form-control-border bg-light">
                            <option>Setup 1</option>
                            <option>Setup 2</option>
                            <option>Setup 3</option>
                        </select>
                    </x-slot> --}}
                    <x-adminlte-input name="nama" placeholder="Masukkan Nama Siswa"/>
                    <x-adminlte-input name="nis" type="number" placeholder="Masukkan NIS Siswa"/>
                    <x-adminlte-input name="kelas" placeholder="Masukkan Kelas Siswa"/>
                    <x-slot name="footerSlot">
                        <x-adminlte-button class="d-flex ml-auto" theme="light" label="submit"
                            icon="fas fa-sign-in" type="submit" />
                    </x-slot>
                </x-adminlte-card>
            </form>
        </div>
    </div>
</div>
@endsection

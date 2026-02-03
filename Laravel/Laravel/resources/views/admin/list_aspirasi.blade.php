@extends('adminlte::page')

@section('title', 'List Aspirasi')

@section('content_header')
    <h1>Daftar Aspirasi / Pengaduan Siswa</h1>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pengaduan Masuk</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $no => $c)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $c->user->name }}</td>
                    <td>{{ $c->category->nama_kategori }}</td>
                    <td>{{ $c->title }}</td>
                    <td>
                        <span class="badge
                            @if($c->status=='baru') bg-danger
                            @elseif($c->status=='diproses') bg-warning
                            @else bg-success
                            @endif">
                            {{ $c->status }}
                        </span>
                    </td>
                    <td>{{ $c->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('aspirasi.detail', $c->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
@extends('adminlte::auth.register')

@section('css')
<style>
    .register-page {
        min-height: 100vh;
        background:
            radial-gradient(circle at center,
                rgba(72, 239, 189, 0.45),
                rgba(13, 202, 240, 0.35),
                rgba(13, 110, 253, 0.20),
                transparent 65%
            ),
            linear-gradient(135deg, #020617, #020617);
    }

    .register-box .card {
        background: rgba(10, 15, 20, 0.96);
        color: #fff;
        border-radius: 14px;
        border: 1px solid rgba(34, 197, 94, 0.35);
    }

    .register-box .form-control {
        background: #020617;
        color: #fff;
        border: 1px solid #1f2933;
    }

    .register-box .form-control:focus {
        border-color: #22c55e;
        box-shadow: 0 0 0 0.15rem rgba(34, 197, 94, 0.35);
    }
</style>
@stop

@section('auth_body')
<form action="{{ route('register') }}" method="POST">
    @csrf

    {{-- Name --}}
    <div class="input-group mb-3">
        <input type="text" name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}" placeholder="Nama Lengkap" autofocus>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
        </div>
        @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    {{-- Email --}}
    <div class="input-group mb-3">
        <input type="email" name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
        </div>
        @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    {{-- Password --}}
    <div class="input-group mb-3">
        <input type="password" name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
        </div>
        @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    {{-- Confirm --}}
    <div class="input-group mb-3">
        <input type="password" name="password_confirmation"
            class="form-control" placeholder="Ulangi Password">
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
        </div>
    </div>

    {{-- Role --}}
    <div class="input-group mb-3">
        <select name="role" class="form-control" required>
            <option value="">-- Pilih Role --</option>
            <option value="student">Siswa</option>
            <option value="admin">Admin</option>
        </select>
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user-tag"></span></div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block">
        <i class="fas fa-user-plus"></i> Daftar
    </button>
</form>
@stop

@extends('adminlte::auth.register')

@section('css')
<style>
    /* ===============================
       BACKGROUND REGISTER - LIGHT THEME
    =============================== */
    .register-page {
        min-height: 100vh;
        background:
            radial-gradient(circle at 20% 30%, rgba(14, 165, 233, 0.08), transparent 25%),
            radial-gradient(circle at 80% 70%, rgba(13, 148, 136, 0.08), transparent 25%),
            linear-gradient(135deg, #f8fafc, #ffffff);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ===============================
       CARD REGISTER
    =============================== */
    .register-box .card {
        background: #ffffff;
        color: #1e293b;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid #e2e8f0;
        max-width: 480px;
        width: 100%;
        overflow: hidden;
    }

    /* ===============================
       LOGO / TITLE
    =============================== */
    .register-logo a {
        font-weight: 700;
        font-size: 1.8rem;
        letter-spacing: -0.5px;
        background: linear-gradient(90deg, #0d9488, #0ea5e9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    /* ===============================
       INPUT FIELD
    =============================== */
    .register-box .form-control {
        background-color: #fafbff;
        color: #1e293b;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .register-box .form-control::placeholder {
        color: #94a3b8;
    }

    .register-box .form-control:focus {
        background-color: #ffffff;
        color: #1e293b;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.15);
        outline: none;
    }

    /* ===============================
       ICON INPUT (APPEND)
    =============================== */
    .register-box .input-group-text {
        background-color: #fafbff;
        border: 1px solid #e2e8f0;
        border-left: none;
        color: #64748b;
        border-radius: 0 12px 12px 0;
    }

    /* ===============================
       SELECT ROLE
    =============================== */
    .register-box select.form-control {
        background-color: #fafbff;
        color: #1e293b;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 16px 12px;
        padding-right: 2.5rem;
    }

    .register-box select.form-control:focus {
        background-color: #ffffff;
        color: #1e293b;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.15);
    }

    /* ===============================
       BUTTON REGISTER
    =============================== */
    .register-box .btn-primary {
        background: linear-gradient(135deg, #0d9488, #0ea5e9);
        border: none;
        font-weight: 600;
        letter-spacing: 0.3px;
        color: white;
        padding: 0.75rem;
        border-radius: 12px;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(14, 165, 233, 0.25);
        width: 100%;
    }

    .register-box .btn-primary:hover {
        background: linear-gradient(135deg, #0b7a70, #0c8bc9);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(14, 165, 233, 0.35);
    }

    /* ===============================
       ERROR & FEEDBACK
    =============================== */
    .register-box .invalid-feedback {
        display: block;
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .register-box .is-invalid {
        border-color: #ef4444 !important;
        background-color: #fef2f2;
    }

    .register-box .is-invalid:focus {
        box-shadow: 0 0 0 0.2rem rgba(239, 68, 68, 0.15) !important;
    }

    /* ===============================
       ADDITIONAL STYLING
    =============================== */
    .register-box .card-body {
        padding: 2.5rem;
    }

    .register-box .form-group,
    .register-box .input-group {
        margin-bottom: 1.25rem;
    }

    /* Link back to login */
    .register-box .text-center a {
        color: #0ea5e9;
        text-decoration: none;
        font-weight: 500;
    }

    .register-box .text-center a:hover {
        color: #0b7a70;
        text-decoration: underline;
    }
</style>
@stop

@section('auth_body')
<form action="{{ route('register') }}" method="POST">
    @csrf

    {{-- Name --}}
    <div class="input-group">
        <input type="text" name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}" placeholder="Nama Lengkap" autofocus>
        <div class="input-group-text"><span class="fas fa-user"></span></div>
        @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    {{-- Email --}}
    <div class="input-group">
        <input type="email" name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" placeholder="Email">
        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
        @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    {{-- Password --}}
    <div class="input-group">
        <input type="password" name="password"
            class="form-control @error('password') is-invalid @enderror"
            placeholder="Password">
        <div class="input-group-text"><span class="fas fa-lock"></span></div>
        @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    {{-- Confirm Password --}}
    <div class="input-group">
        <input type="password" name="password_confirmation"
            class="form-control" placeholder="Ulangi Password">
        <div class="input-group-text"><span class="fas fa-lock"></span></div>
    </div>

    {{-- Role --}}
    <div class="input-group">
        <select name="role" class="form-control @error('role') is-invalid @enderror" style="height: 10%" required>
            <option value="" disabled selected>-- Pilih Role --</option>
            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        <div class="input-group-text"><span class="fas fa-user-tag"></span></div>
        @error('role')<span class="invalid-feedback">{{ $message }}</span>@enderror
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        <i class="fas fa-user-plus"></i> Daftar
    </button>
</form>
@stop
@extends('adminlte::auth.login')

@section('css')
<style>
    /* ===============================
       BACKGROUND LOGIN - LIGHT THEME
    =============================== */
    .login-page {
        min-height: 100vh;
        background:
            /* Soft gradient glow */
            radial-gradient(circle at 20% 30%, rgba(14, 165, 233, 0.08), transparent 25%),
            radial-gradient(circle at 80% 70%, rgba(13, 148, 136, 0.08), transparent 25%),
            linear-gradient(135deg, #f8fafc, #ffffff);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ===============================
       CARD LOGIN - CLEAN WHITE
    =============================== */
    .login-box .card {
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
    .login-logo a {
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
    .login-box .form-control {
        background-color: #fafbff;
        color: #1e293b;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .login-box .form-control::placeholder {
        color: #94a3b8;
    }

    .login-box .form-control:focus {
        background-color: #ffffff;
        color: #1e293b;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.15);
        outline: none;
    }

    /* ===============================
       ICON INPUT
    =============================== */
    .login-box .input-group-text {
        background-color: #fafbff;
        border: 1px solid #e2e8f0;
        border-right: none;
        color: #64748b;
        border-radius: 12px 0 0 12px;
    }

    /* ===============================
       BUTTON LOGIN
    =============================== */
    .login-box .btn-primary {
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
    }

    .login-box .btn-primary:hover {
        background: linear-gradient(135deg, #0b7a70, #0c8bc9);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(14, 165, 233, 0.35);
    }

    /* ===============================
       CHECKBOX
    =============================== */
    .icheck-primary > input:first-child:not(:checked):not(:disabled):hover + label::before,
    .icheck-primary > input:first-child:not(:checked):not(:disabled):hover + input[type="hidden"] + label::before {
        border-color: #0ea5e9;
    }

    .icheck-primary input:checked + label::before {
        background-color: #0ea5e9;
        border-color: #0ea5e9;
    }

    /* ===============================
       SELECT ROLE
    =============================== */
    .login-box select.form-control {
        background-color: #fafbff;
        color: #1e293b;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 1rem;
    }

    .login-box select.form-control:focus {
        background-color: #ffffff;
        color: #1e293b;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.15);
    }

    /* ===============================
       LINK (Forgot Password, Register)
    =============================== */
    .login-box a {
        color: #0ea5e9;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .login-box a:hover {
        color: #0b7a70;
        text-decoration: underline;
    }

    /* ===============================
       ADDITIONAL STYLING
    =============================== */
    .login-box .card-body {
        padding: 2.5rem;
    }

    .login-box .form-group {
        margin-bottom: 1.25rem;
    }

    .login-box .remember-me {
        font-size: 0.95rem;
        color: #64748b;
    }

    .login-box .social-auth-links {
        margin-top: 1.5rem;
        text-align: center;
        color: #94a3b8;
        font-size: 0.9rem;
    }
</style>
@stop
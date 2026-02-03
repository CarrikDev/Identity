@extends('adminlte::auth.login')

@section('css')
<style>
    /* ===============================
       BACKGROUND LOGIN (BLUE + GREEN)
    =============================== */
    .login-page {
        min-height: 100vh;
        background:
            /* Glow utama */
            radial-gradient(circle at center,
                rgba(34, 197, 94, 0.45) 0%,   /* hijau */
                rgba(13, 202, 240, 0.35) 30%, /* biru cyan */
                rgba(13, 110, 253, 0.20) 50%, /* biru */
                transparent 65%
            ),
            /* Glow tambahan */
            radial-gradient(circle at center,
                rgba(72, 239, 189, 0.25),
                rgba(13, 202, 240, 0.15),
                transparent 60%
            ),
            /* Background dasar */
            linear-gradient(135deg, #020617, #020617, #020617);
    }

    /* ===============================
       CARD LOGIN
    =============================== */
    .login-box .card {
        background: rgba(10, 15, 20, 0.96);
        color: #ffffff;
        border-radius: 14px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.9);
        border: 1px solid rgba(34, 197, 94, 0.35);
    }

    /* ===============================
       LOGO / TITLE
    =============================== */
    .login-logo a {
        color: #e6fffa;
        font-weight: 600;
        letter-spacing: 0.6px;
    }

    /* ===============================
       INPUT FIELD
    =============================== */
    .login-box .form-control {
        background-color: #020617;
        color: #ffffff;
        border: 1px solid #1f2933;
    }

    .login-box .form-control::placeholder {
        color: #94a3b8;
    }

    .login-box .form-control:focus {
        background-color: #020617;
        color: #ffffff;
        border-color: #22c55e;
        box-shadow: 0 0 0 0.15rem rgba(34, 197, 94, 0.35);
    }

    /* ===============================
       ICON INPUT
    =============================== */
    .login-box .input-group-text {
        background-color: #020617;
        border: 1px solid #1f2933;
        color: #22c55e;
    }

    /* ===============================
       BUTTON LOGIN
    =============================== */
    .login-box .btn-primary {
        background: linear-gradient(135deg, #22c55e, #0dcaf0);
        border: none;
        font-weight: 600;
        letter-spacing: 0.4px;
        color: #02140c;
    }

    .login-box .btn-primary:hover {
        background: linear-gradient(135deg, #16a34a, #0bbcd6);
        color: #ffffff;
    }

    /* ===============================
       CHECKBOX
    =============================== */
    .icheck-primary input:checked + label::before {
        background-color: #22c55e;
        border-color: #22c55e;
    }

    /* ===============================
       SELECT ROLE
    =============================== */
    .login-box select.form-control {
        background-color: #020617;
        color: #ffffff;
        border: 1px solid #1f2933;
    }

    .login-box select.form-control:focus {
        background-color: #020617;
        color: #ffffff;
        border-color: #22c55e;
        box-shadow: 0 0 0 0.15rem rgba(34, 197, 94, 0.35);
    }

    /* ===============================
       LINK
    =============================== */
    .login-box a {
        color: #5eead4;
    }

    .login-box a:hover {
        color: #99f6e4;
        text-decoration: underline;
    }
</style>
@stop



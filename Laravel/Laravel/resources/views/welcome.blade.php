<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Welcome to Laravel</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(34, 197, 94, 0.35), transparent 40%),
                radial-gradient(circle at bottom right, rgba(13, 202, 240, 0.35), transparent 40%),
                linear-gradient(180deg, #020617, #020617);
            color: #ffffff;
        }

        /* ================= NAVBAR ================= */
        .navbar {
            background: rgba(2, 6, 23, 0.75);
            backdrop-filter: blur(12px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.7);
        }

        .navbar-brand {
            background: linear-gradient(90deg, #22c55e, #0dcaf0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
            letter-spacing: 0.4px;
        }

        /* ================= HERO ================= */
        .hero {
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
        }

        /* ================= CONTENT BOX ================= */
        .hero-box {
            background: linear-gradient(145deg, #0b1220, #0f172a);
            border-radius: 22px;
            padding: 60px;
            box-shadow:
                0 35px 80px rgba(0, 0, 0, 0.8),
                inset 0 0 30px rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.25);
        }

        .hero-title {
            background: linear-gradient(90deg, #22c55e, #0dcaf0, #e0f2fe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-text {
            color: #c7d2fe;
        }

        /* ================= BUTTONS ================= */
        .btn-login {
            border: 1px solid #22c55e;
            color: #22c55e;
            border-radius: 14px;
            padding: 6px 18px;
            transition: all 0.3s ease;
            background: transparent;
        }

        .btn-login:hover {
            background: rgba(34, 197, 94, 0.15);
            color: #ffffff;
            box-shadow: 0 0 14px rgba(34, 197, 94, 0.6);
        }

        .btn-register {
            background: linear-gradient(135deg, #22c55e, #0dcaf0);
            border: none;
            color: #02140c;
            border-radius: 14px;
            padding: 6px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(13, 202, 240, 0.6);
            color: #ffffff;
        }
    </style>
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-dark px-4">
    <a class="navbar-brand" href="#">
        LaravelApp
    </a>

    <div class="ms-auto d-flex gap-2">
        <a href="/login" class="btn btn-login btn-sm">
            Log in
        </a>

        <a href="/register" class="btn btn-register btn-sm">
            Register
        </a>
    </div>
</nav>

<!-- ================= CONTENT ================= -->
<section class="hero container">
    <div class="row justify-content-center w-100">
        <div class="col-lg-8">
            <div class="hero-box text-center">
                <h1 class="fw-bold mb-3 hero-title">
                    Welcome to Laravel
                </h1>

                <p class="hero-text mb-3">
                    Laravel is a modern PHP framework designed to help developers
                    build secure and scalable web applications.
                </p>

                <p class="hero-text mb-0">
                    Clean syntax, powerful tools, and elegant structure
                    for faster development.
                </p>
            </div>
        </div>
    </div>
</section>

</body>
</html>

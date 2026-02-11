<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-light: #e6f7f1;
            --secondary-light: #e6f5fd;
            --accent-teal: #0d9488;
            --accent-blue: #0ea5e9;
            --accent-purple: #8b5cf6;
            --light-bg: #ffffff;
            --card-bg: #fafbff;
            --text-dark: #1e293b;
            --text-medium: #475569;
            --text-light: #64748b;
            --border-color: #e2e8f0;
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.03);
            --shadow-md: 0 10px 25px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            min-height: 100vh;
            background: 
                radial-gradient(circle at 10% 20%, rgba(14, 165, 233, 0.08) 0%, transparent 25%),
                radial-gradient(circle at 90% 80%, rgba(13, 148, 136, 0.08) 0%, transparent 25%),
                linear-gradient(180deg, #f8fafc, #ffffff);
            color: var(--text-dark);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            overflow-x: hidden;
            position: relative;
        }
        
        /* ================= NAVBAR ================= */
        .navbar {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            box-shadow: var(--shadow-md);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 2rem;
            font-family: 'Poppins', sans-serif;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(90deg, var(--accent-teal), var(--accent-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .navbar-brand i {
            font-size: 1.9rem;
            margin-left: -4px;
        }
        
        /* ================= MAIN CONTENT ================= */
        .main-content {
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        
        .content-card {
            background: var(--card-bg);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        }
        
        .app-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--accent-teal), var(--accent-blue));
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.2rem;
            color: white;
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.3);
        }
        
        .content-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 2.8rem;
            line-height: 1.1;
            margin-bottom: 1.2rem;
            text-align: center;
            color: var(--text-dark);
        }
        
        .content-subtitle {
            color: var(--text-medium);
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            text-align: center;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin: 2.5rem 0;
        }
        
        .feature-item {
            text-align: center;
            padding: 1.5rem;
            border-radius: 16px;
            background: white;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }
        
        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: rgba(14, 165, 233, 0.3);
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, rgba(13, 148, 136, 0.1), rgba(14, 165, 233, 0.1));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.4rem;
            color: var(--accent-teal);
        }
        
        .feature-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }
        
        .feature-desc {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        /* ================= BUTTONS ================= */
        .btn-login {
            border: 2px solid var(--border-color);
            color: var(--text-medium);
            border-radius: 50px;
            padding: 0.75rem 1.75rem;
            transition: var(--transition);
            background: white;
            font-weight: 600;
            box-shadow: var(--shadow-sm);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-login:hover {
            background: var(--primary-light);
            color: var(--accent-teal);
            border-color: var(--accent-teal);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(13, 148, 136, 0.15);
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--accent-teal), var(--accent-blue));
            border: none;
            color: white;
            border-radius: 50px;
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(14, 165, 233, 0.35);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(14, 165, 233, 0.45);
        }

        .btn-dashboard {
            background: linear-gradient(135deg, var(--accent-purple), var(--accent-blue));
            border: none;
            color: white;
            border-radius: 50px;
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.35);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-dashboard:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(139, 92, 246, 0.45);
        }
        
        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.8rem 1.5rem;
            }
            
            .content-card {
                padding: 2rem;
                border-radius: 20px;
            }
            
            .content-title {
                font-size: 2.2rem;
            }
            
            .content-subtitle {
                font-size: 1.1rem;
            }
            
            .btn-login, .btn-register {
                width: 100%;
                justify-content: center;
                margin-bottom: 0.75rem;
            }
            
            .d-flex.gap-3 {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="#">
            <i class="fas fa-laravel"></i>
            LaravelApp
        </a>
        
        <div class="d-flex gap-2">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-dashboard">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-login">
                        <i class="fas fa-sign-in-alt"></i> Log in
                    </a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-register">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>

<!-- ================= MAIN CONTENT ================= -->
<section class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="content-card">
                    <div class="app-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    
                    <h1 class="content-title">Build Modern Web Applications</h1>
                    
                    <p class="content-subtitle">
                        Laravel provides an elegant syntax and powerful tools to create secure, scalable applications faster than ever before.
                    </p>
                    
                    <div class="features-grid">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <h3 class="feature-title">Blazing Fast</h3>
                            <p class="feature-desc">Optimized performance with built-in caching and queue systems</p>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h3 class="feature-title">Secure by Default</h3>
                            <p class="feature-desc">Protection against common vulnerabilities out of the box</p>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <h3 class="feature-title">Easy Updates</h3>
                            <p class="feature-desc">Simple upgrade path with clear release notes and guides</p>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <a href="/register" class="btn btn-register">
                            <i class="fas fa-rocket"></i> Get Started
                        </a>
                        <a href="/login" class="btn btn-login">
                            <i class="fas fa-play-circle"></i> View Demo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
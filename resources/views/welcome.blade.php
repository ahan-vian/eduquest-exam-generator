<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduQuest - Smart Exam Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Navbar Kustom */
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            padding: 120px 0 100px;
            color: white;
            border-bottom-left-radius: 80px;
            border-bottom-right-radius: 80px;
            position: relative;
            overflow: hidden;
        }

        /* Elemen Dekorasi Latar Belakang */
        .hero-decoration {
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -200px;
            right: -100px;
        }

        /* Kartu Fitur */
        .feature-card {
            border: none;
            border-radius: 24px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 40px rgba(0,0,0,0.04);
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(13, 110, 253, 0.1);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 24px;
        }

        .btn-custom {
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-primary d-flex align-items-center gap-2" href="#">
                <i class="bi bi-box-seam-fill"></i> EduQuest
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-custom shadow-sm">Buka Dashboard &rarr;</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link fw-semibold text-dark hover-primary">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-primary btn-custom shadow-sm">Daftar Gratis</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center text-lg-start mt-5">
        <div class="hero-decoration"></div>
        <div class="container position-relative z-1">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="badge bg-white text-primary px-3 py-2 rounded-pill mb-4 fw-semibold shadow-sm">
                        <i class="bi bi-stars"></i> Platform Evaluasi Akademik Modern
                    </div>
                    <h1 class="display-4 fw-extrabold mb-4" style="line-height: 1.2;">
                        Susun Soal Ujian Lebih Cerdas & Cepat dengan <span class="text-warning">EduQuest</span>
                    </h1>
                    <p class="lead mb-5 text-light opacity-75">
                        Tinggalkan cara lama mengelola bank soal. Buat, kelola, dan hasilkan lembar ujian yang terstruktur secara otomatis. Dirancang khusus untuk Dosen dan Institusi Pendidikan.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-light text-primary btn-custom btn-lg shadow">Masuk ke Ruang Kerja</a>
                        @else
                            <a href="{{ route('tampilregister') }}" class="btn btn-warning text-dark btn-custom btn-lg shadow">Mulai Sekarang</a>
                            <a href="#fitur" class="btn btn-outline-light btn-custom btn-lg">Pelajari Fitur</a>
                        @endauth
                    </div>
                </div>
                
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="bg-white p-4 rounded-4 shadow-lg transform-rotate" style="transform: perspective(1000px) rotateY(-15deg) rotateX(5deg);">
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                            <h6 class="fw-bold text-dark mb-0">Statistik Bank Soal</h6>
                            <span class="badge bg-success">Live</span>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                    <small class="text-primary fw-bold">Total Soal</small>
                                    <h3 class="mb-0 text-dark fw-bold">1,204</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                                    <small class="text-warning text-dark fw-bold">Mata Kuliah</small>
                                    <h3 class="mb-0 text-dark fw-bold">24</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 bg-light rounded-3 p-3 text-center">
                            <i class="bi bi-bar-chart-fill text-muted fs-1"></i>
                            <p class="text-muted small mt-2 mb-0">Diagram Distribusi Kesulitan Soal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5 pb-3">
                <h2 class="fw-bold text-dark">Mengapa Memilih EduQuest?</h2>
                <p class="text-muted">Dibangun dengan arsitektur data yang kokoh untuk kebutuhan akademik.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card p-4 bg-white">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-database-fill-gear"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Manajemen Bank Soal</h4>
                        <p class="text-muted mb-0">Simpan ribuan soal berdasarkan mata kuliah, topik, dan tingkat kesulitan secara terstruktur.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card feature-card p-4 bg-white">
                        <div class="icon-box bg-success bg-opacity-10 text-success">
                            <i class="bi bi-magic"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Auto Exam Generator</h4>
                        <p class="text-muted mb-0">Hasilkan paket soal ujian secara acak hanya dengan menentukan komposisi tingkat kesulitan.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card feature-card p-4 bg-white">
                        <div class="icon-box bg-warning bg-opacity-10 text-warning">
                            <i class="bi bi-pie-chart-fill"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Dashboard Analitik</h4>
                        <p class="text-muted mb-0">Pantau persebaran materi dan tingkat kesulitan soal melalui visualisasi diagram yang interaktif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <p class="text-muted mb-0 fw-medium">&copy; {{ date('Y') }} EduQuest Exam Generator. Sistem Manajemen Akademik.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
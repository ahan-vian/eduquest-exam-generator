<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduQuest - Generator Ujian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2" href="{{ Auth::check() ? '/dashboard' : '/login' }}" style="text-decoration: none;">
                <div class="d-flex align-items-center justify-content-center bg-primary bg-gradient shadow-sm" style="width: 42px; height: 42px; border-radius: 12px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/>
                        <path d="m9 9.5 2 2 4-4"/>
                    </svg>
                </div>
                <span class="text-dark" style="letter-spacing: -0.5px;">Edu<span class="text-primary">Quest</span></span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-dark" href="/matakuliah">Mata Kuliah</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="/soal">Bank Soal</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="/ujian">Generator Ujian</a></li>
                        
                        <div class="d-none d-lg-block mx-3 border-start" style="height: 24px;"></div>
                        
                        <li class="nav-item">
                            <a class="btn btn-danger btn-sm rounded-pill px-3 fw-bold d-flex align-items-center gap-2" href="/logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                Logout ({{ Auth::user()->name }})
                            </a>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link text-dark fw-medium" href="/login">Login</a></li>
                        <li class="nav-item ms-lg-2"><a class="btn btn-primary rounded-pill px-4" href="/register">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('konten')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</body>

</html>
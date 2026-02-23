@extends('layouts.app')

@section('konten')
    <div class="mb-4">
        <h3 class="fw-bold text-primary">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
        <p class="text-muted">Ini adalah ringkasan data bank soal akademik Anda.</p>
    </div>

    <div class="row mb-5">
        <div class="col-md-3">
            <div class="card bg-primary text-white shadow border-0 rounded-4">
                <div class="card-body py-4">
                    <h6 class="text-uppercase fw-bold mb-2">Total Mata Kuliah</h6>
                    <h2 class="display-5 fw-bold mb-0">{{ $totalMatkul }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white shadow border-0 rounded-4">
                <div class="card-body py-4">
                    <h6 class="text-uppercase fw-bold mb-2">Total Bank Soal</h6>
                    <h2 class="display-5 fw-bold mb-0">{{ $totalSoal }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-white shadow-sm border-0 rounded-4 h-100">
                <div class="card-body py-4">
                    <h6 class="text-uppercase fw-bold text-muted mb-3">Komposisi Tingkat Kesulitan Soal</h6>
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h3 class="fw-bold text-success mb-0">{{ $kesulitan['Mudah'] }}</h3>
                            <small class="text-muted">Mudah</small>
                        </div>
                        <div>
                            <h3 class="fw-bold text-warning mb-0">{{ $kesulitan['Sedang'] }}</h3>
                            <small class="text-muted">Sedang</small>
                        </div>
                        <div>
                            <h3 class="fw-bold text-danger mb-0">{{ $kesulitan['Sulit'] }}</h3>
                            <small class="text-muted">Sulit</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-muted mb-4">Persentase Tingkat Kesulitan</h6>
                    <canvas id="pieChart" style="max-height: 250px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body">
                    <h6 class="fw-bold text-muted mb-4">Distribusi Soal Berdasarkan Mata Kuliah</h6>
                    <canvas id="barChart" style="max-height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Konfigurasi Diagram Lingkaran (Pie Chart)
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Mudah', 'Sedang', 'Sulit'],
                datasets: [{
                    data: [{{ $kesulitan['Mudah'] }}, {{ $kesulitan['Sedang'] }}, {{ $kesulitan['Sulit'] }}],
                    backgroundColor: ['#198754', '#ffc107', '#dc3545'], // Warna Bootstrap (Success, Warning, Danger)
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Konfigurasi Diagram Batang (Bar Chart)
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                // Gunakan json_encode untuk mengubah array PHP menjadi format JavaScript
                labels: {!! json_encode($labelMatkul) !!},
                datasets: [{
                    label: 'Jumlah Soal',
                    data: {!! json_encode($dataMatkul) !!},
                    backgroundColor: '#0d6efd', // Warna Biru Bootstrap
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 } // Pastikan sumbu Y menampilkan angka bulat
                    }
                }
            }
        });
    </script>
@endsection
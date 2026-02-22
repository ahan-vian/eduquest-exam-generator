@extends('layouts.app')

@section('konten')
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header bg-white border-0 pt-4 pb-0">
            <h5 class="fw-bold text-primary">Buat Soal Baru</h5>
            <p class="text-muted small">Anda dapat menggunakan sintaks LaTeX (diapit dengan tanda $$) untuk menulis rumus
                fisika pada kolom pertanyaan dan opsi jawaban.</p>
        </div>
        <div class="card-body">
            <form action="/soal/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="form-select" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            {{-- Looping data matkul dari Controller untuk Dropdown --}}
                            @foreach($matakuliah as $mk)
                                <option value="{{ $mk->id }}">{{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Topik / Bab Materi</label>
                        <input type="text" name="topik" class="form-control" placeholder="Contoh: Hukum Termodinamika"
                            required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Pertanyaan Utama</label>
                    <textarea name="pertanyaan" class="form-control" rows="5" placeholder="Ketik pertanyaan di sini..."
                        required></textarea>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Upload Gambar/Grafik (Opsional)</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Cocok untuk diagram atau
                            grafik.</small>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Opsi A</label>
                        <input type="text" name="opsi_a" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Opsi B</label>
                        <input type="text" name="opsi_b" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Opsi C</label>
                        <input type="text" name="opsi_c" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Opsi D</label>
                        <input type="text" name="opsi_d" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-4 bg-light p-3 rounded">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Kunci Jawaban Benar</label>
                        <select name="kunci_jawaban" class="form-select border-success" required>
                            <option value="A">Opsi A</option>
                            <option value="B">Opsi B</option>
                            <option value="C">Opsi C</option>
                            <option value="D">Opsi D</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tingkat Kesulitan</label>
                        <select name="tingkat_kesulitan" class="form-select border-warning" required>
                            <option value="Mudah">Mudah</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Sulit">Sulit</option>
                        </select>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <a href="/soal" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary fw-bold px-4">Simpan Soal</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
@endsection
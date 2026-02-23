@extends('layouts.app')

@section('konten')
<div class="card shadow-sm border-0 mb-5">
    <div class="card-header bg-white border-0 pt-4 pb-0">
        <h5 class="fw-bold text-warning">Edit Soal</h5>
    </div>
    <div class="card-body">
        <form action="/soal/update/{{ $soal->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Mata Kuliah</label>
                    <select name="mata_kuliah_id" class="form-select" required>
                        @foreach($matakuliah as $mk)
                            <option value="{{ $mk->id }}" {{ $soal->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                                {{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Topik / Bab Materi</label>
                    <input type="text" name="topik" class="form-control" value="{{ $soal->topik }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Pertanyaan Utama</label>
                <textarea name="pertanyaan" class="form-control" rows="5" required>{{ $soal->pertanyaan }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Gambar Saat Ini:</label><br>
                @if($soal->gambar)
                    <img src="{{ asset('storage/' . $soal->gambar) }}" style="max-height: 150px; border-radius: 8px; margin-bottom: 10px;">
                @else
                    <span class="text-muted small">Tidak ada gambar.</span><br>
                @endif
                <label class="form-label fw-bold mt-2">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Opsi A</label>
                    <input type="text" name="opsi_a" class="form-control" value="{{ $soal->opsi_a }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Opsi B</label>
                    <input type="text" name="opsi_b" class="form-control" value="{{ $soal->opsi_b }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Opsi C</label>
                    <input type="text" name="opsi_c" class="form-control" value="{{ $soal->opsi_c }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Opsi D</label>
                    <input type="text" name="opsi_d" class="form-control" value="{{ $soal->opsi_d }}" required>
                </div>
            </div>

            <div class="row mb-4 bg-light p-3 rounded">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Kunci Jawaban Benar</label>
                    <select name="kunci_jawaban" class="form-select border-success" required>
                        <option value="A" {{ $soal->kunci_jawaban == 'A' ? 'selected' : '' }}>Opsi A</option>
                        <option value="B" {{ $soal->kunci_jawaban == 'B' ? 'selected' : '' }}>Opsi B</option>
                        <option value="C" {{ $soal->kunci_jawaban == 'C' ? 'selected' : '' }}>Opsi C</option>
                        <option value="D" {{ $soal->kunci_jawaban == 'D' ? 'selected' : '' }}>Opsi D</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Tingkat Kesulitan</label>
                    <select name="tingkat_kesulitan" class="form-select border-warning" required>
                        <option value="Mudah" {{ $soal->tingkat_kesulitan == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                        <option value="Sedang" {{ $soal->tingkat_kesulitan == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="Sulit" {{ $soal->tingkat_kesulitan == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                    </select>
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-end">
                <a href="/soal" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-warning fw-bold px-4">Update Soal</button>
            </div>
        </form>
    </div>
</div>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
@endsection
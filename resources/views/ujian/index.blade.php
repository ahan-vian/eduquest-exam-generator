@extends('layouts.app')

@section('konten')
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white border-0 pt-4 pb-0">
            <h4 class="fw-bold text-primary">Generator Ujian Cerdas</h4>
            <p class="text-muted small">Pilih mata kuliah untuk memunculkan bank soal, lalu ceklis soal yang ingin dicetak.
            </p>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="/ujian" method="GET" class="mb-4 bg-light p-3 rounded border">
                <div class="row align-items-end">
                    <div class="col-md-5 mb-3 mb-md-0">
                        <label class="form-label fw-bold">1. Pilih Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="form-select border-primary" required>
                            <option value="">-- Silakan Pilih Matkul --</option>
                            @foreach($matakuliah as $mk)
                                <option value="{{ $mk->id }}" {{ request('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                                    {{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="form-label fw-bold">2. Filter Kesulitan</label>
                        <select name="tingkat_kesulitan" class="form-select border-info">
                            <option value="Semua" {{ request('tingkat_kesulitan') == 'Semua' ? 'selected' : '' }}>Tampilkan
                                Semua Tingkat</option>
                            <option value="Mudah" {{ request('tingkat_kesulitan') == 'Mudah' ? 'selected' : '' }}>Hanya Mudah
                            </option>
                            <option value="Sedang" {{ request('tingkat_kesulitan') == 'Sedang' ? 'selected' : '' }}>Hanya
                                Sedang</option>
                            <option value="Sulit" {{ request('tingkat_kesulitan') == 'Sulit' ? 'selected' : '' }}>Hanya Sulit
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-outline-primary w-100 fw-bold">🔍 Cari Soal</button>
                    </div>
                </div>
            </form>

            @if(count($soals) > 0)
                <form action="/ujian/cetak" method="POST" target="_blank">
                    @csrf

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold">2. Pilih Soal untuk Dicetak</h5>
                        <button type="button" class="btn btn-sm btn-info text-white fw-bold" onclick="ceklisSemua()">☑️ Ceklis
                            Semua</button>
                    </div>

                    <div class="table-responsive mb-4" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light position-sticky top-0">
                                <tr>
                                    <th width="5%" class="text-center">Pilih</th>
                                    <th width="10%">Kesulitan</th>
                                    <th>Pertanyaan</th>
                                    <th width="15%">Topik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($soals as $s)
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-check-input soal-checkbox" type="checkbox" name="selected_soal[]"
                                                value="{{ $s->id }}" style="transform: scale(1.5);">
                                        </td>
                                        <td>
                                            @if($s->tingkat_kesulitan == 'Mudah') <span class="badge bg-success">Mudah</span>
                                            @elseif($s->tingkat_kesulitan == 'Sedang') <span
                                                class="badge bg-warning text-dark">Sedang</span>
                                            @else <span class="badge bg-danger">Sulit</span> @endif
                                        </td>
                                        <td>
                                            {{ Str::limit($s->pertanyaan, 80) }}
                                            @if($s->gambar) <span class="badge bg-secondary ms-1">Ada Gambar</span> @endif
                                        </td>
                                        <td><small class="text-muted">{{ $s->topik }}</small></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row align-items-end bg-light p-3 rounded border">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="form-label fw-bold">3. Opsi Pengacakan</label>
                            <select name="acak" class="form-select border-success">
                                <option value="tidak">Urutkan Sesuai Ceklis (Default)</option>
                                <option value="ya">Acak Urutan Soal & Kunci Jawaban</option>
                            </select>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="submit" class="btn btn-success fw-bold px-5 py-2">🖨️ Cetak Lembar Ujian</button>
                        </div>
                    </div>
                </form>
            @elseif(request('mata_kuliah_id'))
                <div class="alert alert-warning text-center">
                    Belum ada soal untuk mata kuliah ini. Silakan tambahkan soal terlebih dahulu di menu Bank Soal.
                </div>
            @endif
        </div>
    </div>

    <script>
        function ceklisSemua() {
            let checkboxes = document.querySelectorAll('.soal-checkbox');
            let isChecked = checkboxes[0].checked;
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = !isChecked; // Toggle: Jika sudah terceklis, lepaskan. Jika belum, ceklis.
            });
        }
    </script>
@endsection
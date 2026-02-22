@extends('layouts.app')

@section('konten')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Bank Soal</h3>
        <div>
            <button type="button" class="btn btn-success fw-bold me-2" data-bs-toggle="modal" data-bs-target="#modalImport">
                📥 Import CSV
            </button>
            <a href="/soal/tambah" class="btn btn-primary fw-bold">+ Tambah Manual</a>
        </div>
    </div>

    <div class="modal fade" id="modalImport" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-success">Import Soal via CSV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/soal/import" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-info small">
                            Pastikan file CSV Anda memiliki 8 kolom berurutan tanpa gambar:<br>
                            <b>Topik, Pertanyaan, Opsi A, Opsi B, Opsi C, Opsi D, Kunci Jawaban (A/B/C/D), Kesulitan
                                (Mudah/Sedang/Sulit).</b> Baris pertama akan diabaikan (dianggap Header).
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-select" required>
                                <option value="">-- Pilih Matkul --</option>
                                {{-- Karena kita di halaman index soal, kita panggil relasinya atau ambil dari helper jika
                                perlu. --}}
                                {{-- AGAR MUDAH: Pastikan Anda mengirim $matakuliah ke view index ini dari
                                SoalController@index --}}
                                @foreach(App\Models\Matakuliah::where('user_id', Auth::id())->get() as $mk)
                                    <option value="{{ $mk->id }}">{{ $mk->nama_matkul }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Upload File CSV</label>
                            <input type="file" name="file_csv" class="form-control" accept=".csv" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success fw-bold">Mulai Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Mata Kuliah</th>
                        <th width="15%">Topik</th>
                        <th>Pertanyaan</th>
                        <th width="10%" class="text-center">Kesulitan</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($soals as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- Ini memanggil relasi dari tabel Mata Kuliah --}}
                            <td><span class="badge bg-info text-dark">{{ $s->mata_kuliah->kode_matkul }}</span></td>
                            <td class="fw-bold">{{ $s->topik }}</td>
                            {{-- Str::limit digunakan agar teks soal yang panjang terpotong rapi --}}
                            <td>
                                {{ Str::limit($s->pertanyaan, 50) }}

                                {{-- Cek apakah soal ini punya gambar di database --}}
                                @if($s->gambar)
                                    <br>
                                    <img src="{{ asset('storage/' . $s->gambar) }}" alt="Gambar Soal"
                                        style="max-height: 80px; margin-top: 10px; border-radius: 5px; border: 1px solid #ddd;">
                                @endif
                            </td>
                            <td class="text-center">
                                @if($s->tingkat_kesulitan == 'Mudah')
                                    <span class="badge bg-success">Mudah</span>
                                @elseif($s->tingkat_kesulitan == 'Sedang')
                                    <span class="badge bg-warning text-dark">Sedang</span>
                                @else
                                    <span class="badge bg-danger">Sulit</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/soal/hapus/{{ $s->id }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus soal ini?')">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada bank soal. Silakan tambah soal baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
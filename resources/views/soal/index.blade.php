@extends('layouts.app')

@section('konten')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Bank Soal</h3>
        <a href="/soal/tambah" class="btn btn-primary fw-bold">+ Tambah Soal Baru</a>
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
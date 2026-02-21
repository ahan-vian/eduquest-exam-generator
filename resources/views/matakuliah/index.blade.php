@extends('layouts.app')

@section('konten')
<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h5 class="fw-bold text-primary">Tambah Mata Kuliah</h5>
            </div>
            <div class="card-body">
                <form action="/matakuliah/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Matkul</label>
                        <input type="text" name="kode_matkul" class="form-control @error('kode_matkul') is-invalid @enderror" placeholder="Contoh: TF-3012" value="{{ old('kode_matkul') }}">
                        @error('kode_matkul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_matkul" class="form-control" placeholder="Contoh: Fisika Kuantum" value="{{ old('nama_matkul') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jumlah SKS</label>
                        <input type="number" name="sks" class="form-control" min="1" max="6" value="3" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Kode</th>
                            <th>Nama Mata Kuliah</th>
                            <th width="10%" class="text-center">SKS</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($matakuliah as $mk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-secondary">{{ $mk->kode_matkul }}</span></td>
                            <td class="fw-bold">{{ $mk->nama_matkul }}</td>
                            <td class="text-center">{{ $mk->sks }}</td>
                            <td class="text-center">
                                <a href="/matakuliah/hapus/{{ $mk->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus matkul ini? Semua soal di dalamnya akan ikut terhapus!')">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada data mata kuliah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
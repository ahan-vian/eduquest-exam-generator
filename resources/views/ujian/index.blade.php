@extends('layouts.app')

@section('konten')
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white border-0 pt-4 pb-0">
            <h5 class="fw-bold text-primary">Generator Lembar Ujian</h5>
        </div>
        <div class="card-body">
            <form action="/ujian" method="GET">
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="form-select" required>
                            <option value="">-- Pilih Matkul --</option>
                            @foreach(App\Models\Matakuliah::where('user_id', Auth::id())->get() as $mk)
                                <option value="{{ $mk->id }}" {{ request('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                                    {{ $mk->kode_matkul }} - {{ $mk->nama_matkul }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Kesulitan</label>
                        <select name="tingkat_kesulitan" class="form-select" required>
                            <option value="Mudah" {{ request('tingkat_kesulitan') == 'Mudah' ? 'selected' : '' }}>Mudah
                            </option>
                            <option value="Sedang" {{ request('tingkat_kesulitan') == 'Sedang' ? 'selected' : '' }}>Sedang
                            </option>
                            <option value="Sulit" {{ request('tingkat_kesulitan') == 'Sulit' ? 'selected' : '' }}>Sulit
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Opsi Cetak</label>
                        <select name="acak" class="form-select" required>
                            <option value="tidak" {{ request('acak') == 'tidak' ? 'selected' : '' }}>Urutkan Asli</option>
                            <option value="ya" {{ request('acak') == 'ya' ? 'selected' : '' }}>Acak Soal</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Tampilkan Soal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(count($soals) > 0)
        <div class="alert alert-success d-flex justify-content-between align-items-center">
            <span>Ditemukan <b>{{ count($soals) }}</b> soal yang sesuai dengan kriteria.</span>
            {{-- Tombol Cetak yang Membawa Parameter Filter --}}
            <a href="/ujian/cetak?mata_kuliah_id={{ request('mata_kuliah_id') }}&tingkat_kesulitan={{ request('tingkat_kesulitan') }}"
                target="_blank" class="btn btn-success fw-bold">
                🖨️ Cetak Lembar Ujian
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                @foreach($soals as $s)
                    <div class="mb-4">
                        <p class="mb-2"><b>{{ $loop->iteration }}.</b> {{ $s->pertanyaan }}</p>
                        <ol type="A" class="mb-0">
                            <li>{{ $s->opsi_a }}</li>
                            <li>{{ $s->opsi_b }}</li>
                            <li>{{ $s->opsi_c }}</li>
                            <li>{{ $s->opsi_d }}</li>
                        </ol>
                    </div>
                    <hr>    
                @endforeach
            </div>
        </div>
    @elseif(request()->has('mata_kuliah_id'))
        <div class="alert alert-warning">
            Tidak ada soal yang ditemukan untuk kriteria ini.
        </div>
    @endif
@endsection
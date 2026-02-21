<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lembar Ujian</title>
    <style>
        body { font-family: 'Times New Roman', serif; padding: 20px; line-height: 1.5; }
        .kop-surat { text-align: center; border-bottom: 3px solid black; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-surat h2, .kop-surat h4 { margin: 0; }
        .identitas { margin-bottom: 30px; }
        .identitas table { width: 100%; }
        .soal-item { margin-bottom: 20px; }
        .opsi { margin-left: 20px; }
    </style>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body>

    <div class="kop-surat">
        <h2>UNIVERSITAS TEKNOLOGI MASA DEPAN</h2>
        <h4>LEMBAR SOAL UJIAN AKHIR SEMESTER</h4>
    </div>

    <div class="identitas">
        <table>
            <tr>
                <td width="15%"><b>Mata Kuliah</b></td>
                <td>: {{ $soals[0]->mata_kuliah->nama_matkul ?? '-' }} ({{ $soals[0]->mata_kuliah->kode_matkul ?? '-' }})</td>
                <td width="15%"><b>Nama</b></td>
                <td>: .......................................</td>
            </tr>
            <tr>
                <td><b>Sifat Ujian</b></td>
                <td>: Tutup Buku</td>
                <td><b>NIM</b></td>
                <td>: .......................................</td>
            </tr>
        </table>
    </div>

    <div class="daftar-soal">
        @foreach($soals as $s)
            <div class="soal-item">
                <div><b>{{ $loop->iteration }}.</b> {{ $s->pertanyaan }}</div>
                <div class="opsi">A. {{ $s->opsi_a }}</div>
                <div class="opsi">B. {{ $s->opsi_b }}</div>
                <div class="opsi">C. {{ $s->opsi_c }}</div>
                <div class="opsi">D. {{ $s->opsi_d }}</div>
            </div>
        @endforeach
    </div>

    <script>
        // Tunggu MathJax merender rumus 2 detik, lalu otomatis munculkan dialog print
        setTimeout(function() {
            window.print();
        }, 2000);
    </script>
</body>
</html>
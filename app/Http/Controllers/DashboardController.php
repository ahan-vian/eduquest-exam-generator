<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // 1. Kira jumlah Mata Kuliah
        $totalMatkul = Matakuliah::where('user_id', $userId)->count();

        // 2. Ambil semua Soal milik pensyarah ini
        $soals = Soal::whereHas('mata_kuliah', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        $totalSoal = $soals->count();

        // 3. Kira komposisi tahap kesukaran
        $kesulitan = [
            'Mudah' => $soals->where('tingkat_kesulitan', 'Mudah')->count(),
            'Sedang' => $soals->where('tingkat_kesulitan', 'Sedang')->count(),
            'Sulit' => $soals->where('tingkat_kesulitan', 'Sulit')->count(),
        ];

        // 4. Sediakan data untuk Carta Palang (Bar Chart) - Jumlah Soal per Mata Kuliah
        $matkuls = Matakuliah::where('user_id', $userId)->get();
        $labelMatkul = [];
        $dataMatkul = [];
        
        // Kumpulkan data soalan berdasarkan ID mata kuliah
        $soalPerMatkul = $soals->groupBy('mata_kuliah_id');

        foreach($matkuls as $mk) {
            $labelMatkul[] = $mk->nama_matkul;
            // Jika ada soalan untuk matkul ini, kira jumlahnya. Jika tiada, set 0.
            $dataMatkul[] = isset($soalPerMatkul[$mk->id]) ? $soalPerMatkul[$mk->id]->count() : 0;
        }

        return view('dashboard', compact('totalMatkul', 'totalSoal', 'kesulitan', 'labelMatkul', 'dataMatkul'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Auth;
class UjianController extends Controller
{
    public function index(Request $request)
    {
        $matakuliah = Matakuliah::where('user_id', Auth::id())->get();
        $soals = [];

        if ($request->has('mata_kuliah_id') && $request->mata_kuliah_id != '') {
            $query = Soal::where('mata_kuliah_id', $request->mata_kuliah_id);
            if ($request->has('tingkat_kesulitan') && $request->tingkat_kesulitan != 'Semua' && $request->tingkat_kesulitan != '') {
                $query->where('tingkat_kesulitan', $request->tingkat_kesulitan);
            }
            $soals = $query->orderBy('tingkat_kesulitan', 'asc')->get();
        }

        return view('ujian.index', compact('matakuliah', 'soals'));
    }

    public function cetak(Request $request)
    {
        $request->validate([
            'selected_soal' => 'required|array|min:1',
        ], [
            'selected_soal.required' => 'Gagal! Anda harus menceklis minimal 1 soal untuk dicetak.'
        ]);
        $query_soal = Soal::with('mata_kuliah')->whereIn('id', $request->selected_soal)->get();
        if ($request->has('acak') && $request->acak == 'ya') {
            $soals = $query_soal->shuffle();
        } else {
            $soals = $query_soal;
        }

        return view('ujian.cetak', ['soals' => $soals]);
    }
}

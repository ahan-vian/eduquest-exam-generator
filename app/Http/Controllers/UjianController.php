<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Matakuliah;
class UjianController extends Controller
{
    public function index(Request $request)
    {
        $matakuliah = Matakuliah::all();
        if ($request->has('mata_kuliah_id') && $request->has('tingkat_kesulitan')) {
            $soal = Soal::where('mata_kuliah_id', $request->mata_kuliah_id)->where('tingkat_kesulitan', $request->tingkat_kesulitan)->get();
        } else {
            $soal = [];
        }
        return view('ujian.index', ['matakuliah' => $matakuliah, 'soals' => $soal]);
    }
    public function cetak(Request $request)
    {
        $matakuliah = Matakuliah::all();
        if ($request->has('mata_kuliah_id') && $request->has('tingkat_kesulitan')) {
            $soal = Soal::with('mata_kuliah')->where('mata_kuliah_id', $request->mata_kuliah_id)->where('tingkat_kesulitan', $request->tingkat_kesulitan)->get();
        } else {
            $soal = [];
        }
        return view('ujian.cetak', ['soals' => $soal]);
    }
}

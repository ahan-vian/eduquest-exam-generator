<?php

namespace App\Http\Controllers;
use App\Models\Soal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SoalController extends Controller
{
    public function index()
    {
        $soal = Soal::whereHas('mata_kuliah', function($quary){
            $quary->where('user_id', Auth::id());
        })->with('mata_kuliah')->get();
        return view('soal.index',['soals'=> $soal]);
    }
    public function create()
    {
        $mata_kuliah = Matakuliah::all();
        return view('soal.create', ['matakuliah' => $mata_kuliah]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mata_kuliah_id' => 'required',
            'topik' => 'required',
            'pertanyaan' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'kunci_jawaban' => 'required',
            'tingkat_kesulitan'=> 'required'
        ]);
        Soal::create($request->all());
        return redirect('/soal')->with('success to add');
    }

    public function destroy($id){
        Soal::find($id)->delete();
        return redirect('/soal')->with('success to delete');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Soal;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            'tingkat_kesulitan'=> 'required',
            'gambar'=> 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        $path = null;
        if($request->hasFile('gambar')){
            $path = $request->file('gambar')->store('soal_image','public');
        }
        Soal::create([
            'mata_kuliah_id'=>$request->mata_kuliah_id,
            'topik'=>$request->topik,
            'pertanyaan'=>$request->pertanyaan,
            'opsi_a'=>$request->opsi_a,
            'opsi_b'=>$request->opsi_b,
            'opsi_c'=>$request->opsi_c,
            'opsi_d'=>$request->opsi_d,
            'kunci_jawaban'=>$request->kunci_jawaban,
            'tingkat_kesulitan'=>$request->tingkat_kesulitan,
            'gambar'=>$path
        ]);
        //Soal::create($request->all());
        return redirect('/soal')->with('success to add');
    }

    public function destroy($id){
        $soal = Soal::find($id);
        if($soal->gambar){
            Storage::disk('public')->delete($soal->gambar);
        }
        $soal->delete();
        return redirect('/soal')->with('success to delete');
    }
}

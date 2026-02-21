<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use illuminate\Support\Facades\Auth;
class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::where("user_id", Auth::id())->orderBy("created_at","desc")->get();
        return view("matakuliah.index", ["matakuliah" => $matakuliah]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "kode_matkul" => "required|unique:matakuliahs",
            "nama_matkul" => "required",
            "sks" => "required|numeric|min:1"
        ]);
        Matakuliah::create([
            "user_id"=> Auth::id(),
            "kode_matkul"=> $request->kode_matkul,
            "nama_matkul"=> $request->nama_matkul,
            "sks"=> $request->sks
        ]);
        return redirect('/matakuliah')->with("sukses","Mata Kuliah Berhasil ditambahkan!");
    }
    public function destroy($id){
        Matakuliah::find($id)->delete();
        return redirect('/matakuliah')->with("sukses","Mata Kuliah Berhasil dihapus!");
    }
}

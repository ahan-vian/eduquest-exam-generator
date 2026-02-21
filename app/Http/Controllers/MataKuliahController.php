<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
class MataKuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::orderBy("created_at", "desc")->get();
        return view("matakuliah.index", ["matakuliah" => $matakuliah]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "kode_matkul" => "required|unique:matakuliahs",
            "nama_matkul" => "required",
            "sks" => "required|numeric|min:1"
        ]);
        Matakuliah::create($request->all());
        return redirect('/matakuliah')->with("sukses","Mata Kuliah Berhasil ditambahkan!");
    }
    public function destroy($id){
        Matakuliah::find($id)->delete();
        return redirect('/matakuliah')->with("sukses","Mata Kuliah Berhasil dihapus!");
    }
}

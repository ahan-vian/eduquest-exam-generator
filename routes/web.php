<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\MataKuliahController;
Route::get('/', function () {
    return view('welcome');
});

//=======Route Soal==========
Route::get('/soal',[SoalController::class,'index'] );
Route::get('/soal/tambah',[SoalController::class,'create'] );
Route::post('/soal/store',[SoalController::class,'store'] );
Route::get('/soal/hapus/{id}', [SoalController::class,'destroy'] );

//========Route Matkul========
Route::get('/matakuliah',[MataKuliahController::class,'index'] );
Route::post('/matakuliah/store',[MataKuliahController::class,'store']);
Route::get('/matakuliah/hapus/{id}',[MataKuliahController::class,'destroy'] );
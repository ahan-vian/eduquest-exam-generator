<?php

use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//========Route Auth=========
Route::get('/login', [AuthController::class, 'tampillogin'])->name('login');
Route::post('/login', [AuthController::class, 'proseslogin']);
Route::get('/register', [AuthController::class, 'tampilregister']);
Route::post('/register', [AuthController::class, 'prosesregister']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    //=======Route Soal==========
    Route::get('/soal', [SoalController::class, 'index']);
    Route::get('/soal/tambah', [SoalController::class, 'create']);
    Route::post('/soal/store', [SoalController::class, 'store']);
    Route::get('/soal/hapus/{id}', [SoalController::class, 'destroy']);
    Route::post('/soal/import', [SoalController::class, 'import']);

    //========Route Matkul========
    Route::get('/matakuliah', [MataKuliahController::class, 'index']);
    Route::post('/matakuliah/store', [MataKuliahController::class, 'store']);
    Route::get('/matakuliah/hapus/{id}', [MataKuliahController::class, 'destroy']);

    //======Route Ujian========
    Route::get('/ujian', [UjianController::class, 'index']);
    Route::get('/ujian/cetak', [UjianController::class, 'cetak']);
});
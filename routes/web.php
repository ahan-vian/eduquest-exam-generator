<?php

use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //=======Route Soal==========
    Route::get('/soal', [SoalController::class, 'index']);
    Route::get('/soal/tambah', [SoalController::class, 'create']);
    Route::post('/soal/store', [SoalController::class, 'store']);
    Route::get('/soal/hapus/{id}', [SoalController::class, 'destroy']);
    Route::post('/soal/import', [SoalController::class, 'import']);
    Route::get('/soal/edit/{id}', [SoalController::class, 'edit']);
    Route::post('/soal/update/{id}', [SoalController::class, 'update']);

    //========Route Matkul========
    Route::get('/matakuliah', [MataKuliahController::class, 'index']);
    Route::post('/matakuliah/store', [MataKuliahController::class, 'store']);
    Route::get('/matakuliah/hapus/{id}', [MataKuliahController::class, 'destroy']);

    //======Route Ujian========
    Route::get('/ujian', [UjianController::class, 'index']);
    Route::post('/ujian/cetak', [UjianController::class, 'cetak']);
});
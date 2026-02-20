<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $fillable = [
        "kode_matkul",
        "nama_matkul",
        "sks"
    ];

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
}

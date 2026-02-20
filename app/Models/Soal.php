<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        "mata_kuliah_id",
        "topik",
        "pertanyaan",
        "opsi_a",
        "opsi_b",
        "opsi_c",
        "opsi_d",
        "kunci_jawaban",
        "tingkat_kesulitan"
    ];

    public function mata_kuliah(){
        return $this->belongsTo(Matakuliah::class);
    }

}

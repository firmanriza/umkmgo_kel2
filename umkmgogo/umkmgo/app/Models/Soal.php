<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'pertanyaan',
        'pilihan_a',
        'pilihan_b',
        'pilihan_c',
        'pilihan_d',
        'jawaban_benar',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}

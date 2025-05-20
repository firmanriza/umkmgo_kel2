<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    // Relasi ke model kategori (kategori_umkm)    use HasFactory;

    protected $fillable = [
        'nama_quiz',
        'kategori_id',
    ];

    // Relasi ke model kategori (kategori_umkm)
    public function kategori()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_id');
    }

    // Relasi ke soal-soal dalam quiz
    public function soals()
    {
        return $this->hasMany(Soal::class); // pastikan model Soal sudah dibuat
    }
}

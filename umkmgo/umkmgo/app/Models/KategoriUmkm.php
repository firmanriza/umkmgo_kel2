<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    use HasFactory;

    protected $table = 'kategori_umkms';

    protected $fillable = ['nama_kategori'];

    // Relasi ke model Quiz
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'kategori_id');
    }

}

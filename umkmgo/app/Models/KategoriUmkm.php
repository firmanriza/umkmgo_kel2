<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    use HasFactory;

    protected $table = 'kategori_umkms';

    protected $fillable = [
        'nama_kategori',
    ];

    /**
     * Get all quizzes related to this category.
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'kategori_id');
    }

    /**
     * Get initial quizzes (non-final) for this category.
     */
    public function initialQuizzes()
    {
        return $this->quizzes()->where('nama_quiz', 'NOT LIKE', '%Final%');
    }

    /**
     * Get final quizzes for this category.
     */
    public function finalQuizzes()
    {
        return $this->quizzes()->where('nama_quiz', 'LIKE', '%Final%');
    }
}

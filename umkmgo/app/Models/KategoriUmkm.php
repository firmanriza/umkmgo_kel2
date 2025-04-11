<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    // Relasi ke model Quiz
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'kategori_id');
    }

}

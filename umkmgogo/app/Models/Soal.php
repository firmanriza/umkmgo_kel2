<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}

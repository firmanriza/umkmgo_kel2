<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'user_id',
        'class_id',
        'quiz_id',
        'certificate_path',
        'issued_at',
    ];

    protected $dates = [
        'issued_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}

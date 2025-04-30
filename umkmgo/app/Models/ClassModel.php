<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'title',
        'kategori_umkm_id',
        'field',
        'level',
        'type',
        'description',
        'video_url',
        'schedule_info',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_umkm_id');
    }

    public static function getAvailableFields()
    {
        return ['marketing', 'produksi', 'service'];
    }
}

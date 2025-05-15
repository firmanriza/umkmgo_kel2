<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
<<<<<<< Updated upstream
        'material_pdf',
=======
>>>>>>> Stashed changes
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

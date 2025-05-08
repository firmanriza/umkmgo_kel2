<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkms';

    protected $fillable = [
        'user_id',
        'kategori_umkm_id',
        'nama_umkm',
        'alamat',
        'telepon',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoriUmkm()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_umkm_id');
    }
}

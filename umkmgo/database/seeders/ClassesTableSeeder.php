<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $kategoriUmkm = [
        1 => 'KULINER',
        2 => 'FASHION',
        3 => 'JASA',
        4 => 'KERAJINAN',
    ];

    $fields = ['marketing', 'produksi', 'service'];
    $level = 'beginner';

    $classes = [];

    foreach ($kategoriUmkm as $id => $kategori) {
        foreach ($fields as $field) {
            $classes[] = [
                'title' => "{$kategori} - " . strtoupper($field),
                'description' => "Kelas {$field} untuk kategori {$kategori}",
                'material_pdf' => null,
                'type' => 'daring',
                'kategori_umkm_id' => $id,
                'field' => $field,
                'level' => $level,
                'video_url' => null,
                'schedule_info' => null,
            ];
        }
    }

    DB::table('classes')->insert($classes);
}
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Forum;

class ForumSeeder extends Seeder
{
    public function run()
    {
        $forums = [
            [
                'title' => 'Tips Memulai Usaha UMKM',
                'content' => 'Berbagi tips dan trik memulai usaha UMKM yang sukses.',
                'user_id' => 1,
            ],
            [
                'title' => 'Strategi Pemasaran Online',
                'content' => 'Diskusi tentang strategi pemasaran online untuk UMKM.',
                'user_id' => 1,
            ],
            [
                'title' => 'Manajemen Keuangan UMKM',
                'content' => 'Cara mengelola keuangan usaha kecil dan menengah.',
                'user_id' => 1,
            ],
            [
                'title' => 'Pengembangan Produk Baru',
                'content' => 'Ide dan inovasi untuk produk UMKM.',
                'user_id' => 1,
            ],
            [
                'title' => 'Penggunaan Media Sosial',
                'content' => 'Bagaimana memanfaatkan media sosial untuk bisnis UMKM.',
                'user_id' => 1,
            ],
        ];

        foreach ($forums as $forum) {
            Forum::create($forum);
        }
    }
}

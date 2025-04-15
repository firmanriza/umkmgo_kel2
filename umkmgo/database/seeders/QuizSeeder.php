<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriUmkm;
use App\Models\Quiz;
use App\Models\Soal;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'Kuliner' => [
                [
                    'pertanyaan' => 'Apakah produk kuliner kamu memiliki izin PIRT atau BPOM?',
                    'pilihan' => ['Sudah', 'Belum', 'Sedang diproses', 'Tidak tahu'],
                    'jawaban' => 'Sudah',
                ],
                [
                    'pertanyaan' => 'Apakah kamu memiliki menu andalan yang laris dijual?',
                    'pilihan' => ['Ya', 'Tidak', 'Masih uji coba', 'Tidak yakin'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Berapa lama rata-rata waktu produksi kamu per hari?',
                    'pilihan' => ['<1 jam', '1-3 jam', '3-5 jam', '>5 jam'],
                    'jawaban' => '1-3 jam',
                ],
                [
                    'pertanyaan' => 'Apakah kamu sudah menjual lewat online?',
                    'pilihan' => ['Ya', 'Belum', 'Sedang disiapkan', 'Tidak ingin'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Sudahkah kamu menghitung HPP produk?',
                    'pilihan' => ['Sudah', 'Belum', 'Sedikit tahu', 'Tidak tahu HPP'],
                    'jawaban' => 'Sudah',
                ],
            ],
            'Fashion' => [
                [
                    'pertanyaan' => 'Apakah kamu memiliki katalog produk fashion digital?',
                    'pilihan' => ['Ya', 'Belum', 'Dalam proses', 'Tidak perlu'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Apakah produk fashion kamu memiliki ciri khas?',
                    'pilihan' => ['Ya', 'Tidak', 'Masih dikembangkan', 'Tidak tahu'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Sudahkah kamu ikut pameran atau bazar?',
                    'pilihan' => ['Sudah sering', 'Kadang-kadang', 'Belum pernah', 'Tidak tahu caranya'],
                    'jawaban' => 'Sudah sering',
                ],
                [
                    'pertanyaan' => 'Apakah kamu menerima pesanan custom?',
                    'pilihan' => ['Ya', 'Tidak', 'Terkadang', 'Belum pernah coba'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Apakah kamu sudah bekerja sama dengan reseller?',
                    'pilihan' => ['Sudah', 'Belum', 'Sedang mencari', 'Tidak tertarik'],
                    'jawaban' => 'Sudah',
                ],
            ],
            'Jasa' => [
                [
                    'pertanyaan' => 'Apakah kamu memiliki SOP layanan jasa kamu?',
                    'pilihan' => ['Ya', 'Belum', 'Sedang dibuat', 'Tidak tahu SOP'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Apakah kamu memiliki testimoni pelanggan?',
                    'pilihan' => ['Sudah banyak', 'Beberapa', 'Belum ada', 'Tidak tahu pentingnya'],
                    'jawaban' => 'Sudah banyak',
                ],
                [
                    'pertanyaan' => 'Bagaimana sistem reservasi jasa kamu?',
                    'pilihan' => ['Online', 'Manual', 'Keduanya', 'Tidak ada sistem'],
                    'jawaban' => 'Online',
                ],
                [
                    'pertanyaan' => 'Apakah jasa kamu bisa diakses di media sosial?',
                    'pilihan' => ['Ya', 'Tidak', 'Belum aktif', 'Tidak tahu caranya'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Apakah kamu pernah melakukan promosi layanan?',
                    'pilihan' => ['Sering', 'Kadang-kadang', 'Belum pernah', 'Tidak tahu caranya'],
                    'jawaban' => 'Sering',
                ],
            ],
            'Kerajinan' => [
                [
                    'pertanyaan' => 'Apakah produk kerajinan kamu dibuat dari bahan lokal?',
                    'pilihan' => ['Ya', 'Tidak', 'Campuran', 'Tidak tahu bahan'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Sudahkah kamu mengembangkan kemasan produk kerajinanmu?',
                    'pilihan' => ['Sudah', 'Belum', 'Masih sederhana', 'Tidak pakai kemasan'],
                    'jawaban' => 'Sudah',
                ],
                [
                    'pertanyaan' => 'Apakah produkmu memiliki nilai seni atau cerita budaya?',
                    'pilihan' => ['Ya', 'Tidak', 'Belum pasti', 'Tidak tahu'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Apakah kamu sudah menjual ke luar kota atau luar negeri?',
                    'pilihan' => ['Ya', 'Belum', 'Sedang proses', 'Tidak tertarik ekspansi'],
                    'jawaban' => 'Ya',
                ],
                [
                    'pertanyaan' => 'Apakah kamu punya katalog produk kerajinan online?',
                    'pilihan' => ['Sudah', 'Belum', 'Sedang dibuat', 'Tidak tahu pentingnya'],
                    'jawaban' => 'Sudah',
                ],
            ],
        ];

        foreach ($kategoris as $nama_kategori => $soals) {
            $kategori = KategoriUmkm::firstOrCreate(['nama_kategori' => $nama_kategori]);

            $quiz = Quiz::create([
                'nama_quiz' => 'Kuis UMKM ' . $nama_kategori,
                'kategori_id' => $kategori->id
            ]);

            foreach ($soals as $data) {
                Soal::create([
                    'quiz_id' => $quiz->id,
                    'pertanyaan' => $data['pertanyaan'],
                    'pilihan_a' => $data['pilihan'][0],
                    'pilihan_b' => $data['pilihan'][1],
                    'pilihan_c' => $data['pilihan'][2],
                    'pilihan_d' => $data['pilihan'][3],
                    'jawaban_benar' => $data['jawaban']
                ]);
            }
        }
    }
}
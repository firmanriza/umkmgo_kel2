<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Soal;
use App\Models\KategoriUmkm;

class FinalQuizSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Kuliner' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah omzet penjualan meningkat setelah promosi digital?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah brand kulinermu dikenal oleh pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu dapat menjelaskan diferensiasi produkmu?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mengevaluasi performa kampanye promosi?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan data pelanggan untuk promosi ulang?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah kamu mampu memenuhi pesanan besar dengan cepat?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya sistem kontrol kualitas produksi?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mampu menyesuaikan menu dengan tren pasar?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki peralatan produksi modern?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu melakukan evaluasi rutin terhadap produksi?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah pelanggan memberikan review positif?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki sistem loyalitas pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan CRM untuk layanan pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki SOP pelayanan pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mampu memberikan pengalaman pelanggan yang konsisten?', 'jawaban' => 'Ya'],
                ],
            ],
            'Fashion' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah kamu memiliki target peningkatan penjualan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menganalisis kompetitor secara rutin?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu sudah menggunakan iklan berbayar?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menjual lewat berbagai channel?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan feedback pelanggan untuk strategi promosi?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah kamu memiliki workshop sendiri?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu membuat prototype sebelum produksi massal?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mengadopsi tren fashion terbaru?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu melakukan quality check sebelum pengiriman?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya alternatif bahan saat bahan utama habis?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah kamu mendapat banyak repeat order?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah pelanggan merekomendasikan produkmu?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memberikan update status pesanan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah layanan after sales kamu cepat?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memberikan kemudahan retur barang?', 'jawaban' => 'Ya'],
                ],
            ],
            'Jasa' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah kamu mengiklankan jasamu secara terarah?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mengetahui customer journey pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan email marketing?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menyesuaikan promosi dengan tren industri?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu melakukan evaluasi hasil promosi?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah SOP layanan diterapkan dengan disiplin?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mengevaluasi hasil kerja tim?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menyediakan pelatihan bagi staf?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah alat bantu jasamu dalam kondisi optimal?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mampu menangani proyek besar?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah kamu memberikan laporan layanan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya customer service aktif?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah pelanggan puas dengan layananmu?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki rating tinggi dari klien?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mendapatkan referral dari pelanggan lama?', 'jawaban' => 'Ya'],
                ],
            ],
            'Kerajinan' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah kamu menggunakan strategi branding untuk kerajinanmu?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memasarkan produk melalui media sosial?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki toko online untuk produk kerajinan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu pernah bekerjasama dengan influencer kerajinan?', 'jawaban' => 'Tidak'],
                    ['pertanyaan' => 'Apakah kamu memiliki data pelanggan tetap?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah kamu menggunakan bahan baku berkualitas tinggi?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah proses produksi kamu dilakukan secara manual?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki jadwal produksi rutin?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mencatat biaya produksi secara detail?', 'jawaban' => 'Sudah'],
                    ['pertanyaan' => 'Apakah kamu melakukan kontrol kualitas sebelum produk dijual?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah kamu memberikan layanan custom desain kerajinan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memberikan garansi untuk kerusakan produk?', 'jawaban' => 'Tidak'],
                    ['pertanyaan' => 'Apakah kamu cepat menanggapi pesanan dari pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu melayani pesanan dari luar kota atau luar negeri?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki layanan pengemasan eksklusif?', 'jawaban' => 'Ya'],
                ],
            ],
        ];

        foreach ($data as $kategoriNama => $bidangList) {
            $kategori = KategoriUmkm::firstOrCreate(['nama_kategori' => $kategoriNama]);

            $quiz = Quiz::create([
                'nama_quiz' => 'Final Kuis Akhir UMKM ' . $kategoriNama,
                'kategori_id' => $kategori->id
            ]);

            foreach ($bidangList as $bidang => $soals) {
                foreach ($soals as $soal) {
                    Soal::create([
                        'quiz_id' => $quiz->id,
                        'pertanyaan' => $soal['pertanyaan'],
                        'pilihan_a' => 'Ya',
                        'pilihan_b' => 'Tidak',
                        'pilihan_c' => 'Kadang-kadang',
                        'pilihan_d' => 'Tidak tahu',
                        'jawaban_benar' => $soal['jawaban'],
                        'bidang' => $bidang,
                    ]);
                }
            }
        }
    }
}

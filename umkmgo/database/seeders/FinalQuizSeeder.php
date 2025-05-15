<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Soal;
use App\Models\KategoriUmkm;

class FinalQuizSeeder extends Seeder
{
<<<<<<< Updated upstream
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
                'nama_quiz' => 'Kuis Akhir UMKM ' . $kategoriNama,
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
=======
    public function run()
    {
        // Kuliner Quiz
        $kulinerKategori = KategoriUmkm::where('nama_kategori', 'Kuliner')->first();
        if ($kulinerKategori) {
            $kulinerQuiz = Quiz::create([
                'nama_quiz' => 'Kuis Final Kuliner',
                'kategori_id' => $kulinerKategori->id
            ]);

            Soal::create([
                'quiz_id' => $kulinerQuiz->id,
                'pertanyaan' => 'Dalam pengembangan bisnis kuliner, apa strategi terbaik untuk melakukan penetapan harga yang kompetitif?',
                'pilihan_a' => 'Menetapkan harga serendah mungkin',
                'pilihan_b' => 'Menganalisis food cost, overhead cost, dan profit margin yang diinginkan',
                'pilihan_c' => 'Mengikuti harga pesaing',
                'pilihan_d' => 'Menetapkan harga setinggi mungkin',
                'jawaban_benar' => 'B'
            ]);

            Soal::create([
                'quiz_id' => $kulinerQuiz->id,
                'pertanyaan' => 'Bagaimana cara terbaik mengelola inventory bahan makanan untuk meminimalkan food waste?',
                'pilihan_a' => 'Membeli bahan dalam jumlah besar untuk mendapat diskon',
                'pilihan_b' => 'Menggunakan sistem FIFO (First In First Out) dan melakukan stock opname rutin',
                'pilihan_c' => 'Menyimpan semua bahan dalam freezer',
                'pilihan_d' => 'Membeli bahan setiap hari dalam jumlah kecil',
                'jawaban_benar' => 'B'
            ]);

            Soal::create([
                'quiz_id' => $kulinerQuiz->id,
                'pertanyaan' => 'Apa strategi scaling up yang tepat untuk bisnis kuliner?',
                'pilihan_a' => 'Membuka cabang sebanyak mungkin',
                'pilihan_b' => 'Standardisasi resep, sistem operasi, dan quality control yang ketat',
                'pilihan_c' => 'Menambah menu sebanyak mungkin',
                'pilihan_d' => 'Mengurangi harga jual',
                'jawaban_benar' => 'B'
            ]);
        }

        // Fashion Quiz
        $fashionKategori = KategoriUmkm::where('nama_kategori', 'Fashion')->first();
        if ($fashionKategori) {
            $fashionQuiz = Quiz::create([
                'nama_quiz' => 'Kuis Final Fashion',
                'kategori_id' => $fashionKategori->id
            ]);

            Soal::create([
                'quiz_id' => $fashionQuiz->id,
                'pertanyaan' => 'Bagaimana strategi terbaik dalam mengembangkan brand fashion yang sustainable?',
                'pilihan_a' => 'Menggunakan bahan berkualitas rendah untuk menekan biaya',
                'pilihan_b' => 'Mengimplementasikan sistem pre-order dan zero waste production',
                'pilihan_c' => 'Memproduksi dalam jumlah besar',
                'pilihan_d' => 'Mengikuti semua tren fashion',
                'jawaban_benar' => 'B'
            ]);

            Soal::create([
                'quiz_id' => $fashionQuiz->id,
                'pertanyaan' => 'Apa pendekatan terbaik dalam mengelola rantai pasok fashion?',
                'pilihan_a' => 'Mencari supplier dengan harga termurah',
                'pilihan_b' => 'Membangun hubungan jangka panjang dengan supplier dan mengoptimalkan inventory',
                'pilihan_c' => 'Menyimpan stok sebanyak mungkin',
                'pilihan_d' => 'Mengganti supplier secara rutin',
                'jawaban_benar' => 'B'
            ]);
        }

        // Kerajinan Quiz
        $kerajinanKategori = KategoriUmkm::where('nama_kategori', 'Kerajinan')->first();
        if ($kerajinanKategori) {
            $kerajinanQuiz = Quiz::create([
                'nama_quiz' => 'Kuis Final Kerajinan',
                'kategori_id' => $kerajinanKategori->id
            ]);

            Soal::create([
                'quiz_id' => $kerajinanQuiz->id,
                'pertanyaan' => 'Bagaimana strategi optimal untuk mengembangkan produk kerajinan di pasar internasional?',
                'pilihan_a' => 'Menurunkan kualitas untuk bersaing harga',
                'pilihan_b' => 'Mempertahankan nilai budaya sambil beradaptasi dengan tren global',
                'pilihan_c' => 'Mengikuti semua permintaan buyer',
                'pilihan_d' => 'Fokus pada pasar lokal saja',
                'jawaban_benar' => 'B'
            ]);

            Soal::create([
                'quiz_id' => $kerajinanQuiz->id,
                'pertanyaan' => 'Apa kunci sukses dalam mengembangkan produk kerajinan yang inovatif?',
                'pilihan_a' => 'Meniru produk yang sudah ada',
                'pilihan_b' => 'Melakukan riset pasar dan mengembangkan desain yang unik',
                'pilihan_c' => 'Membuat produk sebanyak mungkin',
                'pilihan_d' => 'Fokus pada harga murah',
                'jawaban_benar' => 'B'
            ]);
        }

        // Jasa Quiz
        $jasaKategori = KategoriUmkm::where('nama_kategori', 'Jasa')->first();
        if ($jasaKategori) {
            $jasaQuiz = Quiz::create([
                'nama_quiz' => 'Kuis Final Jasa',
                'kategori_id' => $jasaKategori->id
            ]);

            Soal::create([
                'quiz_id' => $jasaQuiz->id,
                'pertanyaan' => 'Bagaimana cara terbaik mengukur dan meningkatkan kualitas layanan?',
                'pilihan_a' => 'Fokus pada jumlah pelanggan',
                'pilihan_b' => 'Implementasi sistem feedback, evaluasi berkala, dan pelatihan tim',
                'pilihan_c' => 'Menurunkan harga',
                'pilihan_d' => 'Menambah jam operasional',
                'jawaban_benar' => 'B'
            ]);

            Soal::create([
                'quiz_id' => $jasaQuiz->id,
                'pertanyaan' => 'Apa strategi scaling yang efektif untuk bisnis jasa?',
                'pilihan_a' => 'Menambah karyawan sebanyak mungkin',
                'pilihan_b' => 'Standardisasi proses, dokumentasi SOP, dan sistem manajemen yang terukur',
                'pilihan_c' => 'Menurunkan harga layanan',
                'pilihan_d' => 'Mengurangi kualitas layanan',
                'jawaban_benar' => 'B'
            ]);

            Soal::create([
                'quiz_id' => $jasaQuiz->id,
                'pertanyaan' => 'Bagaimana cara optimal mengelola tim dalam bisnis jasa?',
                'pilihan_a' => 'Memberikan gaji tinggi',
                'pilihan_b' => 'Implementasi sistem KPI, pelatihan berkala, dan pengembangan karir',
                'pilihan_c' => 'Rotasi karyawan rutin',
                'pilihan_d' => 'Outsourcing semua pekerjaan',
                'jawaban_benar' => 'B'
            ]);
        }
    }
}
>>>>>>> Stashed changes

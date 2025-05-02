<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Soal;
use App\Models\KategoriUmkm;

class FinalQuizSeeder extends Seeder
{
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

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
        $data = [
            'Kuliner' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah kamu sudah mempromosikan produk kuliner secara digital?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu aktif di media sosial untuk pemasaran produk?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu tahu siapa target pasarmu?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Sudahkah kamu membuat konten promosi secara rutin?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki strategi promosi tertentu?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah kamu memiliki dapur produksi sendiri?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Berapa lama waktu rata-rata produksi harianmu?', 'jawaban' => '1-3 jam'],
                    ['pertanyaan' => 'Apakah kamu menggunakan resep yang konsisten?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Sudahkah kamu menghitung HPP?', 'jawaban' => 'Sudah'],
                    ['pertanyaan' => 'Apakah kamu punya stok bahan baku cadangan?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah kamu melayani pembelian secara online?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu merespons komplain pelanggan dengan cepat?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki pelayanan antar?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu mencatat pesanan pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu pernah mendapatkan testimoni pelanggan?', 'jawaban' => 'Ya'],
                ],
            ],
            'Fashion' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah kamu memiliki katalog produk fashion?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menjual produk fashion di marketplace?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan influencer untuk promosi?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu membuat konten visual yang menarik?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki branding produk fashion?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah kamu memiliki penjahit atau produksi sendiri?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan bahan berkualitas?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memproduksi dalam jumlah terbatas atau massal?', 'jawaban' => 'Terbatas'],
                    ['pertanyaan' => 'Apakah kamu memiliki ukuran standar?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menjaga konsistensi model produk?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah kamu menerima pengembalian barang?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu melayani pelanggan dengan ramah?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memberikan kemudahan pembayaran?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu cepat merespons pertanyaan pembeli?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memberikan layanan after sales?', 'jawaban' => 'Ya'],
                ],
            ],
            'Jasa' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah kamu sudah membuat profil usaha jasamu?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan media sosial untuk jasa?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya testimoni pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan website atau platform digital?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya penawaran paket jasa menarik?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah kamu memiliki SOP layanan jasa?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menjamin kualitas hasil jasa?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki tim jasa yang kompeten?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu pernah mendapat pelatihan jasa?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya alat bantu kerja?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah kamu menyediakan layanan konsultasi?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menerima komplain jasa?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memberikan garansi jasa?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu melakukan follow-up pelanggan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menjaga komunikasi dengan klien?', 'jawaban' => 'Ya'],
                ],
            ],
            'Kerajinan' => [
                'Marketing' => [
                    ['pertanyaan' => 'Apakah kamu menjual kerajinan secara online?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu pernah mengikuti pameran kerajinan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan media sosial untuk promosi?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya katalog produk kerajinan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memiliki brand produk kerajinan?', 'jawaban' => 'Ya'],
                ],
                'Produksi' => [
                    ['pertanyaan' => 'Apakah kamu memproduksi sendiri kerajinanmu?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menggunakan bahan ramah lingkungan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya alat produksi kerajinan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menjaga kualitas kerajinan?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu punya stok barang jadi?', 'jawaban' => 'Ya'],
                ],
                'Service' => [
                    ['pertanyaan' => 'Apakah kamu melayani pemesanan custom?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu memberikan layanan packing menarik?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu cepat merespons pembeli?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menerima pengiriman ke luar kota?', 'jawaban' => 'Ya'],
                    ['pertanyaan' => 'Apakah kamu menyertakan kartu ucapan atau bonus?', 'jawaban' => 'Ya'],
                ],
            ],
        ];

        foreach ($data as $kategoriNama => $bidangList) {
            $kategori = KategoriUmkm::firstOrCreate(['nama_kategori' => $kategoriNama]);

            $quiz = Quiz::create([
                'nama_quiz' => 'Kuis UMKM ' . $kategoriNama,
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
                        'bidang' => $bidang,  // Ini sudah ada, pastikan bidangnya terisi dengan benar
                    ]);
                }
            }
        }
    }
}




<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Tips Sukses UMKM di Era Digital',
                'content' => 'Berbagai tips dan strategi untuk mengembangkan UMKM di era digital.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pentingnya Branding untuk UMKM',
                'content' => 'Branding sangat penting untuk meningkatkan daya saing UMKM.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cara Memasarkan Produk Secara Online',
                'content' => 'Panduan lengkap memasarkan produk UMKM secara online.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inovasi Produk UMKM',
                'content' => 'Contoh inovasi produk yang bisa diterapkan oleh pelaku UMKM.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mengelola Keuangan UMKM',
                'content' => 'Tips mengelola keuangan agar UMKM tetap sehat dan berkembang.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 
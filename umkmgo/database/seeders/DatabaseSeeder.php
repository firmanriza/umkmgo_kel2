<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cek apakah user dengan email test@example.com sudah ada
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
    
        $this->call(QuizSeeder::class);
        $this->call(FinalQuizSeeder::class);
        $this->call(ForumSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
    }
}

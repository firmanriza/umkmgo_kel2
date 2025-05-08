<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@umkmgo.com'],
            [
                'name' => 'Admin UMKMGo',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'mentor@umkmgo.com'],
            [
                'name' => 'Mentor UMKMGo',
                'password' => Hash::make('password'),
                'role' => 'mentor',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@umkmgo.com'],
            [
                'name' => 'User UMKMGo',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}

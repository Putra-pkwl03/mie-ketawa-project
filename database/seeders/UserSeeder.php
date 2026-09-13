<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat atau perbarui akun admin utama
        User::updateOrCreate(
            ['email' => 'adminkami@gmail.com'],
            [
                'name'     => 'Admin Utama',
                'password' => Hash::make('password123'), // Kata sandi bawaan
            ]
        );
    }
}
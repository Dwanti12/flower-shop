<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah user sudah ada
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
            $this->command->info('User admin berhasil dibuat!');
        } else {
            $this->command->info('User admin sudah ada!');
        }
    }
}
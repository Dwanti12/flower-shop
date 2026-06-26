<?php

namespace Database\Seeders;

use App\Models\Flower;
use Illuminate\Database\Seeder;

class FlowerSeeder extends Seeder
{
    public function run(): void
    {
        Flower::create([
            'kode_bunga' => 'B001',
            'nama_bunga' => 'Mawar Merah',
            'kategori' => 'Mawar',
            'harga' => 75000,
            'stok' => 50,
            'tanggal_masuk' => now(),
            'deskripsi' => 'Mawar merah segar dengan aroma harum',
        ]);

        Flower::create([
            'kode_bunga' => 'B002',
            'nama_bunga' => 'Anggrek Bulan',
            'kategori' => 'Anggrek',
            'harga' => 150000,
            'stok' => 25,
            'tanggal_masuk' => now(),
            'deskripsi' => 'Anggrek bulan putih elegan',
        ]);
    }
}
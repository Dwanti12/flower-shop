<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_bunga',
        'nama_bunga',
        'kategori',
        'harga',
        'stok',
        'tanggal_masuk',
        'deskripsi',
        'gambar'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'tanggal_masuk' => 'date'
    ];
}
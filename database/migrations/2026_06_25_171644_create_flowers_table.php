<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bunga')->unique();
            $table->string('nama_bunga');
            $table->string('kategori');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->date('tanggal_masuk');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flowers');
    }
};
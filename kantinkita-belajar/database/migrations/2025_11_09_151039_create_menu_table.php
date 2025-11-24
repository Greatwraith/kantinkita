<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_menu', function (Blueprint $table) {
            $table->id('id_menu'); // BIGINT UNSIGNED
            $table->string('nama_kategori', 50);
            $table->string('nama_menu', 100);
            $table->decimal('harga_menu', 12, 2);
            $table->text('deskripsi_menu');
            $table->string('gambar_menu', 255);
            $table->enum('status_menu', ['tersedia'])->default('tersedia');
            $table->integer('stok_menu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_menu');
    }
};

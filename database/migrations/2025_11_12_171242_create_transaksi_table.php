<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
             $table->unsignedInteger('id_user'); // relasi ke users
            $table->enum('status_pesanan', ['menunggu','completed','canceled'])->default('menunggu');
            $table->timestamps();

            // foreign key ke users (opsional, tapi direkomendasikan)
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};

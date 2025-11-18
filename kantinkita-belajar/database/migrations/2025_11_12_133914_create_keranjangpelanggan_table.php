<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_keranjangpelanggan', function (Blueprint $table) {
            $table->id('id_keranjang');
            $table->unsignedBigInteger('id_menu');
            $table->unsignedInteger('id_user');
            $table->integer('jumlah')->default(1);
            $table->integer('total_harga');
            $table->timestamp('created_at')->useCurrent();

            // Foreign key
            $table->foreign('id_menu')->references('id_menu')->on('tb_menu')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_keranjangpelanggan');
    }
};

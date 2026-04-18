<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_detailtransaksi', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_menu');
            $table->integer('jumlah')->default(1);
            $table->integer('harga_satuan');
            $table->integer('sub_total');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id_transaksi')->on('tb_transaksi')->onDelete('cascade');
            $table->foreign('id_menu')->references('id_menu')->on('tb_menu')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_detailtransaksi');
    }
};

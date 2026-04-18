<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_ulasan', function (Blueprint $table) {
            $table->id('id_ulasan'); // Primary key
           $table->unsignedInteger('id_user')->unique();
// Setiap user hanya bisa 1 ulasan
            $table->tinyInteger('rating')->comment('1-5'); // Rating bintang
            $table->text('ulasan'); // Teks ulasan
            $table->string('gambar')->nullable()->comment('Opsional, gambar ulasan');
            $table->timestamps();

            // Foreign key ke usersp
            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_ulasan');
    }
};

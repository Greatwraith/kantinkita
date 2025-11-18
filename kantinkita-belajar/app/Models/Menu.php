<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tb_menu';
    // Primary key-nya
    protected $primaryKey = 'id_menu';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_menu',
        'nama_kategori',
        'harga_menu',
        'deskripsi_menu',
        'gambar_menu',
        'status_menu',
        'stok_menu',
    ];
}

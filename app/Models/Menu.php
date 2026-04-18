<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'tb_menu';
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'nama_menu',
        'nama_kategori',
        'harga_menu',
        'deskripsi_menu',
        'gambar_menu',
        'status_menu',
        'stok_menu',
    ];

    // RELATIONS
    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_menu', 'id_menu');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_menu', 'id_menu');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'id_menu', 'id_menu');
    }
}



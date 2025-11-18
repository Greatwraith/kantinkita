<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'tb_keranjangpelanggan';
    protected $primaryKey = 'id_keranjang';
    public $timestamps = false;

    protected $fillable = [
        'id_menu',
        'id_user',
        'jumlah',
        'total_harga',
        'created_at',
    ];

    // Relasi ke menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    
    }



   
}


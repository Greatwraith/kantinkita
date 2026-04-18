<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id_transaksi';
public $incrementing = true;
protected $keyType = 'int';


    protected $fillable = [
        'id_user',
        'status_pesanan',
    ];

   
    // Relasi ke detail transaksi (satu transaksi punya banyak detail)
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }

    // 🔥 Tambahkan ini → relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'tb_ulasan';
    protected $primaryKey = 'id_ulasan';
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'rating',
        'ulasan',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}

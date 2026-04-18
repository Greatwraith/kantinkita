<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    // ❌ JANGAN pakai $with di User
    // protected $with = [];

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'nis',
        'kelas',
        'jurusan',
        'tanggal_lahir',
        'telepon',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // RELASI
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'id_user', 'id_user');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_user', 'id_user');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'id_user', 'id_user');
    }
}

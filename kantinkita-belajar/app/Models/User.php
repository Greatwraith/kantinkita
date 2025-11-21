<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;  // <- ini wajib

    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

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

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'id_user', 'id_user');
    }
}

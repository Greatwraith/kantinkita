<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'nis' => null,
            'kelas' => null,
            'jurusan' => null,               // harus huruf kecil sesuai db
            'tanggal_lahir' => '2000-01-01', // kasih tanggal dummy, jangan null
            'telepon' => '081234567890',     // isi dengan dummy nomor
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User biasa
        DB::table('users')->insert([
            'name' => 'User Biasa',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'nis' => '123456789012',
            'kelas' => '10A',
            'jurusan' => 'PPLG',
            'tanggal_lahir' => '2009-05-10',
            'telepon' => '081234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Ardhan',
            'username' => 'Ardhan',
            'email' => 'ardhan@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'nis' => '087689',
            'kelas' => '12A',
            'jurusan' => 'DKV',
            'tanggal_lahir' => '2009-05-10',
            'telepon' => '0888888',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('users')->insert([
            'name' => 'nabil',
            'username' => 'nabil',
            'email' => 'nabil@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'nis' => '00090',
            'kelas' => '11D',
            'jurusan' => 'PPLG',
            'tanggal_lahir' => '2009-05-10',
            'telepon' => '08808888',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

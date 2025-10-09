<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder pengguna.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'bio' => 'Akun super administrator',
                'role' => 'admin',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Member Satu',
                'username' => 'member',
                'email' => 'byrn.uiy@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'bio' => 'Akun anggota biasa',
                'role' => 'member',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kurator Satu',
                'username' => 'kurator',
                'email' => 'kurator@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'bio' => 'Akun kurator konten',
                'role' => 'kurator',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
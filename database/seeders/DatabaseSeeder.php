<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'bio' => 'Akun super administrator',
                'role' => 'admin',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yusar Brian S',
                'username' => 'yusrb',
                'email' => 'yusbrian@example.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'bio' => 'Akun khusus kurator Brian',
                'role' => 'curator',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Member Satu',
                'username' => 'member',
                'email' => 'member@example.com',
                'password' => Hash::make('password'),
                'avatar' => null,
                'bio' => 'Akun anggota biasa',
                'role' => 'member',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

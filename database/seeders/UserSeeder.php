<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Admin',
                'alamat' => 'Jl. Merdeka No. 1, Tarakan',
                'no_ktp' => '7171010101900001',
                'no_hp' => '08111111111',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ],
            [
                'nama' => 'Dokter',
                'alamat' => 'Jl. Gajah Mada No. 2, Tarakan',
                'no_ktp' => '7171010101850002',
                'no_hp' => '08222222222',
                'role' => 'dokter',
                'email' => 'dokter@gmail.com',
                'password' => Hash::make('dokter'),
            ],
            [
                'nama' => 'Pasien',
                'alamat' => 'Jl. Pahlawan No. 3, Tarakan',
                'no_ktp' => '7171010101950003',
                'no_hp' => '08333333333',
                'role' => 'pasien',
                'email' => 'pasien@gmail.com',
                'password' => Hash::make('pasien'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

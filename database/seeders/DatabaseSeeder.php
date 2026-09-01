<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@kampus.ac.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Contoh akun mahasiswa
        $dataMahasiswa = [
            [
                'name' => 'Ahmad Riko Dyansyah',
                'email' => 'riko@kampus.ac.id',
                'nim' => '1462400002',
                'program_studi' => 'Teknik Informatika',
                'angkatan' => 2024,
                'semester' => 5,
                'jenis_kelamin' => 'L',
            ],
            [
                'name' => 'Siti Amelia Putri',
                'email' => 'amelia@kampus.ac.id',
                'nim' => '1462400015',
                'program_studi' => 'Sistem Informasi',
                'angkatan' => 2024,
                'semester' => 5,
                'jenis_kelamin' => 'P',
            ],
        ];

        foreach ($dataMahasiswa as $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('mahasiswa123'),
                'role' => 'mahasiswa',
            ]);

            Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => $data['nim'],
                'nama' => $data['name'],
                'email' => $data['email'],
                'program_studi' => $data['program_studi'],
                'angkatan' => $data['angkatan'],
                'semester' => $data['semester'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'status' => 'aktif',
            ]);
        }
    }
}

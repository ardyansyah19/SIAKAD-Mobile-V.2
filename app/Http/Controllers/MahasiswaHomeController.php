<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MahasiswaHomeController extends Controller
{
    /**
     * Beranda mahasiswa (tampilan gaya mobile app).
     */
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        // Data ringkasan akademik untuk kartu-kartu di beranda.
        $ringkasan = [
            'ipk' => 3.78,
            'sks_tempuh' => 96,
            'sks_total' => 144,
            'semester_berjalan' => $mahasiswa->semester ?? 1,
        ];

        $jadwalHariIni = [
            ['mk' => 'Pemrograman Web Lanjut', 'jam' => '08:00 - 09:40', 'ruang' => 'Lab RPL 2'],
            ['mk' => 'Kecerdasan Buatan', 'jam' => '10:00 - 11:40', 'ruang' => 'GK 301'],
            ['mk' => 'Metodologi Penelitian', 'jam' => '13:00 - 14:40', 'ruang' => 'GK 205'],
        ];

        $pengumuman = [
            ['judul' => 'Pengisian KRS Semester Genap', 'tanggal' => '02 Sep 2026'],
            ['judul' => 'Jadwal UTS telah dirilis', 'tanggal' => '28 Agu 2026'],
            ['judul' => 'Batas akhir pembayaran UKT', 'tanggal' => '15 Sep 2026'],
        ];

        return view('mahasiswa.beranda', compact('user', 'mahasiswa', 'ringkasan', 'jadwalHariIni', 'pengumuman'));
    }

    /**
     * Halaman profil mahasiswa.
     */
    public function profil()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        return view('mahasiswa.profil', compact('user', 'mahasiswa'));
    }
}

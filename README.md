# Sistem Login & Manajemen Data (SIAKAD)
By Ahmad Riko Dyansyah

## Struktur Peran (Role)

| Role        | Redirect setelah login       | Middleware   |
|-------------|-------------------------------|--------------|
| `admin`     | `/admin/dashboard`            | `admin`      |
| `mahasiswa` | `/mahasiswa/beranda`          | `mahasiswa`  |

## Cara Instalasi

> **Prasyarat:** PHP >= 8.1, Composer, MySQL/MariaDB.

```bash
# 1. Masuk ke folder project
cd mahasiswa-app

# 2. Install dependency PHP (mengunduh framework Laravel dari Packagist)
composer install

# 3. Salin file environment lalu generate APP_KEY
cp .env.example .env
php artisan key:generate

# 4. Atur koneksi database di file .env
#    DB_DATABASE=mahasiswa_app
#    DB_USERNAME=root
#    DB_PASSWORD=

# 5. Buat database "mahasiswa_app" di MySQL, lalu jalankan migrasi + seeder
php artisan migrate --seed

# 6. Jalankan server lokal
php artisan serve
```

Buka `http://localhost:8000` di browser.

## Fitur

**Autentikasi**
- Login satu form untuk semua role, validasi & pesan error dalam Bahasa Indonesia
- Middleware kustom `admin` dan `mahasiswa` untuk membatasi akses halaman sesuai peran
- Logout aman dengan regenerasi session & token CSRF

**Beranda Mahasiswa (mobile-style)**
- Bingkai tampilan menyerupai aplikasi HP (max-width 448px, bottom navigation)
- Kartu ringkasan IPK, SKS tempuh, dan semester berjalan
- Menu cepat (KRS, KHS, Jadwal, UKT)
- Jadwal kuliah hari ini & daftar pengumuman
- Halaman profil mahasiswa dengan data akademik lengkap

**Dashboard Admin**
- Statistik total mahasiswa, aktif, cuti, dan lulus
- Grafik proporsi mahasiswa per program studi
- Tabel mahasiswa terbaru
- **CRUD Data Mahasiswa**: tambah, lihat detail, edit, hapus
- Pencarian (NIM/nama/email) dan filter status
- Setiap mahasiswa baru otomatis mendapat akun login (`role: mahasiswa`)

## Catatan Penting

- Folder `vendor/` **tidak disertakan** dalam paket ini — jalankan `composer install` untuk mengunduhnya.
- Styling menggunakan **Tailwind CSS via CDN**, jadi tidak perlu proses build (`npm install`/`npm run build`).
- Untuk deployment produksi, sebaiknya ganti Tailwind CDN dengan build Tailwind lokal via Vite agar lebih ringan dan tanpa ketergantungan internet.
- Password akun contoh di atas hanya untuk demo — segera ganti di lingkungan produksi.

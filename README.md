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

## Akun Demo (hasil seeder)

| Peran     | Email                  | Password      |
|-----------|-------------------------|----------------|
| Admin     | admin@kampus.ac.id      | admin123       |
| Mahasiswa | riko@kampus.ac.id       | mahasiswa123   |
| Mahasiswa | amelia@kampus.ac.id     | mahasiswa123   |

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

## Struktur Folder Penting

```
app/Http/Controllers/Auth/LoginController.php       -> Login & logout
app/Http/Controllers/MahasiswaHomeController.php     -> Beranda & profil mahasiswa
app/Http/Controllers/Admin/DashboardController.php   -> Dashboard admin
app/Http/Controllers/Admin/MahasiswaController.php   -> CRUD data mahasiswa
app/Http/Middleware/AdminMiddleware.php              -> Proteksi halaman admin
app/Http/Middleware/MahasiswaMiddleware.php           -> Proteksi halaman mahasiswa
app/Models/User.php                                   -> Model akun (role: admin/mahasiswa)
app/Models/Mahasiswa.php                              -> Model data akademik mahasiswa
database/migrations/                                  -> Skema tabel users & mahasiswas
database/seeders/DatabaseSeeder.php                    -> Data awal (admin + 2 mahasiswa)
resources/views/auth/login.blade.php                   -> Halaman login
resources/views/mahasiswa/                              -> Beranda & profil mahasiswa (mobile)
resources/views/admin/                                   -> Dashboard & CRUD mahasiswa
resources/views/components/layouts/                       -> Layout guest, mobile, admin
routes/web.php                                             -> Semua rute aplikasi
```

## Catatan Penting

- Folder `vendor/` **tidak disertakan** dalam paket ini — jalankan `composer install` untuk mengunduhnya.
- Styling menggunakan **Tailwind CSS via CDN**, jadi tidak perlu proses build (`npm install`/`npm run build`).
- Untuk deployment produksi, sebaiknya ganti Tailwind CDN dengan build Tailwind lokal via Vite agar lebih ringan dan tanpa ketergantungan internet.
- Password akun contoh di atas hanya untuk demo — segera ganti di lingkungan produksi.

## Menambah Kolom / Fitur Lain

Jika ingin menambah field baru pada data mahasiswa (misalnya foto profil, dosen wali, dll):
1. Tambahkan kolom lewat migration baru: `php artisan make:migration add_kolom_baru_to_mahasiswas_table`
2. Tambahkan nama kolom ke `$fillable` pada `app/Models/Mahasiswa.php`
3. Tambahkan input field di `resources/views/admin/mahasiswa/_form.blade.php`
4. Update validasi di `MahasiswaController::validasi()`

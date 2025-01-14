# app-arsip

Aplikasi Pengelolaan Arsip Berbasis Website

## Deskripsi

Aplikasi ini merupakan sistem informasi berbasis web yang dirancang untuk membantu dalam pengelolaan arsip dokumen elektronik pada Dinas Kependudukan dan Pencatatan Sipil Kota Payakumbuh. Aplikasi ini memiliki beberapa fitur utama seperti manajemen arsip, laporan, dashboard statistik, dan pengelolaan pengguna.

### Fitur Utama
- **Login Multi-User**: Tiga jenis peran pengguna (administrator, pengelola arsip, dan pengguna).
- **Dashboard**: Statistik dan grafik untuk memantau status arsip.
- **Manajemen Arsip**: Pengelolaan dokumen elektronik dengan fitur upload, download, dan pencarian.
- **Laporan**: Pembuatan laporan berbasis data arsip.
- **Pengelolaan User**: Admin dapat mengelola pengguna dengan kemampuan CRUD (Create, Read, Update, Delete).
- **Keamanan**: Pengelolaan hak akses berbasis peran menggunakan Spatie Laravel Permission.

## Teknologi yang Digunakan
- **Framework**: Laravel
- **Database**: MySQL
- **Frontend**: Blade, HTML, CSS
- **PDF Generation**: DomPDF untuk pembuatan laporan PDF

## Instalasi

### Prasyarat
- PHP >= 8.0
- Composer
- MySQL
- XAMPP (atau server lokal lain)

### Langkah-langkah Instalasi
1. Clone repository ini ke dalam direktori lokal Anda:
   ```bash
   git clone https://github.com/MuhammadGilangBagindo/app-arsip.git
2. Masuk ke dalam folder proyek:
   ```bash
   cd app-arsip
3. Install dependensi dengan Composer:
   ```bash
   composer install
4. Salin file .env.example menjadi .env:
   ```bash
   cp .env.example .env
5. Setel konfigurasi database di file .env sesuai dengan pengaturan Anda.
6. Generate key aplikasi:
   ```bash
   php artisan key:generate
7. Jalankan migrasi untuk membuat tabel database:
   ```bash
   php artisan migrate
8. (Opsional) Jika ada seeder yang perlu dijalankan:
   ```bash
   php artisan db:seed
9. Jalankan server lokal:
   ```bash
   php artisan serve
Sekarang, aplikasi dapat diakses melalui http://localhost:8000.

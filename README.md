# Project RPL (GolfGloveSync)

Ini adalah proyek Laravel yang menggunakan Filament dan Laravel Shield untuk manajemen data perusahaan GolfGloveSync. Baca panduan ini akan membantu menyiapkan proyek ini di lingkungan lokal Anda.

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut:

- PHP >= 8.1
- Composer
- MySQL
- Apache

## Langkah-langkah Instalasi

Ikuti langkah-langkah berikut untuk menyiapkan dan menjalankan proyek di lingkungan lokal Anda.

### 1. Clone Repositori

Clone repositori ini ke direktori lokal Anda:

```bash
git clone https://github.com/ImamKhusain/project-glofglovesync.git
cd project-glofglovesync
```

### 2. Instalasi Dependensi PHP

Jalankan perintah berikut untuk menginstal dependensi PHP menggunakan Composer:

```bash
composer install
```
Jika terjadi error, jalankan perintah berikut untuk memperbarui dependensi:
```bash
composer update
```

### 3. Konfigurasi Lingkungan

Salin file .env.example menjadi .env:

```bash
cp .env.example .env
```
Buka file .env dan sesuaikan konfigurasi berikut sesuai dengan lingkungan lokal Anda:
```bash
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rpl # Sesuaikan dengan database MySQL Anda
DB_USERNAME=root # Sesuaikan dengan username MySQL Anda
DB_PASSWORD= # Sesuaikan dengan password MySQL Anda
```
### 4. Generate Kunci Aplikasi

Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

```bash
php artisan key:generate
```

### 5. Migrasi Database

Lakukan migrasi untuk membuat struktur tabel di database:

```bash
php artisan migrate
```

### 6. Setup Filament Shield

Jalankan perintah berikut untuk mengonfigurasi Filament Shield:

```bash
php artisan shield:setup --fresh
php artisan shield:install admin
```
Jika ingin menambah atau mengupdate policy, jalankan perintah berikut:
```bash
php artisan shield:generate --all
```

### 7. Set Super Admin

Setel super admin untuk aplikasi dengan menjalankan perintah berikut:

```bash
php artisan shield:super-admin
```
Isi data super admin yg akan menjadi akun utama pengelola aplikasi:

### 8. Jalankan Server

Jalankan server pengembangan Laravel dengan perintah berikut:

```bash
php artisan serve
```
Akses aplikasi melalui browser di http://localhost:8000.

### 9. Jangan lupa jalankan Apache dan MySQL

Pastikan Apache dan MySQL berjalan pada lingkungan lokal Anda. Anda dapat menggunakan XAMPP, WAMP, Laragon atau alat lain yang sesuai untuk menjalankan layanan ini.

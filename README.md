
# 📦 Project Inventaris

Project Inventaris adalah aplikasi web sederhana berbasis Laravel untuk mengelola data inventaris barang. Aplikasi ini memungkinkan pengguna (admin) untuk mencatat, mengedit, dan menghapus data barang, serta memantau stok dan riwayat peminjaman.

## 🚀 Fitur Utama

- CRUD data barang
- Manajemen kategori barang
- Pencatatan stok dan status barang
- Sistem peminjaman dan pengembalian barang
- Login untuk admin
- Tampilan antarmuka sederhana dan responsif (menggunakan Tailwind CSS)

## 🛠️ Teknologi yang Digunakan

- [Laravel 10](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [MySQL](https://www.mysql.com/)
- [Blade Template](https://laravel.com/docs/10.x/blade)

## 📂 Struktur Folder (Singkat)

```
project_inventaris/
├── app/
├── config/
├── database/
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
└── .env
```

## 📥 Instalasi

1. **Clone repositori**
   ```bash
   git clone https://github.com/Gapraaa/project_inventaris.git
   cd project_inventaris
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Atur file `.env`**
   - Duplikat `.env.example` menjadi `.env`
   - Konfigurasikan koneksi database di `.env`

4. **Generate key dan migrasi database**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. **Jalankan server**
   ```bash
   php artisan serve
   ```

## 🔐 Login Admin (default)

| Email | Password |
|-------|----------|
| admin@example.com | password123 |

> Ganti kredensial ini di seeder atau langsung di database.

## 📸 Screenshot

_Tambahkan di sini tangkapan layar tampilan utama aplikasi._

## 📄 Lisensi

Proyek ini bersifat open-source dan bebas digunakan untuk pembelajaran atau keperluan internal.  

---

Feel free untuk mengembangkan lebih lanjut sesuai kebutuhan institusi atau sekolah tempat aplikasi ini digunakan.

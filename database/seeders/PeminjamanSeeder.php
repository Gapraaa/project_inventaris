<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    public function run()
    {
        DB::table('peminjaman')->insert([
            [
                'id_inventaris' => '1', // Replace with an actual `id_inventaris` from `inventaris` table
                'nama_barang' => 'Laptop Asus ROG',
                'nama_peminjam' => 'John Doe',
                'tanggal_pinjam' => now()->subDays(3)->toDateString(),
                'tanggal_kembali' => null,
                'status' => 'Proses',
                'petugas' => 'Admin 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_inventaris' => '2', // Replace with an actual `id_inventaris` from `inventaris` table
                'nama_barang' => 'Proyektor Epson',
                'nama_peminjam' => 'Jane Smith',
                'tanggal_pinjam' => now()->subDays(7)->toDateString(),
                'tanggal_kembali' => now()->subDays(2)->toDateString(),
                'status' => 'Sudah Kembali',
                'petugas' => 'Admin 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_inventaris' => '3', // Replace with an actual `id_inventaris` from `inventaris` table
                'nama_barang' => 'Printer Canon',
                'nama_peminjam' => 'Alice Johnson',
                'tanggal_pinjam' => now()->subDays(5)->toDateString(),
                'tanggal_kembali' => null,
                'status' => 'Belum Kembali',
                'petugas' => 'Admin 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


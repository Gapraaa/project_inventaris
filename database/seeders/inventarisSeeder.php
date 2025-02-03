<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InventarisSeeder extends Seeder
{
    public function run()
    {
        DB::table('inventaris')->insert([
            [
                'id_inventaris' => Str::uuid()->toString(),
                'nama_barang' => 'Laptop Asus ROG',
                'kondisi' => 'Baik',
                'stok' => 10,
                'tanggal_register' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_inventaris' => Str::uuid()->toString(),
                'nama_barang' => 'Proyektor Epson',
                'kondisi' => 'Perbaikan',
                'stok' => 5,
                'tanggal_register' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_inventaris' => Str::uuid()->toString(),
                'nama_barang' => 'Printer Canon',
                'kondisi' => 'Rusak',
                'stok' => 2,
                'tanggal_register' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


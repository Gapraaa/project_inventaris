<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_inventaris'; // Menetapkan id_inventaris sebagai primary key

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'inventaris';

    public $incrementing = false;
    protected $keyType = 'string';

    // Tentukan kolom yang dapat diisi secara massal (fillable)
    protected $fillable = [
        'id_inventaris',
        'nama_barang',
        'kondisi',
        'stok',
        'tanggal_register',
    ];

    // Tentukan kolom yang tidak boleh diisi secara massal (guarded)
    protected $guarded = ['id_inventaris'];

    // Jika ingin menggunakan custom cast untuk kolom tertentu, bisa menambahkannya di sini
    protected $casts = [
        'tanggal_register' => 'date',
    ];
}

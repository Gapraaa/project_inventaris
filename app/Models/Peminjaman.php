<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    
    protected $primaryKey = 'id_peminjaman';
    
    protected $fillable = [
        'id_inventaris', 'nama_barang', 'nama_peminjam', 'tanggal_pinjam', 
        'tanggal_kembali', 'status', 'petugas'
    ];

    // Relasi dengan Inventaris
    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'id_inventaris', 'id_inventaris');
    }
}

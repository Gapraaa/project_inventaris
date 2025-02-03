<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Inventaris;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function AdminIndex()
    {
        // Mengambil data peminjaman dengan pagination 10 per halaman
        $peminjaman = Peminjaman::paginate(10);
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    // Menampilkan daftar peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with('inventaris')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // Menampilkan form untuk menambah peminjaman
    public function create(Request $request)
    {
        // Ambil data inventaris berdasarkan ID yang dipilih
        $inventaris = Inventaris::findOrFail($request->id_inventaris);

        // Ambil semua data user untuk pemilihan petugas
        $users = User::all();

        return view('peminjaman', compact('inventaris', 'users'));
    }

    function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id_inventaris' => 'required',
            'nama_barang' => 'required',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:Proses,Sudah Kembali,Belum Kembali,Batal',
            'petugas' => 'required'
        ]);

        // Ambil data inventaris berdasarkan ID
        $inventaris = Inventaris::findOrFail($request->id_inventaris);

        // Simpan peminjaman
        $peminjaman = Peminjaman::create($request->all());

        // Logika pengurangan stok
        if ($request->status == 'Proses' || $request->status == 'Belum Kembali') {
            // Kurangi stok barang sebanyak 1
            $inventaris->stok = $inventaris->stok - 1;
            $inventaris->save();
        }

        return redirect('/home')->with('success', 'Peminjaman berhasil dibuat');
    }

    // Menampilkan form edit peminjaman
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $inventaris = Inventaris::all();
        return view('peminjaman.edit', compact('peminjaman', 'inventaris'));
    }

    // // Memperbarui data peminjaman
    // public function update(Request $request, $id)
    // {
    //     // Validasi data yang diterima
    //     $request->validate([
    //         'status' => 'required|in:Proses,Sudah Kembali,Belum Kembali,Batal',
    //     ]);

    //     // Ambil data peminjaman dan inventaris
    //     $peminjaman = Peminjaman::findOrFail($id);
    //     $inventaris = Inventaris::findOrFail($peminjaman->id_inventaris);

    //     // Logika perubahan stok berdasarkan status
    //     if ($request->status == 'Sudah Kembali' || $request->status == 'Batal') {
    //         // Jika status menjadi "Sudah Kembali" atau "Batal", kembalikan stok barang
    //         $inventaris->stok = $inventaris->stok + 1;
    //         $inventaris->save();
    //     } elseif ($request->status == 'Proses' || $request->status == 'Belum Kembali') {
    //         // Jika status kembali ke "Proses" atau "Belum Kembali", kurangi stok
    //         if ($inventaris->stok > 0) {
    //             $inventaris->stok = $inventaris->stok - 1;
    //             $inventaris->save();
    //         }
    //     }

    //     // Update status peminjaman
    //     $peminjaman->update($request->all());

    //     return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    // }

    // Menampilkan peminjaman dengan status 'Proses'
    public function pending()
    {
        $peminjaman = Peminjaman::where('status', 'Proses')->get();
        return view('admin.peminjaman.pending', compact('peminjaman'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:Proses,Sudah Kembali,Belum Kembali,Batal',
        ]);
    
        // Temukan data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);
    
        // Cek apakah petugas yang login sesuai
        if ($peminjaman->petugas !== auth()->user()->name) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengubah status ini.');
        }
    
        // Perbarui status tanpa mengubah stok jika statusnya "Proses" atau "Belum Kembali"
        if ($request->status == 'Sudah Kembali' || $request->status == 'Batal') {
            // Jika status menjadi "Sudah Kembali" atau "Batal", kembalikan stok barang
            $inventaris = Inventaris::findOrFail($peminjaman->id_inventaris);
            $inventaris->stok += 1;
            $inventaris->save();
        }
    
        // Update status peminjaman
        $peminjaman->status = $request->status;
        $peminjaman->save();
    
        // Redirect kembali ke halaman pending dengan pesan sukses
        return redirect()->route('peminjaman.pending')->with('success', 'Status peminjaman berhasil diperbarui.');
    }
    
    // Menghapus peminjaman
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}

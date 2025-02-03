<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('admin.inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('admin.inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_inventaris' => 'required|unique:inventaris,id_inventaris',
            'nama_barang' => 'required|string|max:255',
            'kondisi' => 'required|in:Baik,Perbaikan,Rusak',
            'stok' => 'required|integer|min:0',
            'tanggal_register' => 'required|date',
        ]);

        Inventaris::create($request->all());
        return redirect()->view('admin.inventaris.index')->with('success', 'Data Inventaris berhasil ditambahkan.');
    }

    public function edit($id_inventaris)
    {
        $inventaris = Inventaris::findOrFail($id_inventaris);
        return view('admin.inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id_inventaris)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kondisi' => 'required|in:Baik,Perbaikan,Rusak',
            'stok' => 'required|integer|min:0',
            'tanggal_register' => 'required|date',
        ]);

        $inventaris = Inventaris::findOrFail($id_inventaris);
        $inventaris->update($request->all());
        return redirect('admin/inventaris')->with('success', 'Data Inventaris berhasil diupdate.');
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();
        return redirect()->view('admin.inventaris.index')->with('success', 'Data Inventaris berhasil dihapus.');
    }
}

@extends('layouts.public')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold text-gray-700 mb-4">Tambah Peminjaman</h1>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="id_inventaris" class="block text-sm font-medium text-gray-600">ID Inventaris</label>
            <input type="text" name="id_inventaris" id="id_inventaris" value="{{ request('id_inventaris') }}" 
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring" readonly>
        </div>

        <div class="mb-4">
            <label for="nama_barang" class="block text-sm font-medium text-gray-600">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ $inventaris->nama_barang ?? '' }}" 
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring" readonly>
        </div>

        <div class="mb-4">
            <label for="nama_peminjam" class="block text-sm font-medium text-gray-600">Nama Peminjam</label>
            <input type="text" name="nama_peminjam" id="nama_peminjam" class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
        </div>

        <div class="mb-4">
            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-600">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" 
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
        </div>

        <div class="mb-4">
            <label for="tanggal_kembali" class="block text-sm font-medium text-gray-600">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" 
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-600">Status</label>
            <input type="text" name="status" id="status" value="Proses" 
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring" readonly>
        </div>

        <div class="mb-4">
            <label for="petugas" class="block text-sm font-medium text-gray-600">Petugas</label>
            <select name="petugas" id="petugas" class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
                @foreach($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Simpan</button>
    </form>
</div>
@endsection

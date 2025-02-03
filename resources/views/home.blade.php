@extends('layouts.public')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h1 class="text-xl font-bold text-gray-700 mb-4">Data Inventaris</h1>

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('inventaris.index') }}" class="mb-4 flex space-x-4">
            <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Cari nama barang"
                class="px-4 py-2 border rounded focus:outline-none focus:ring w-1/3">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Cari
            </button>
        </form>

        <!-- Daftar Inventaris -->
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 p-2">ID</th>
                    <th class="border border-gray-300 p-2">Nama Barang</th>
                    <th class="border border-gray-300 p-2">Kondisi</th>
                    <th class="border border-gray-300 p-2">Stok</th>
                    <th class="border border-gray-300 p-2">Tanggal Register</th>
                    <th class="border border-gray-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventaris as $item)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $item->id_inventaris }}</td>
                        <td class="border border-gray-300 p-2">{{ $item->nama_barang }}</td>
                        <td class="border border-gray-300 p-2">{{ $item->kondisi }}</td>
                        <td class="border border-gray-300 p-2">{{ $item->stok }}</td>
                        <td class="border border-gray-300 p-2">
                            {{ \Carbon\Carbon::parse($item->tanggal_register)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                        </td>
                        <td class="border border-gray-300 p-2">
                            <!-- Button Peminjaman -->
                            <form action="{{ route('peminjaman.create') }}" method="GET" class="inline">
                                <input type="hidden" name="id_inventaris" value="{{ $item->id_inventaris }}">
                                <button type="submit" class="px-2 py-1 text-white bg-green-500 rounded">Pinjam</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

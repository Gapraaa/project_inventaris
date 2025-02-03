@extends('layouts.admin')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-700">Data Inventaris</h1>
            <a href="{{ route('inventaris.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Tambah Inventaris
            </a>
        </div>
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
                            <a href="{{ route('inventaris.edit', $item->id_inventaris) }}"
                                class="px-2 py-1 text-white bg-yellow-500 rounded">Edit</a>
                            <form action="{{ route('inventaris.destroy', $item->id_inventaris) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

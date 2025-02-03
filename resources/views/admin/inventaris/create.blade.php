@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold text-gray-700 mb-4">{{ isset($inventaris) ? 'Edit Inventaris' : 'Tambah Inventaris' }}</h1>
    <form action="{{ isset($inventaris) ? route('inventaris.update', $inventaris->id_inventaris) : route('inventaris.store') }}"
          method="POST" class="space-y-4">
        @csrf
        @if(isset($inventaris))
            @method('PUT')
        @endif
        <div>
            <label for="id_inventaris" class="block text-sm font-medium text-gray-600">ID Inventaris</label>
            <input type="text" name="id_inventaris" id="id_inventaris" value="{{ $inventaris->id_inventaris ?? '' }}"
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring" 
                   {{ isset($inventaris) ? 'readonly' : '' }}>
        </div>
        <div>
            <label for="nama_barang" class="block text-sm font-medium text-gray-600">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ $inventaris->nama_barang ?? '' }}"
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
        </div>
        <div>
            <label for="kondisi" class="block text-sm font-medium text-gray-600">Kondisi</label>
            <select name="kondisi" id="kondisi" class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
                <option value="Baik" {{ isset($inventaris) && $inventaris->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Perbaikan" {{ isset($inventaris) && $inventaris->kondisi == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                <option value="Rusak" {{ isset($inventaris) && $inventaris->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>
        <div>
            <label for="stok" class="block text-sm font-medium text-gray-600">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ $inventaris->stok ?? '' }}"
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
        </div>
        <div>
            <label for="tanggal_register" class="block text-sm font-medium text-gray-600">Tanggal Register</label>
            <input type="date" name="tanggal_register" id="tanggal_register" value="{{ $inventaris->tanggal_register ?? '' }}"
                   class="w-full px-4 py-2 mt-1 border rounded focus:outline-none focus:ring">
        </div>
        <button type="submit"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-600">
            {{ isset($inventaris) ? 'Update' : 'Simpan' }}
        </button>
    </form>
</div>
@endsection

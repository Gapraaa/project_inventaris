@extends('layouts.admin')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h1 class="text-xl font-bold text-gray-700 mb-4">Peminjaman Pending (Proses)</h1>

        @if (session('success'))
            <div class="mb-4 text-green-500">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mb-4 text-red-500">{{ session('error') }}</div>
        @endif

        <!-- Tabel Peminjaman Proses -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                        <th class="px-4 py-2 border">ID Peminjaman</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Nama Peminjam</th>
                        <th class="px-4 py-2 border">Tanggal Pinjam</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Petugas</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $pem)
                        <tr class="text-sm text-gray-700">
                            <td class="px-4 py-2 border">{{ $pem->id_peminjaman }}</td>
                            <td class="px-4 py-2 border">{{ $pem->nama_barang }}</td>
                            <td class="px-4 py-2 border">{{ $pem->nama_peminjam }}</td>
                            <td class="px-4 py-2 border">
                                {{ \Carbon\Carbon::parse($pem->tanggal_pinjam)->format('l, d F Y') }}</td>
                            <td class="px-4 py-2 border">{{ $pem->status }}</td>
                            <td class="px-4 py-2 border">{{ $pem->petugas }}</td>
                            <td class="px-4 py-2 border text-center">
                                @if (auth()->user()->name === $pem->petugas)
                                <form action="{{ route('peminjaman.updateStatus', $pem->id_peminjaman) }}" method="POST">
                                    @csrf
                                    @method('PATCH') <!-- Pastikan method PATCH digunakan -->
                                    <select name="status" class="border px-2 py-1">
                                        <option value="Sudah Kembali" @if($pem->status == 'Sudah Kembali') selected @endif>Sudah Kembali</option>
                                        <option value="Belum Kembali" @if($pem->status == 'Belum Kembali') selected @endif>Belum Kembali</option>
                                        <option value="Batal" @if($pem->status == 'Batal') selected @endif>Batal</option>
                                    </select>
                                    <button type="submit" class="px-4 py-1 bg-blue-500 text-white rounded ml-2">Ubah Status</button>
                                </form>
                                @else
                                    <span class="text-gray-500">Anda tidak bisa mengubah status ini</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

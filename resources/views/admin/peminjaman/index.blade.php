@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-xl font-bold text-gray-700 mb-4">Daftar Peminjaman</h1>

    <!-- Tabel Peminjaman -->
    <div class="overflow-x-auto">
        <table id="tabel-peminjaman" class="min-w-full bg-white border border-gray-300 table-auto">
            <thead>
                <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                    <th class="px-4 py-2 border cursor-pointer" onclick="sortTable(0)">ID Peminjaman</th>
                    <th class="px-4 py-2 border cursor-pointer" onclick="sortTable(1)">Nama Barang</th>
                    <th class="px-4 py-2 border cursor-pointer" onclick="sortTable(2)">Nama Peminjam</th>
                    <th class="px-4 py-2 border cursor-pointer" onclick="sortTable(3)">Tanggal Pinjam</th>
                    <th class="px-4 py-2 border cursor-pointer" onclick="sortTable(4)">Tanggal Kembali</th>
                    <th class="px-4 py-2 border cursor-pointer" onclick="sortTable(5)">Status</th>
                    <th class="px-4 py-2 border cursor-pointer" onclick="sortTable(6)">Petugas</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $pem)
                    <tr class="text-sm text-gray-700">
                        <td class="px-4 py-2 border">{{ $pem->id_peminjaman }}</td>
                        <td class="px-4 py-2 border">{{ $pem->nama_barang }}</td>
                        <td class="px-4 py-2 border">{{ $pem->nama_peminjam }}</td>
                        <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($pem->tanggal_pinjam)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                        <td class="px-4 py-2 border">{{ $pem->tanggal_kembali ? \Carbon\Carbon::parse($pem->tanggal_kembali)->locale('id')->isoFormat('dddd, D MMMM YYYY') : 'Belum Kembali' }}</td>
                        <td class="px-4 py-2 border">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                @if($pem->status == 'Proses') bg-yellow-400 text-yellow-800 
                                @elseif($pem->status == 'Sudah Kembali') bg-green-500 text-white
                                @elseif($pem->status == 'Batal') bg-red-500 text-white
                                @else bg-blue-500 text-white @endif">
                                {{ $pem->status }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border">{{ $pem->petugas }}</td>
                        <td class="px-4 py-2 border">
                            <!-- Form untuk mengubah status -->
                            <form action="{{ route('peminjaman.updateStatus', $pem->id_peminjaman) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="border-gray-300 rounded">
                                    <option value="">Ubah Status</option>
                                    <option value="Belum Kembali" @if($pem->status == 'Belum Kembali') selected @endif>Belum Kembali</option>
                                    <option value="Sudah Kembali" @if($pem->status == 'Sudah Kembali') selected @endif>Sudah Kembali</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4">
        {{ $peminjaman->links() }} <!-- Menampilkan pagination -->
    </div>
</div>

@endsection

@section('scripts')
<script>
    function sortTable(n) {
        const table = document.getElementById("tabel-peminjaman");
        let rows = table.rows;
        let switching = true;
        let dir = "asc"; // Default sorting direction
        let switchcount = 0;

        while (switching) {
            switching = false;
            let rowsArray = Array.from(rows);
            for (let i = 1; i < rowsArray.length - 1; i++) {
                let x = rowsArray[i].cells[n].innerText;
                let y = rowsArray[i + 1].cells[n].innerText;
                if (dir === "asc" ? x > y : x < y) {
                    rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
                    switching = true;
                    switchcount++;
                    break;
                }
            }
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
</script>
@endsection

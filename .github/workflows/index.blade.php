@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Transaksi</h1>
        <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
    </div>

    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Kategori</th>
                <th class="p-2 border">Jenis</th>
                <th class="p-2 border">Jumlah</th>
                <th class="p-2 border">Keterangan</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td class="p-2 border">{{ $transaksi->tanggal }}</td>
                    <td class="p-2 border">{{ $transaksi->kategori->nama }}</td>
                    <td class="p-2 border capitalize">{{ $transaksi->kategori->jenis }}</td>
                    <td class="p-2 border text-right">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                    <td class="p-2 border">{{ $transaksi->keterangan }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('transaksi.edit', $transaksi) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('transaksi.destroy', $transaksi) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

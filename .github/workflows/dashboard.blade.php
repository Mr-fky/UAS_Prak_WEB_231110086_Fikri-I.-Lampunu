@extends('layouts.app')

@section('content')

<form method="GET" class="mb-4 flex items-center space-x-2">
    <select name="bulan" class="p-2 border rounded">
        <option value="">-- Semua Bulan --</option>
        @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
            </option>
        @endfor
    </select>

    <select name="tahun" class="p-2 border rounded">
        <option value="">-- Semua Tahun --</option>
        @for ($y = date('Y'); $y >= 2020; $y--)
            <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                {{ $y }}
            </option>
        @endfor
    </select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>

    @if(request('bulan') || request('tahun'))
        <a href="{{ route('dashboard') }}" class="text-blue-600 ml-2">Reset</a>
    @endif
</form>

    <h1 class="text-xl font-bold mb-4">Dashboard Keuangan</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-green-100 p-4 rounded shadow">
            <h2 class="text-sm text-gray-600">Total Pemasukan</h2>
            <p class="text-lg font-bold text-green-700">
                Rp {{ number_format($total_pemasukan, 0, ',', '.') }}
            </p>
        </div>
        <div class="bg-red-100 p-4 rounded shadow">
            <h2 class="text-sm text-gray-600">Total Pengeluaran</h2>
            <p class="text-lg font-bold text-red-700">
                Rp {{ number_format($total_pengeluaran, 0, ',', '.') }}
            </p>
        </div>
        <div class="bg-blue-100 p-4 rounded shadow">
            <h2 class="text-sm text-gray-600">Sisa Anggaran</h2>
            <p class="text-lg font-bold text-blue-700">
                Rp {{ number_format($sisa_anggaran, 0, ',', '.') }}
            </p>
        </div>
    </div>

    <h2 class="text-md font-bold mb-2">Riwayat Transaksi Terbaru</h2>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="p-2 border">Tanggal</th>
                <th class="p-2 border">Kategori</th>
                <th class="p-2 border">Jenis</th>
                <th class="p-2 border">Jumlah</th>
                <th class="p-2 border">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis->take(5) as $t)
                <tr>
                    <td class="p-2 border">{{ $t->tanggal }}</td>
                    <td class="p-2 border">{{ $t->kategori->nama }}</td>
                    <td class="p-2 border capitalize">{{ $t->kategori->jenis }}</td>
                    <td class="p-2 border text-right">
                        Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                    </td>
                    <td class="p-2 border">{{ $t->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

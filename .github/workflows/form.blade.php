@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">{{ isset($transaksi) ? 'Edit' : 'Tambah' }} Transaksi</h1>

    <form action="{{ isset($transaksi) ? route('transaksi.update', $transaksi) : route('transaksi.store') }}" method="POST" class="bg-white p-4 rounded shadow-md">
        @csrf
        @if(isset($transaksi))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $transaksi->tanggal ?? date('Y-m-d')) }}" class="w-full p-2 border rounded">
            @error('tanggal') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label>Kategori</label>
            <select name="kategori_id" class="w-full p-2 border rounded">
                <option value="">-- Pilih --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $transaksi->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }} ({{ $kategori->jenis }})
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', $transaksi->jumlah ?? '') }}" class="w-full p-2 border rounded">
            @error('jumlah') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label>Keterangan</label>
            <textarea name="keterangan" class="w-full p-2 border rounded">{{ old('keterangan', $transaksi->keterangan ?? '') }}</textarea>
            @error('keterangan') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ isset($transaksi) ? 'Update' : 'Simpan' }}
        </button>
    </form>
@endsection

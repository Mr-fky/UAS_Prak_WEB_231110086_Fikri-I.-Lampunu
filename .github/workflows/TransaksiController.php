<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('kategori')->latest();

        if ($request->filled('q')) {
            $keyword = $request->q;

            $query->whereHas('kategori', function ($q) use ($keyword) {
                $q->where('nama', 'like', "%$keyword%");
            })->orWhere('keterangan', 'like', "%$keyword%");
        }

        $transaksis = $query->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('transaksi.form', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'tanggal'     => 'required|date',
            'jumlah'      => 'required|integer|min:1',
            'keterangan'  => 'nullable'
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit(Transaksi $transaksi)
    {
        $kategoris = Kategori::all();
        return view('transaksi.form', compact('transaksi', 'kategoris'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'tanggal'     => 'required|date',
            'jumlah'      => 'required|integer|min:1',
            'keterangan'  => 'nullable'
        ]);

        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }

    public function dashboard(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $query = Transaksi::with('kategori');

        if ($bulan) {
            $query->whereMonth('tanggal', $bulan);
        }

        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        $transaksis = $query->latest()->get();

        $total_pemasukan = $transaksis->filter(fn($t) => $t->kategori->jenis === 'pemasukan')->sum('jumlah');
        $total_pengeluaran = $transaksis->filter(fn($t) => $t->kategori->jenis === 'pengeluaran')->sum('jumlah');
        $sisa_anggaran = $total_pemasukan - $total_pengeluaran;

        return view('dashboard', compact(
            'transaksis', 'total_pemasukan', 'total_pengeluaran', 'sisa_anggaran', 'bulan', 'tahun'
        ));
    }
}

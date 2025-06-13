<?php

namespace App\Http\Controllers;

use App\Models\TransaksiInventori;
use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiInventoriController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiInventori::with('barang')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('transaksi.create', compact('barangs'));
    }

    public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required',
        'jenis_transaksi' => 'required|in:Masuk,Keluar',
        'jumlah' => 'required|integer|min:1',
        'tanggal' => 'required|date',
    ]);

    $barang = Barang::find($request->barang_id);

    // Cek stok jika transaksi keluar
    if ($request->jenis_transaksi === 'Keluar') {
        if ($barang->stok < $request->jumlah) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jumlah' => 'Stok barang tidak mencukupi untuk transaksi keluar!']);
        }
        $barang->stok -= $request->jumlah;
    } else {
        $barang->stok += $request->jumlah;
    }
    $barang->save();

    TransaksiInventori::create($request->all());

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
}

    public function destroy($id)
    {
        $transaksi = TransaksiInventori::findOrFail($id);

        // rollback stok saat hapus
        $barang = $transaksi->barang;
        if ($transaksi->jenis_transaksi === 'Masuk') {
            $barang->stok -= $transaksi->jumlah;
        } else {
            $barang->stok += $transaksi->jumlah;
        }
        $barang->save();

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function cetakTransaksi()
    {
        $transaksi = TransaksiInventori::with('barang')->get();
        return view('transaksi.cetak', compact('transaksi'));
    }

    public function cetakTransaksiPdf($id)
    {
        $transaksi = TransaksiInventori::with('barang.kategori')->where('id', $id)->get();

        $first = $transaksi->first();
        $namaBarang = $first ? ($first->barang->nama_barang ?? 'barang') : 'barang';
        $jenis = $first ? strtolower($first->jenis_transaksi) : 'transaksi';
        $tanggal = now()->format('Ymd');
        $jam = now()->format('His');
        $filename = "{$namaBarang}_{$jenis}_{$tanggal}_{$jam}.pdf";

        $pdf = Pdf::loadView('transaksi.cetak', compact('transaksi'));
        return $pdf->download($filename);
    }
}

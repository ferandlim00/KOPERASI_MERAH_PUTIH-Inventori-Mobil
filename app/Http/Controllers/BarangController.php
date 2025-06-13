<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;


    class BarangController extends Controller
    {
        public function index()
    {
        $barang = Barang::all(); // atau paginate() kalau pakai pagination
        return view('barang.index', compact('barang'));
    }


        public function create()
        {
            $kategoris = Kategori::all();
            return view('barang.create', compact('kategoris'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'nama_barang' => 'required',
                'kategori_id' => 'required',
                'stok' => 'required|integer',
                'satuan' => 'required',
            ]);

            Barang::create($request->all());
            return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
        }
        public function show($id)
        {
            $barang = Barang::findOrFail($id);
            return view('barang.show', compact('barang'));
        }


        public function edit($id)
        {
            $barang = Barang::findOrFail($id);
            $kategoris = Kategori::all(); // tambahkan baris ini
            return view('barang.edit', compact('barang', 'kategoris'));
        }

        public function update(Request $request, $id)
        {
            $barang = Barang::findOrFail($id);

            $request->validate([
                'nama_barang' => 'required',
                'kategori_id' => 'required',
                'stok' => 'required|integer',
                'satuan' => 'required',
            ]);

            $barang->update($request->all());
            return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
        }

        public function destroy($id)
        {
            Barang::findOrFail($id)->delete();
            return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
        }
    
public function cetakPdf()
    {
        $barang = Barang::all();
        $pdf = Pdf::loadView('barang.cetak', compact('barang'));

        // Format nama file: data-barang_YYYYMMDD_HHMMSS.pdf
        $filename = 'data-barang_' . now()->format('Ymd_His') . '.pdf';

        return $pdf->download($filename);
    }
    public function cetak()
{
    $barang = Barang::all();
    return view('barang.cetak', compact('barang'));
}

    }


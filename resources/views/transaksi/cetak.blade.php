<!DOCTYPE html>
<html>
<head>
    <title>Surat Jalan Barang</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .info { margin-bottom: 20px; }
        .info-table td { padding: 4px 8px; }
        .barang-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .barang-table th, .barang-table td { border: 1px solid #000; padding: 8px; }
        .footer { margin-top: 40px; }
        .ttd { width: 200px; text-align: center; float: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Inventori Mobil</h2>
        <h3>Surat {{ ucfirst(strtolower($transaksi->first()->jenis_transaksi ?? '')) }} Barang</h3>
        <hr>
    </div>

    <div class="info">
        <table class="info-table">
            <tr>
                <td><strong>Tanggal</strong></td>
                <td>: {{ now()->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td><strong>No. Surat Jalan</strong></td>
                <td>: {{ 'SJ-' . str_pad($transaksi->first()->id ?? 1, 5, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <!-- Tambahkan info lain jika perlu -->
        </table>
    </div>

    <table class="barang-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Kategori</th>
                <th>Harga</th> <!-- Tambahkan ini -->
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->barang->kategori->nama ?? '-' }}</td>
                <td>Rp {{ number_format($item->barang->satuan ?? 0, 0, ',', '.') }}</td> <!-- Harga dari satuan -->
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->keterangan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div class="ttd">
            <p>Petugas,</p>
            <br><br><br>
            <p>(___________________)</p>
        </div>
    </div>
</body>
</html>
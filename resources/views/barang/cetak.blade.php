<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #000; }
    </style>
</head>
<body>
    <h2>Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga (Rp) </th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->kategori->nama }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ number_format($item->satuan, 0, ',', '.') }}</td>       
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

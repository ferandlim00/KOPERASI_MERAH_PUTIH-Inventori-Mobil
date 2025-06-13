@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Detail Barang</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Mobil</th>
                    <td>{{ $barang->kode_barang }}</td>
                </tr>
                <tr>
                    <th>Nama Mobil</th>
                    <td>{{ $barang->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $barang->kategori }}</td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td>{{ $barang->stok }}</td>
                </tr>
                <tr>
                    <th>Satuan</th>
                    <td>{{ $barang->satuan }}</td>
                </tr>
            </table>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection

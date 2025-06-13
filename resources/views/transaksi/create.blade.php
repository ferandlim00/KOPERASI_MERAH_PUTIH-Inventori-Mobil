@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Transaksi</h3>
    <form action="{{ route('transaksi.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <div class="mb-4">
            <label for="barang_id" class="block text-gray-700 text-sm font-bold mb-2">Barang</label>
            <select name="barang_id" id="barang_id" required
                    class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">-- Pilih Mobil --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jenis_transaksi" class="block text-gray-700 text-sm font-bold mb-2">Jenis Transaksi</label>
            <select name="jenis_transaksi" id="jenis_transaksi" required
                    class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="Masuk">Masuk</option>
                <option value="Keluar">Keluar</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" required
                   class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required
                   class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan"
                   class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
<button class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="margin-right: 10px;">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
    &larr; Kembali
</a>
                </button>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
    </form>
    @if ($errors->has('jumlah'))
    <div class="alert alert-danger" style="color: #fff; background: #e53e3e; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ $errors->first('jumlah') }}
    </div>
@endif
</div>
@endsection

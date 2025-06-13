@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center space-y-4">
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang di Sistem Inventori Mobil</h1>
        <p class="text-gray-600">Silakan pilih menu berikut:</p>
        <div class="flex flex-col md:flex-row justify-center items-center gap-4">
            <a href="{{ route('barang.index') }}"
               class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                Kelola Mobil
            </a>
            <a href="{{ route('transaksi.index') }}"
               class="bg-white text-red-600 border border-red-600 px-6 py-2 rounded hover:bg-red-50 transition">
                Transaksi Mobil
            </a>
            <a href="{{ route('barang.cetakPdf') }}" class="bg-white text-red-600 border border-red-600 px-6 py-2 rounded hover:bg-red-50 transition">Cetak PDF Data Barang</a>
        </div>
    </div>
</div>
@endsection

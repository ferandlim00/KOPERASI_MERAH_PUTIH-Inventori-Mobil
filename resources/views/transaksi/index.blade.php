@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Riwayat Transaksi</h3>
    <a href="{{ route('transaksi.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Transaksi
    </a>
    <a href="{{ route('barang.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Ke Data Barang</a>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Tanggal</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Barang</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Jenis</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Jumlah</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Keterangan</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($transaksi as $t)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $t->tanggal }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $t->barang->nama_barang }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $t->jenis_transaksi }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $t->jumlah }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $t->keterangan }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                        <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline text-xs">
                                <a href="{{ route('transaksi.cetakPdf', $t->id) }}" class="btn btn-success" target="_blank">Cetak PDF</a>
                            </button>
                            <button onclick="return confirm('Yakin?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

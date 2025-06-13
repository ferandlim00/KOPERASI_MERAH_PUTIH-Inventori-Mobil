@extends('layouts.app') {{-- Asumsi layouts.app sudah dikonfigurasi untuk Tailwind --}}

@section('content')
<div class="container mx-auto px-4 py-8"> {{-- Container Tailwind untuk padding dan centering --}}
    <div class="bg-white shadow-xl rounded-lg p-6 md:p-8">
        <h3 class="text-3xl font-bold text-gray-800 mb-6">Tambah Mobil</h3>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf

            @include('barang.form') {{-- Meng-include form yang sudah di-style dengan Tailwind --}}

            <div class="mt-8 flex justify-end">
                <button class="px-6 py-3 bg-yellow-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition ease-in-out duration-150" style="margin-right: 10px;">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
    &larr; Kembali
</a>
                </button>
                <button type="submit" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition ease-in-out duration-150">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
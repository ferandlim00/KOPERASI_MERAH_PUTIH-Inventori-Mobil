@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Edit Mobil</h3>
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('barang.form', ['barang' => $barang])
            <div class="mt-6">
                <button class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="margin-right: 10px;">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
    &larr; Kembali
</a>
                </button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

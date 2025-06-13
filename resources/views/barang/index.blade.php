@extends('layouts.app')

@section('content')
<style>
  .container {
    display: flex;
    justify-content: center;
    margin: auto;
    min-height: 80vh;
  }

  .data-barang-container {
    background-color: #f8fafc;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 2rem;
    width: 100%;
  }

  .data-barang-heading {
    color: #e53e3e;
    text-align: center;
    margin-bottom: 1.5rem;
    font-size: 2.2rem;
  }

  .data-barang-description {
    color: #718096;
    text-align: center;
    margin-bottom: 2rem;
    font-size: 1.1rem;
  }

  .button-container {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
  }

  .tambah-barang-button, .cetak-button {
    padding: 0.75rem 1.5rem;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
    display: inline-block;
  }

  .tambah-barang-button {
    background-color: #e53e3e;
    color: white;
  }

  .tambah-barang-button:hover {
    background-color: #c53030;
  }

  .cetak-button {
    background-color: #4a5568;
    color: white;
  }

  .cetak-button:hover {
    background-color: #2d3748;
  }

  .data-table {
    width: 100%;
    background-color: white;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
  }

  .data-table thead th {
    background-color: #f56565;
    color: white;
    padding: 1rem;
    text-align: left;
  }

  .data-table tbody td {
    padding: 1rem;
    border-bottom: 1px solid #e2e8f0;
  }

  .data-table tbody tr:nth-child(odd) {
    background-color: #f7fafc;
  }

  .data-table tbody tr:hover {
    background-color: #edf2f7;
  }

  .data-table td:last-child {
    display: flex;
    gap: 0.5rem;
    align-items: center;
  }

  .edit-button {
    background-color: #f6e05e;
    color: #1a202c;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .edit-button:hover {
    background-color: #ecc94b;
  }

  .hapus-button {
    background-color: #e53e3e;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
  }

  .hapus-button:hover {
    background-color: #c53030;
  }

  .empty-message {
    padding: 1rem;
    text-align: center;
    font-style: italic;
    color: #718096;
  }
</style>

<div class="container">
  <div class="data-barang-container">
    <h2 class="data-barang-heading">Data Mobil</h2>
    <p class="data-barang-description">Daftar Mobil</p>

    <div class="button-container">
      <a href="{{ route('barang.create') }}" class="tambah-barang-button">+ Tambah Barang</a>
      <a href="{{ route('transaksi.index') }}" class="tambah-barang-button">Ke Transaksi Barang</a>
      <a href="{{ route('barang.cetakPdf') }}" class="tambah-barang-button">Cetak PDF</a>
    </div>

    <div class="table-responsive">
      <table class="data-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Mobil</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($barang as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->kategori->nama }}</td>
            <td>{{ $item->stok }}</td>
            <td>
              <a href="{{ route('barang.edit', $item->id) }}" class="edit-button">Edit</a>
              <form action="{{ route('barang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="hapus-button">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="empty-message">Belum ada data barang.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

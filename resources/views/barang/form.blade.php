<div class="mb-3">
    <label>Nama Mobil</label>
    <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $barang->nama_barang ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Kategori</label>
    <select name="kategori_id" class="form-control" required>
        <option value="">Pilih Kategori</option>
        @foreach($kategoris as $kategori)
            <option value="{{ $kategori->id }}"
                {{ (old('kategori_id', $barang->kategori_id ?? '') == $kategori->id) ? 'selected' : '' }}>
                {{ $kategori->nama }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok ?? 0) }}" required>
</div>
<div class="mb-3">
    <label>Harga (Rp) </label>
    <input type="number" name="satuan" class="form-control" value="{{ old('satuan', $barang->satuan ?? '') }}" required>
</div>

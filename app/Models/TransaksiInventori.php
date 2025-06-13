<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiInventori extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'jenis_transaksi',
        'jumlah',
        'tanggal',
        'keterangan'
    ];

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}

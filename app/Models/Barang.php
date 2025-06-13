<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori_id', // tambahkan ini!
        'stok',
        'satuan'
    ];
    

    // Relasi ke transaksi
    public function transaksi()
    {
        return $this->hasMany(TransaksiInventori::class);
    }
    public function kategori()
{
    return $this->belongsTo(Kategori::class);
}

protected static function boot()
{
    parent::boot();
    // static::creating(function ($model) {
    //     $last = Barang::orderBy('kode_barang', 'desc')->first();
    //     $model->kode_barang = $last ? $last->kode_barang + 1 : 1;
    // });
}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transaksi_inventoris', function (Blueprint $table) {
        $table->id();
        $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
        $table->enum('jenis_transaksi', ['Masuk', 'Keluar']);
        $table->integer('jumlah');
        $table->date('tanggal');
        $table->string('keterangan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_inventoris');
    }
};

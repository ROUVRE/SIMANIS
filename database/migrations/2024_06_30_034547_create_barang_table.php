<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->text('deskripsi_barang')->nullable();
            $table->string('merk')->nullable();
            $table->integer('stok_barang');
            $table->foreignId('supplier_id')->constrained('supplier')->nullable();
            $table->foreignId('gudang_id')->constrained('gudang')->nullable();
            $table->decimal('harga_per_item', 10, 2);
            $table->decimal('harga_total', 10, 2)->virtualAs('stok_barang * harga_per_item');
            $table->date('tanggal_pembelian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};

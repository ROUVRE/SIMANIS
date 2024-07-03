<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $dates = [
        'tanggal_pembelian',
    ];

    protected $fillable = [
        'nama_barang', 'kategori_id', 'deskripsi_barang', 'merk', 'stok_barang',
        'supplier_id', 'gudang_id', 'harga_per_item', 'tanggal_pembelian'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }
}

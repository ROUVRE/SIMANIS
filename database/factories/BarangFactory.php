<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Gudang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Barang::class;

    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word,
            'kategori_id' => Kategori::inRandomOrder()->first()->id,
            'deskripsi_barang' => $this->faker->paragraph,
            'merk' => $this->faker->word,
            'stok_barang' => $this->faker->numberBetween(1, 100),
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
            'gudang_id' => Gudang::inRandomOrder()->first()->id,
            'harga_per_item' => $this->faker->randomFloat(2, 1, 100),
            'tanggal_pembelian' => $this->faker->date,
        ];
    }
}

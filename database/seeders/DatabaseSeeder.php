<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Gudang;
use App\Models\Supplier;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Barang::truncate();
        Kategori::truncate();
        Gudang::truncate();
        Supplier::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kategori = ['Furniture', 'Alat Tulis', 'Elektronik', 'Kebersihan', 'Olahraga', 'Lain-Lain'];
        foreach ($kategori as $kat) {
            Kategori::create(['kategori' => $kat]);
        }

        Gudang::factory()->count(10)->create();
        Supplier::factory()->count(10)->create();
        Barang::factory()->count(160)->create();
    }
}

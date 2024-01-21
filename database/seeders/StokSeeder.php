<?php

namespace Database\Seeders;

use App\Models\Stok;
use Illuminate\Database\Seeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barangs = [1, 2, 3, 4];

        foreach ($barangs as $barang) {
            Stok::create([
                'barang_id' => $barang,
                'status' => "OK",
                'jumlah' => 100,
                'total' => 100,
            ]);
        }
    }
}

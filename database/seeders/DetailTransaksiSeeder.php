<?php

namespace Database\Seeders;

use App\Models\DetailTransaksi;
use Illuminate\Database\Seeder;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $barang_ids = [1, 2, 3, 4];

        foreach ($barang_ids as $barang_id) {
            DetailTransaksi::create([
                'transaksi_id' => 1,
                'barang_id' => $barang_id,
                'jumlah'=>1
                
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'total_belanja'         => 20000,
                'tempat_id'      => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        foreach ($data as $item) {
            Transaksi::create($item);
        }
    }
}

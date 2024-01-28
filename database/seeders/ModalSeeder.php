<?php

namespace Database\Seeders;

use App\Models\Modal;
use Illuminate\Database\Seeder;

class ModalSeeder extends Seeder
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
                'uang_keluar' => 1000000,
            ]
        ];

        foreach ($data as $item) {
            Modal::create($item);
        }
    }
}

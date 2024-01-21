<?php

namespace Database\Seeders;

use App\Models\Tempat;
use Illuminate\Database\Seeder;

class TempatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tempats = ['Kantin Polmanbabel', 'Kopasera Polmanbabel'];

        foreach ($tempats as $tempat) {
            Tempat::create([
                'tempat' => $tempat,
            ]);
        }
    }
}

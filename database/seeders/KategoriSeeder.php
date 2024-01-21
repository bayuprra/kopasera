<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = ['Makanan', 'Minuman', 'ATK'];

        foreach ($kategoris as $kategori) {
            Kategori::create([
                'kategori' => $kategori,
            ]);
        }
    }
}

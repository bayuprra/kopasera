<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AkunSeeder::class,
            KategoriSeeder::class,
            BarangSeeder::class,
            StokSeeder::class,
            TempatSeeder::class,
            TransaksiSeeder::class,
            DetailTransaksiSeeder::class,
        ]);
    }
}

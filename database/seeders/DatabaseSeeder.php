<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            BarangSeeder::class,
            StokSeeder::class,
            PenjualanSeeder::class,
            PenjualanDetailSeeder::class,
        ]);
    }
}

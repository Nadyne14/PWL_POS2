<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder {
    public function run(): void {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'tanggal_penjualan' => now(),
                'total_harga' => rand(100000, 500000),
            ];
        }
        DB::table('t_penjualan')->insert($data);
    }
}

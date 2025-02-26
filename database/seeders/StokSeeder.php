<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder {
    public function run(): void {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'barang_id' => $i,
                'jumlah_masuk' => rand(10, 50),
                'jumlah_keluar' => rand(1, 10),
            ];
        }
        DB::table('t_stok')->insert($data);
    }
}

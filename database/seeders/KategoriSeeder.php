<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KategoriSeeder extends Seeder {
    public function run(): void {
        $data = [
            [
                'kategori_kode' => 'CML',
                'nama_kategori' => 'Cemilan',
                'created_at' => Carbon::now(),
                'updated_at' => null
            ],
            [
                'kategori_kode' => 'MNR',
                'nama_kategori' => 'Minuman Ringan',
                'created_at' => Carbon::now(),
                'updated_at' => null
            ]
        ];

        DB::table('m_kategori')->insert($data);
    }
}

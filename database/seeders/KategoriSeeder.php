<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'Pakaian'],
            ['nama_kategori' => 'Makanan'],
            ['nama_kategori' => 'Minuman'],
            ['nama_kategori' => 'Alat Tulis'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}

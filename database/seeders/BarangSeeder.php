<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder {
    public function run(): void {
        $data = [
            ['kode_barang' => 'LPT001', 'nama_barang' => 'Laptop', 'kategori_id' => 1, 'harga' => 15000000, 'stok' => 10],
            ['kode_barang' => 'SMP001', 'nama_barang' => 'Smartphone', 'kategori_id' => 1, 'harga' => 5000000, 'stok' => 20],
            ['kode_barang' => 'BJ001', 'nama_barang' => 'Baju', 'kategori_id' => 2, 'harga' => 150000, 'stok' => 50],
            ['kode_barang' => 'CLN001', 'nama_barang' => 'Celana', 'kategori_id' => 2, 'harga' => 200000, 'stok' => 30],
            ['kode_barang' => 'RT001', 'nama_barang' => 'Roti', 'kategori_id' => 3, 'harga' => 20000, 'stok' => 40],
            ['kode_barang' => 'SS001', 'nama_barang' => 'Susu', 'kategori_id' => 4, 'harga' => 25000, 'stok' => 25],
            ['kode_barang' => 'KP001', 'nama_barang' => 'Kopi', 'kategori_id' => 4, 'harga' => 30000, 'stok' => 15],
            ['kode_barang' => 'PLP001', 'nama_barang' => 'Pulpen', 'kategori_id' => 5, 'harga' => 5000, 'stok' => 100],
            ['kode_barang' => 'PSL001', 'nama_barang' => 'Pensil', 'kategori_id' => 5, 'harga' => 3000, 'stok' => 80],
            ['kode_barang' => 'BKT001', 'nama_barang' => 'Buku Tulis', 'kategori_id' => 5, 'harga' => 15000, 'stok' => 60],
        ];
        DB::table('m_barang')->insert($data);
    }
}

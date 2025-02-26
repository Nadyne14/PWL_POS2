<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder {
    public function run(): void {
        $data = [];
        for ($i = 1; $i <= 10; $i++) { // 10 transaksi
            for ($j = 1; $j <= 3; $j++) { // 3 barang per transaksi
                $barang_id = rand(1, 10);
                $jumlah = rand(1, 5);
                $harga = DB::table('m_barang')->where('id', $barang_id)->value('harga');

                $data[] = [
                    'penjualan_id' => $i,
                    'barang_id' => $barang_id,
                    'jumlah' => $jumlah,
                    'subtotal' => $jumlah * $harga,
                ];
            }
        }
        DB::table('t_penjualan_detail')->insert($data);
    }
}
